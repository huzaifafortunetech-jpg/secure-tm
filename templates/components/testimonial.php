<?php
/** Select an existing markup layout; data cannot supply a filesystem path. */
$layout = match ($item['layout']) {
    '1' => __DIR__ . '/testimonial/layout-1.php',
    default => throw new InvalidArgumentException('Unknown testimonial layout.'),
};
require $layout;
