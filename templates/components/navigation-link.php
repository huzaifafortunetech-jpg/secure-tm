<?php
/** Select an existing markup layout; data cannot supply a filesystem path. */
$layout = match ($item['layout']) {
    '1' => __DIR__ . '/navigation-link/layout-1.php',
    '2' => __DIR__ . '/navigation-link/layout-2.php',
    '3' => __DIR__ . '/navigation-link/layout-3.php',
    '4' => __DIR__ . '/navigation-link/layout-4.php',
    '5' => __DIR__ . '/navigation-link/layout-5.php',
    '6' => __DIR__ . '/navigation-link/layout-6.php',
    default => throw new InvalidArgumentException('Unknown navigation-link layout.'),
};
require $layout;
