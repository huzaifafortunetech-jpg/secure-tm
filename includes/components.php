<?php
declare(strict_types=1);

/** Escape plain text or attribute values using explicit PHP 8.5-compatible flags. */
function esc(string|int|float|null $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Preserve literal quotes in text nodes while escaping markup and ampersands. */
function text(string|int|float|null $value): string
{
    return htmlspecialchars((string) $value, ENT_NOQUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Load trusted content arrays once; reject path traversal and missing catalogs. */
function site_data(string $name): array
{
    static $cache = [];

    if (!preg_match('~^[a-z0-9-]+(?:/[a-z0-9-]+)*$~D', $name)) {
        throw new InvalidArgumentException('Invalid data catalog name.');
    }

    if (!array_key_exists($name, $cache)) {
        $path = DATA_PATH . '/' . $name . '.php';
        if (!is_file($path)) {
            throw new InvalidArgumentException('Unknown data catalog: ' . $name);
        }

        $records = require $path;
        if (!is_array($records)) {
            throw new UnexpectedValueException('Content catalogs must return arrays.');
        }
        $cache[$name] = $records;
    }

    return $cache[$name];
}

/** Attribute order and dependency options follow the original script declaration. */
function html_attributes(array $attributes): string
{
    $html = '';
    foreach ($attributes as $name => $value) {
        if (!preg_match('~^[a-zA-Z][a-zA-Z0-9:_-]*$~D', $name)
            || str_starts_with(strtolower($name), 'on')) {
            throw new InvalidArgumentException('Unsupported HTML attribute.');
        }
        if ($value === false) {
            continue;
        }
        // HTMLParser represents existing boolean attributes as null.
        $html .= $value === null || $value === true
            ? ' ' . $name
            : ' ' . $name . '="' . esc($value) . '"';
    }

    return $html;
}

/** Isolate template variables so nested components cannot overwrite their caller. */
function render_component(string $name, array $item = []): void
{
    if (!preg_match('~^[a-z0-9-]+$~D', $name)) {
        throw new InvalidArgumentException('Invalid component name.');
    }

    $path = TEMPLATE_PATH . '/components/' . $name . '.php';
    if (!is_file($path)) {
        throw new InvalidArgumentException('Unknown component: ' . $name);
    }

    require $path;
}

/** Apply page-specific IDs, labels, or copy without mutating a shared record. */
function render_selection(string $component, string $catalog, string|array $selection): void
{
    $id = is_array($selection) ? $selection['id'] : $selection;
    $records = site_data($catalog);
    if (!array_key_exists($id, $records)) {
        throw new InvalidArgumentException('Unknown ' . $catalog . ' record: ' . $id);
    }

    $overrides = is_array($selection) ? ($selection['overrides'] ?? []) : [];
    render_component($component, array_replace($records[$id], $overrides));
}

/** Render catalog selections in the order defined by the calling page. */
function render_collection(string $component, string $catalog, array $selections): void
{
    foreach ($selections as $selection) {
        render_selection($component, $catalog, $selection);
    }
}
