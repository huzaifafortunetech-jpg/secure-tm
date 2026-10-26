<?php
/** Shared feature lists retain their supplied order and optional emphasis. */
?><ul><?php foreach ($item['items'] as $feature): ?><?php render_component('feature', $feature); ?><?php endforeach; ?></ul>