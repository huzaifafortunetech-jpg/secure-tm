# Secure TM

PHP 8.5 website organized, with reusable components and editable data. The migration was checked on PHP 8.5.12, including a separate Apache instance. Existing page, form and checkout URLs remain supported.

## Structure

```text
assets/
  css/                        Site, landing page and payment form styles
  fonts/                      Existing fonts, with consistent filenames
  images/
    brand/                    Brand logos
    icons/                    Contact and utility icons
    landing-page/             Landing page media
    payment-methods/          Card brand logos
  js/                         Frontend scripts and the shared agent link generator
data/
  pages/                      Per-page content selection and overrides
  assets.php                  Ordered external script attributes
  faqs.php                    Shared FAQ content
  navigation.php              Header and footer links
  packages.php                Service package copy and feature lists
  partners.php                Trusted logos in their original order
  payments.php                Existing checkout amounts and descriptions
  routes.php                  Original URL aliases to canonical files
  testimonials.php            Shared client testimonials
includes/
  bootstrap.php               Application initialization without output
  components.php              Data loading, escaping and isolated rendering
  config.php                  Filesystem paths
  agent-links.php             Private token creation and client detail resolution
  urls.php                    Same-site client URL construction
  head.php                    Shared metadata and style include
  header.php                  Shared navigation include
  footer.php                  Footer, modal and script include
  handlers/                   Enquiry, brief and shared payment processing
libraries/php-mailer/         One existing PHPMailer 7 dependency
payment/                     Stable checkout entry points for every package
payment-form/                Canonical agent, client and brief entry points
templates/
  pages/                      Page markup and one shared checkout
  components/                 Reusable FAQ, pricing, feature, link and logo layouts
  partials/                   Shared page sections
  head/                       Existing inline styles
  scripts/                    Existing inline JavaScript and client-link configuration
tools/                        Repeatable offline and HTTP regression checks
docs/                         Migration maps, cleanup record and verification reports
uploads/                      Existing client uploads
*.php                         Small public entry points
landing-page.html             Original standalone landing page
router.php                    Local PHP development routing
```

Application-owned filenames and folders use lowercase `kebab-case` consistently. Third-party PHPMailer class filenames keep their upstream conventions, and existing uploaded client files keep their stored names. This preserves library loading and previously shared upload links.

## Run locally

Use PHP 8.5.12 or a newer compatible PHP 8.5 patch release. Enable cURL, OpenSSL, Fileinfo and SimpleXML for production mail and payments. The existing bundled PHPMailer is used directly; Composer installation is not required. `composer.json` records the platform requirements.

```powershell
php -S localhost:8000 router.php
```

Open `http://localhost:8000/`. Apache uses `.htaccess` with mod_rewrite and `AllowOverride All`. It supports both a domain root and a project mounted at a path such as `/secure-tm/`. The migration does not replace the machine's global PHP or XAMPP configuration.

## URLs and filenames

Canonical physical filenames use hyphens. The original URLs remain aliases, including `/agent_form`, `/agent_form.php`, `/payment-form/client_form.php`, `/brieff.php`, and `/Landing-Page.html`. Existing extensionless routes and POST targets also work. Redirects keep their query strings, and POST requests are processed without redirecting the submission body.

Old image, font and stylesheet URLs are also aliased to their new asset locations. Active templates and CSS already use the new paths; aliases support older external links and caches. `data/routes.php` is mirrored by explicit rules in `.htaccess` and the development router. When adding an alias, update both the catalog and Apache rules. The old-to-new map is in `docs/route-aliases.json`.

## Editing content

Edit page layouts in `templates/pages/` and repeated content in the corresponding `data/` catalog. Record selection and page-specific IDs/order live in `data/pages/`.

```php
$content = site_data('pages/index');
render_collection('faq', 'faqs', $content['faqs']);
render_selection('pricing-card', 'packages', $content['packages'][0]);
```

Text and attributes are escaped by the renderer. Markup belongs in component templates, rather than in data arrays. Existing alternate markup layouts are retained to preserve the approved DOM, responsive classes and animation hooks. The page shells, modal IDs, tracking events and dependency order retain their original behavior.

## Private client links

Both existing agent pages submit the client details to the same agent route by POST. A generated URL contains only a cryptographically random 64-character token. Client names and descriptions are stored server-side and never encoded into the generated URL. The client form resolves the token and displays the same readonly information. Invalid tokens return 404. Link creation validates the form and session CSRF token.

Previously shared links containing names still work: the server converts them to a token and redirects before page markup or tracking resources load. Existing links do not automatically expire.

Set `SECURE_TM_STORAGE` to an absolute writable directory outside the web root to choose persistent private storage. Link records are stored in its `client-links/` subfolder. Without an override, common hosting roots are detected; this XAMPP checkout defaults to `C:/xampp/secure-tm-private/client-links/`. Back up that private directory when deploying or moving the site so issued links remain valid. It must be shared by all application instances if the website runs on more than one server.

The existing `.env`, SMTP configuration and uploaded files were retained. Uploaded-logo filesystem paths and public URLs are handled separately. Private source, content catalogs, documentation, tools and libraries are blocked by Apache and the development router.

## Checks

```powershell
python -m pip install -r tools/requirements.txt
python tools/check-site.py --php C:/path/to/php.exe
python tools/check-handlers.py --php C:/path/to/php.exe
C:/path/to/php.exe tools/check-components.php
```

The site check compares 62 original page/landing outputs, including visible text, DOM structure, classes, inline styles and scripts, after accounting for asset relocation. The four agent/client pages intentionally use updated scripts and are covered by private-link flow checks. Test storage is temporary and separate from issued client links.

The handler checks simulate mail, attachments and payment responses; they send no real emails or charges. Real SMTP delivery and production payment transactions still depend on the deployment services. The payment handler returns its result before the caller sends the redirect, avoiding output that would block the Location header. The PHP 8.5-deprecated `curl_close()` call was removed.

`docs/final-verification.json` records the PHP runtime, syntax/deprecation checks, preserved assets and backup location. `docs/apache-verification.json` records the isolated Apache/PHP 8.5.12 subdirectory checks. The full pre-migration backup remains outside this project directory. `docs/cleanup.json` lists removed duplicate libraries, old partials and obsolete source copies.
