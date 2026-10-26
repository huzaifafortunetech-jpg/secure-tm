<?php
/** Navigation link layout; content comes from the selected data record. */
?><a class="nav-link dropdown-toggle" href="<?= esc($item['href']) ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= text($item['label']) ?></a>