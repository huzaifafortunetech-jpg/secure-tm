<?php
declare(strict_types=1);

require_once __DIR__ . '/urls.php';

/** Keep client details outside the public web root; deployment may override the directory. */
function client_link_storage(): string
{
    $configured = getenv('SECURE_TM_STORAGE');
    if (is_string($configured) && $configured !== '') {
        return rtrim($configured, '/\\') . '/client-links';
    }

    $site = realpath(SITE_ROOT);
    $boundary = $site;
    // Recognize common Apache hosting roots, including this project's XAMPP layout.
    while ($boundary !== dirname($boundary)) {
        if (in_array(strtolower(basename($boundary)), ['htdocs', 'public_html', 'www', 'html'], true)) {
            break;
        }
        $boundary = dirname($boundary);
    }
    if ($boundary === dirname($boundary)) {
        $boundary = realpath($_SERVER['DOCUMENT_ROOT'] ?? '') ?: $site;
    }

    return dirname($boundary) . '/secure-tm-private/client-links';
}

/** Validate the same three fields used by both existing agent forms. */
function client_link_fields(array $input): array
{
    $details = [];
    foreach (['firstName' => 100, 'lastName' => 100, 'description' => 5000] as $field => $limit) {
        $value = $input[$field] ?? null;
        if (!is_string($value) || trim($value) === '' || strlen($value) > $limit) {
            throw new InvalidArgumentException('Please enter a valid ' . $field . '.');
        }
        $details[$field] = trim($value);
    }
    return $details;
}

/** Store data privately; neither encoding nor encryption puts names into the URL. */
function create_client_link(array $input): string
{
    $details = client_link_fields($input);
    $directory = client_link_storage();
    if (!is_dir($directory) && !mkdir($directory, 0700, true) && !is_dir($directory)) {
        throw new RuntimeException('Client link storage is unavailable.');
    }

    $token = bin2hex(random_bytes(32));
    $path = $directory . '/' . hash('sha256', $token) . '.json';
    $payload = json_encode(['details' => $details, 'created_at' => gmdate(DATE_ATOM)], JSON_THROW_ON_ERROR);
    // Exclusive creation prevents an existing link from ever being overwritten.
    $stream = fopen($path, 'x');
    if ($stream === false) {
        throw new RuntimeException('Unable to create the client link.');
    }
    try {
        if (fwrite($stream, $payload) !== strlen($payload)) {
            throw new RuntimeException('Unable to save the client link.');
        }
    } finally {
        fclose($stream);
    }
    chmod($path, 0600);

    return $token;
}

/** A token is a bearer link; files are never located using user-controlled path fragments. */
function resolve_client_link(string $token): ?array
{
    if (!preg_match('/^[a-f0-9]{64}$/D', $token)) {
        return null;
    }
    $path = client_link_storage() . '/' . hash('sha256', $token) . '.json';
    if (!is_file($path)) {
        return null;
    }
    $record = json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
    return client_link_fields($record['details'] ?? []);
}

/** Sessions protect link creation; ordinary public pages do not start sessions. */
function agent_link_csrf_token(): string
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start([
            'cookie_httponly' => true,
            'cookie_samesite' => 'Lax',
            'cookie_secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
            'use_strict_mode' => true,
        ]);
    }
    return $_SESSION['agent_link_csrf'] ??= bin2hex(random_bytes(32));
}

/** Reuse each current agent route as its POST endpoint; no new public route is needed. */
function handle_agent_link_request(): void
{
    $csrf = agent_link_csrf_token();
    header('Cache-Control: no-store');
    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
        return;
    }

    header('Content-Type: application/json; charset=utf-8');
    $submitted = $_POST['csrf'] ?? '';
    if (!is_string($submitted) || !hash_equals($csrf, $submitted)) {
        http_response_code(403);
        echo json_encode(['error' => 'Please refresh the page and try again.']);
        exit;
    }

    try {
        $token = create_client_link($_POST);
        echo json_encode(['url' => get_client_form_base_url() . '?token=' . $token], JSON_THROW_ON_ERROR);
    } catch (InvalidArgumentException $error) {
        http_response_code(422);
        echo json_encode(['error' => $error->getMessage()]);
    } catch (Throwable $error) {
        http_response_code(503);
        error_log('Client link creation failed: ' . $error->getMessage());
        echo json_encode(['error' => 'The link could not be saved. Please try again.']);
    }
    exit;
}

/** Resolve links before emitting HTML, and migrate previously shared named URLs. */
function client_details_for_request(): array
{
    header('Cache-Control: no-store');
    header('Referrer-Policy: no-referrer');
    $token = $_GET['token'] ?? null;
    if ($token !== null) {
        $details = is_string($token) ? resolve_client_link($token) : null;
        if ($details === null) {
            http_response_code(404);
            exit('This client link is invalid or unavailable. Please contact your agent.');
        }
        return $details;
    }

    // An old link still works, but redirect before analytics or third-party resources load.
    if (isset($_GET['firstName'], $_GET['lastName'], $_GET['description'])) {
        try {
            $token = create_client_link($_GET);
            $path = parse_url($_SERVER['REQUEST_URI'] ?? $_SERVER['SCRIPT_NAME'], PHP_URL_PATH);
            header('Location: ' . $path . '?token=' . $token, true, 303);
            exit;
        } catch (InvalidArgumentException) {
            http_response_code(422);
            exit('The client link details are invalid. Please contact your agent.');
        }
    }

    return ['firstName' => '', 'lastName' => '', 'description' => ''];
}
