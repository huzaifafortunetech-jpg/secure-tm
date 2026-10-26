<script>
    window.AGENT_LINK_CONFIG = <?= json_encode(
                                    ['csrf' => agent_link_csrf_token()],
                                    JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_THROW_ON_ERROR
                                ) ?>;
</script>
<script src="<?= esc(str_ends_with(dirname($_SERVER['SCRIPT_NAME']), '/payment-form') ? '../' : '') ?>assets/js/agent-links.js"></script>