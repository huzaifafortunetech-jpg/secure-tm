<?php
declare(strict_types=1);

require dirname(__DIR__) . '/includes/bootstrap.php';

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

function rejects(Closure $callback): void
{
    try {
        $callback();
    } catch (InvalidArgumentException) {
        return;
    }
    throw new RuntimeException('An invalid content or template path was accepted.');
}

check(esc('<img "test">') === '&lt;img &quot;test&quot;&gt;', 'Attribute escaping failed.');
check(text('<script>&') === '&lt;script&gt;&amp;', 'Text escaping failed.');
rejects(fn () => site_data('../.env'));
rejects(fn () => render_component('../partials/header'));
rejects(fn () => site_data('unknown-catalog'));
rejects(fn () => html_attributes(['onclick' => 'alert(1)']));

$records = site_data('testimonials');
$id = array_key_first($records);
$item = ['caller' => 'must survive nested rendering'];
ob_start();
render_selection('testimonial', 'testimonials', [
    'id' => $id,
    'overrides' => ['name' => '<script>test</script>'],
]);
$output = ob_get_clean();
check(str_contains($output, '&lt;script&gt;test&lt;/script&gt;'), 'Override escaping failed.');
check(site_data('testimonials') === $records, 'An override mutated the shared catalog.');
check($item === ['caller' => 'must survive nested rendering'], 'Component scope leaked.');

// Existing public package URLs must select precisely the same amount as before.
foreach (site_data('payments') as $key => $package) {
    check($package['amount'] === substr($key, strlen('payment-')) . '.00', 'Package amount changed.');
}

echo "Component, escaping, catalog isolation, and package checks passed.\n";
