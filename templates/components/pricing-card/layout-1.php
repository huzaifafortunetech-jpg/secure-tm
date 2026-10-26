<?php
/** Pricing card layout; content comes from the selected data record. */
?><div class="bg-box">
                    <div class="text">
                      <h5><?= text($item['title']) ?><br><?= text($item['title_2']) ?></h5>
                      <hr class="gol">
                      <div class="number-box">
                        <p><?= text($item['fee']) ?></p>
                        <h5><?= text($item['price']) ?></h5>
                        
                      </div>
                      <?php render_component('feature-list', ['items' => $item['features_1']]); ?>
                      <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="t-btn-w"><?= text($item['button']) ?></a> </div>
                  </div>