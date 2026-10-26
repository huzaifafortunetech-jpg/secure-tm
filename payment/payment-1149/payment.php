<?php
declare(strict_types=1);

/** Existing package URL; shared checkout and gateway behavior live in one place. */
require_once dirname(__DIR__, 2) . '/includes/bootstrap.php';
$paymentPackage = site_data('payments')['payment-1149'];
require SITE_ROOT . '/includes/handlers/payment.php';
