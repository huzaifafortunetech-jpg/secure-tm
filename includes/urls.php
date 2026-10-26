<?php
/**
 * Absolute URL to client_form.php on this same site (fixes localhost vs live and /public_html/ paths).
 */
function get_client_form_base_url(): string
{
    $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')
        || (isset($_SERVER['SERVER_PORT']) && (int) $_SERVER['SERVER_PORT'] === 443);
    $scheme = $https ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';

    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/agent_form.php');
    $dir = dirname($scriptName);

    if ($dir === '/' || $dir === '.' || $dir === '\\') {
        $baseDir = '';
    } else {
        $baseDir = rtrim($dir, '/');
    }

    if ($baseDir !== '' && preg_match('#/payment-form$#', $baseDir)) {
        $path = $baseDir . '/client_form.php';
    } elseif ($baseDir === '') {
        $path = '/payment-form/client_form.php';
    } else {
        $path = $baseDir . '/payment-form/client_form.php';
    }

    $path = '/' . ltrim(preg_replace('#/+#', '/', $path), '/');

    return $scheme . '://' . $host . $path;
}
