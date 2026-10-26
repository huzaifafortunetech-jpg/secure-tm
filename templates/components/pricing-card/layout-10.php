<?php
/** Pricing card layout; content comes from the selected data record. */
?><div class="bg-box popularr">
                    <div class="text">
                      <h5><?= text($item['title']) ?><br><?= text($item['title_2']) ?></h5>
                      <hr class="gol">
                      <div class="number-box">
                            
                        <h5><?= text($item['price']) ?></h5>
                        <p><?= text($item['fee']) ?></p>
                      </div>
                      <ul>
                          <li><?= text($item['description']) ?></li>
                          
                          <li><strong><?= text($item['description_2']) ?></strong></li><strong>
                          <li><strong><?= text($item['description_3']) ?></strong></li><strong>
                       
                          
                        </strong></strong></ul><strong><strong>
                      <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="t-btn-w"><?= text($item['button']) ?></a> </strong></strong></div><strong><strong>
                  </strong></strong></div>