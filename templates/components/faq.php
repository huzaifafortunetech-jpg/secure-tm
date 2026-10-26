<?php
/** Select an existing markup layout; data cannot supply a filesystem path. */
$layout = match ($item['layout']) {
    '1' => __DIR__ . '/faq/layout-1.php',
    '2' => __DIR__ . '/faq/layout-2.php',
    '3' => __DIR__ . '/faq/layout-3.php',
    default => throw new InvalidArgumentException('Unknown faq layout.'),
};
require $layout;
