<?php
/** Select an existing markup layout; data cannot supply a filesystem path. */
$layout = match ($item['layout']) {
    '1' => __DIR__ . '/pricing-card/layout-1.php',
    '2' => __DIR__ . '/pricing-card/layout-2.php',
    '3' => __DIR__ . '/pricing-card/layout-3.php',
    '4' => __DIR__ . '/pricing-card/layout-4.php',
    '5' => __DIR__ . '/pricing-card/layout-5.php',
    '6' => __DIR__ . '/pricing-card/layout-6.php',
    '7' => __DIR__ . '/pricing-card/layout-7.php',
    '8' => __DIR__ . '/pricing-card/layout-8.php',
    '9' => __DIR__ . '/pricing-card/layout-9.php',
    '10' => __DIR__ . '/pricing-card/layout-10.php',
    default => throw new InvalidArgumentException('Unknown pricing-card layout.'),
};
require $layout;
