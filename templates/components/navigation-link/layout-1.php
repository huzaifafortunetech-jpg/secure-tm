<?php
/** Navigation link layout; content comes from the selected data record. */
?><a class="nav-link active" aria-current="page" href="<?= esc($item['href']) ?>"><?= text($item['label']) ?></a>