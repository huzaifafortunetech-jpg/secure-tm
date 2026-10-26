<?php
declare(strict_types=1);

/** Public entry point; keep existing URLs and form actions stable. */
require_once __DIR__ . '/includes/bootstrap.php';
require_once SITE_ROOT . '/includes/agent-links.php';
$clientDetails = client_details_for_request();
$pageKey = 'client-form';

// Render the page using shared layout, components, and editable content data.
require SITE_ROOT . '/templates/pages/client-brief.php';
