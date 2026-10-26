<?php
declare(strict_types=1);

/** Public entry point; keep existing URLs and form actions stable. */
require_once __DIR__ . '/includes/bootstrap.php';
$pageKey = 'index';

// Render the page using shared layout, components, and editable content data.
require SITE_ROOT . '/templates/pages/index.php';
