<?php
declare(strict_types=1);

/** Public entry point; keep existing URLs and form actions stable. */
require_once dirname(__DIR__, 1) . '/includes/bootstrap.php';
require_once SITE_ROOT . '/includes/agent-links.php';
$clientDetails = client_details_for_request();
$pageKey = 'client_form';

// Render the page using shared layout, components, and editable content data.
require SITE_ROOT . '/templates/pages/payment-form/client-brief.php';
