<?php
/** Select an existing markup layout; data cannot supply a filesystem path. */
$layout = match ($item['layout']) {
    '1' => __DIR__ . '/feature/layout-1.php',
    '2' => __DIR__ . '/feature/layout-2.php',
    '3' => __DIR__ . '/feature/layout-3.php',
    default => throw new InvalidArgumentException('Unknown feature layout.'),
};
require $layout;
