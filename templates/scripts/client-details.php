<script>
    window.CLIENT_DETAILS = <?= json_encode(
                                $clientDetails,
                                JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_THROW_ON_ERROR
                            ) ?>;
</script>