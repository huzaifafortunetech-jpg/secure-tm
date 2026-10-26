"""Regression checks for original routes, markup, assets and the private client-link flow.

Usage: python tools/check-site.py --php /path/to/php
Install the small test dependency with: python -m pip install -r tools/requirements.txt
"""
from __future__ import annotations
import argparse
import hashlib
import http.cookiejar
import json
import os
from pathlib import Path
import re
import socket
import subprocess
import tempfile
import time
import urllib.error
import urllib.parse
import urllib.request
from bs4 import BeautifulSoup, Comment, Declaration, Doctype, NavigableString, Tag

ROOT = Path(__file__).resolve().parents[1]
INTENTIONAL_SCRIPT_CHANGES = {'agent_form.php', 'payment-form/agent_form.php', 'client-form.php', 'payment-form/client_form.php'}


def canonical(body: bytes, route: str, asset_aliases: dict) -> list:
    """Compare content, DOM, styles and scripts; account for approved asset moves."""
    soup = BeautifulSoup(body, 'html.parser')
    base = route.rsplit('/', 1)[0] + '/' if '/' in route else ''

    def asset_url(value: str) -> str:
        parsed = urllib.parse.urlsplit(value)
        if parsed.scheme or parsed.netloc:
            if parsed.hostname not in {'secure-tm.com', 'www.secure-tm.com'}:
                return value
            path = urllib.parse.unquote(parsed.path).lstrip('/')
        else:
            path = urllib.parse.unquote(urllib.parse.urljoin('/' + base, parsed.path)).lstrip('/')
        target = asset_aliases.get(path, path)
        if path in asset_aliases or path.startswith('assets/'):
            return 'asset:' + target + ('?' + parsed.query if parsed.query else '')
        return value

    def walk(node):
        if isinstance(node, (Comment, Declaration)):
            return None
        if isinstance(node, Doctype):
            return ['doctype', str(node)]
        if isinstance(node, Tag):
            if node.name == 'script' and route in INTENTIONAL_SCRIPT_CHANGES:
                return None
            attrs = []
            for key, value in node.attrs.items():
                value = sorted(value) if isinstance(value, list) else value
                if key in {'src', 'href', 'poster'} and isinstance(value, str):
                    value = asset_url(value)
                attrs.append((key, value))
            children = [result for child in node.children if (result := walk(child)) is not None]
            return [node.name, sorted(attrs), children]
        if isinstance(node, NavigableString):
            if node.parent and node.parent.name in {'script', 'style', 'pre', 'textarea'}:
                return ['raw', str(node).replace('\r\n', '\n')]
            value = re.sub(r'\s+', ' ', str(node)).strip()
            return ['text', value] if value else None
        return None

    return walk(soup)


def fingerprint(body: bytes, route: str, aliases: dict) -> str:
    encoded = json.dumps(canonical(body, route, aliases), ensure_ascii=False, separators=(',', ':')).encode()
    return hashlib.sha256(encoded).hexdigest()


def run(php: str) -> dict:
    baseline = json.loads((ROOT / 'tools/markup-baseline.json').read_text(encoding='utf-8'))
    aliases = json.loads((ROOT / 'docs/asset-migration.json').read_text(encoding='utf-8'))
    routes = json.loads((ROOT / 'docs/route-aliases.json').read_text(encoding='utf-8'))
    with socket.socket() as sock:
        sock.bind(('127.0.0.1', 0))
        port = sock.getsockname()[1]
    with tempfile.TemporaryDirectory(prefix='secure-tm-check-') as temporary:
        env = os.environ.copy()
        env['SECURE_TM_STORAGE'] = temporary
        log = Path(temporary) / 'server.log'
        with log.open('wb') as errors:
            server = subprocess.Popen(
                [php, '-n', '-d', 'display_errors=0', '-d', 'log_errors=1', '-S', f'127.0.0.1:{port}', '-t', str(ROOT), str(ROOT / 'router.php')],
                stdout=subprocess.DEVNULL, stderr=errors, env=env, cwd=ROOT,
            )
            origin = f'http://127.0.0.1:{port}'
            client = urllib.request.build_opener(urllib.request.HTTPCookieProcessor(http.cookiejar.CookieJar()))

            def get(path, data=None):
                return client.open(origin + '/' + path.lstrip('/'), data, timeout=15)

            def expect_status(path, status, data=None):
                try:
                    response = get(path, data)
                    actual = response.status
                except urllib.error.HTTPError as error:
                    actual = error.code
                assert actual == status, (path, actual, status)

            try:
                for attempt in range(50):
                    try:
                        get('/')
                        break
                    except (urllib.error.URLError, ConnectionError):
                        if server.poll() is not None:
                            raise RuntimeError('PHP server could not start.')
                        time.sleep(0.1)
                # Existing route names are checked, even when their physical entry file was renamed.
                for route, expected in baseline['views'].items():
                    response = get(route)
                    body = response.read()
                    assert response.status == 200, route
                    assert fingerprint(body, route, aliases) == expected, 'Markup changed: ' + route
                for old, new in routes.items():
                    if not old.endswith('.php') and not old.endswith('.html'):
                        response = get(urllib.parse.quote(old))
                        assert response.read() == (ROOT / new).read_bytes(), 'Asset alias failed: ' + old
                # Both public agent URLs must keep client details out of the generated URL.
                for agent in ['agent_form', 'payment-form/agent_form.php', 'agent-form']:
                    body = get(agent).read().decode()
                    csrf = re.search(r'"csrf":"([a-f0-9]+)"', body)[1]
                    fields = {'firstName': 'PrivateAlpha', 'lastName': 'PrivateBeta', 'description': 'A private <script>test</script>', 'csrf': csrf}
                    reply = json.loads(get(agent, urllib.parse.urlencode(fields).encode()).read())
                    parsed = urllib.parse.urlsplit(reply['url'])
                    query = urllib.parse.parse_qs(parsed.query)
                    assert set(query) == {'token'} and len(query['token'][0]) == 64
                    assert 'Private' not in reply['url'] and 'description' not in reply['url']
                    page = get(parsed.path + '?' + parsed.query)
                    assert page.headers['Referrer-Policy'] == 'no-referrer'
                    markup = page.read().decode()
                    assert 'PrivateAlpha' in markup and 'PrivateBeta' in markup
                    assert '\\u003Cscript\\u003E' in markup
                expect_status('agent_form', 403, urllib.parse.urlencode({**fields, 'csrf': 'invalid'}).encode())
                expect_status('agent_form', 422, urllib.parse.urlencode({**fields, 'firstName': ''}).encode())
                expect_status('payment-form/client_form?token=invalid', 404)
                expect_status('payment-form/client_form?token=' + '0' * 64, 404)
                old_query = urllib.parse.urlencode({key: value for key, value in fields.items() if key != 'csrf'})
                response = get('payment-form/client_form?' + old_query)
                assert '?token=' in response.url and 'Private' not in response.url
                assert list(Path(temporary, 'client-links').glob('*.json'))
                for path in ['includes/config.php', 'templates/pages/index.php', 'data/faqs.php', 'docs/entry-points.json', 'tools/check-site.py', 'libraries/php-mailer/VERSION', '.env', 'composer.json', 'router.php', 'router', 'missing-route']:
                    expect_status(path, 404 if path == 'missing-route' else 403)
            finally:
                server.terminate()
                server.wait(timeout=10)
        errors = log.read_text(encoding='utf-8', errors='replace')
        assert not re.search(r'PHP (?:Warning|Fatal error|Deprecated|Notice)', errors), 'PHP diagnostics found in HTTP checks.'
    return {'views': len(baseline['views']), 'asset_aliases': sum(not name.endswith(('.php', '.html')) for name in routes), 'agent_links': 'passed', 'private_routes': 'passed'}


if __name__ == '__main__':
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument('--php', default=os.environ.get('PHP_BINARY', 'php'))
    args = parser.parse_args()
    print(json.dumps(run(args.php), indent=2))
