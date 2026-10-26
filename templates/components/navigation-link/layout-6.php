<?php
/** Navigation link layout; content comes from the selected data record. */
?><a href="<?= esc($item['href']) ?>" onclick="triggerChat();"><?= text($item['label']) ?></a>