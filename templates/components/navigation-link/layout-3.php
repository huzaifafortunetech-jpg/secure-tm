<?php
/** Navigation link layout; content comes from the selected data record. */
?><a class="dropdown-item" href="<?= esc($item['href']) ?>"><?= text($item['label']) ?></a>