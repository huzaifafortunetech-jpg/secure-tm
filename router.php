<?php

declare(strict_types=1);

/** Local PHP development server: php -S localhost:8000 router.php */
$requestPath = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/');

// Match Apache's private source restrictions before considering static files.
if (preg_match('~(?:^|/)(?:includes|templates|data|tools|docs|libraries)(?:/|$)|(?:^|/)\.~i', $requestPath)) {
    http_response_code(403);
    exit('Forbidden');
}

if (preg_match('~^/(?:composer\.(?:json|lock)|readme\.md|router(?:\.php)?)$~i', $requestPath)) {
    http_response_code(403);
    exit('Forbidden');
}

$relativePath = ltrim($requestPath, '/');
$aliases = require __DIR__ . '/data/routes.php';
$alias = $aliases[$relativePath] ?? $aliases[rtrim($relativePath, '/') . '.php'] ?? null;
$candidate = __DIR__ . '/' . ($alias ?? ($relativePath === '' ? 'index.php' : $relativePath));
if (is_dir($candidate)) {
    $candidate = rtrim($candidate, '/\\') . '/index.php';
} elseif (!is_file($candidate) && is_file($candidate . '.php')) {
    $candidate .= '.php';
}

$resolved = realpath($candidate);
if (
    $resolved === false || !is_file($resolved)
    || !str_starts_with(str_replace('\\', '/', $resolved), str_replace('\\', '/', __DIR__) . '/')
) {
    http_response_code(404);
    exit('Not found');
}

if (pathinfo($resolved, PATHINFO_EXTENSION) !== 'php' && $alias === null) {
    return false;
}

if (pathinfo($resolved, PATHINFO_EXTENSION) !== 'php') {
    $mime = match (strtolower(pathinfo($resolved, PATHINFO_EXTENSION))) {
        'css' => 'text/css',
        'js' => 'text/javascript',
        'svg' => 'image/svg+xml',
        'png' => 'image/png',
        'jpg', 'jpeg' => 'image/jpeg',
        'webp' => 'image/webp',
        'woff' => 'font/woff',
        'ttf' => 'font/ttf',
        'html' => 'text/html; charset=utf-8',
        default => 'application/octet-stream',
    };
    header('Content-Type: ' . $mime);
    readfile($resolved);
    return;
}

// Match Apache's public GET redirects while preserving queries and POST bodies.
if ($alias === null && ($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST' && str_ends_with($requestPath, '.php')) {
    $target = $requestPath === '/index.php' ? '/' : substr($requestPath, 0, -4);
    $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    header('Location: ' . $target . ($query !== null ? '?' . $query : ''), true, 301);
    exit;
}

// Public entry files, not relocated templates, determine URL-relative behavior.
$_SERVER['SCRIPT_FILENAME'] = $resolved;
$_SERVER['SCRIPT_NAME'] = '/' . str_replace('\\', '/', substr($resolved, strlen(__DIR__) + 1));
$_SERVER['PHP_SELF'] = $_SERVER['SCRIPT_NAME'];
chdir(dirname($resolved));
require $resolved;
