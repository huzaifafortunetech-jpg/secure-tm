<?php
/** Faq layout; content comes from the selected data record. */
?><div class="accordion-item">
                      <h2 class="accordion-header" id="<?= esc($item['id']) ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="<?= esc($item['data_bs_target']) ?>" aria-expanded="false" aria-controls="<?= esc($item['aria_controls']) ?>">
                        <div class="text">
                          <div class="circle-box">
                            <h6><?= text($item['number']) ?></h6>
                          </div>
                          <p><?= text($item['question']) ?></p>
                        </div>
                        </button>
                      </h2>
                      <div id="<?= esc($item['id_2']) ?>" class="accordion-collapse collapse" aria-labelledby="<?= esc($item['aria_labelledby']) ?>" data-bs-parent="<?= esc($item['data_bs_parent']) ?>">
                        <div class="accordion-body">
                          <div class="text">
                            <p><?= text($item['answer']) ?><br>
<br><?= text($item['answer_2']) ?></p>
                          </div>
                        </div>
                      </div>
                    </div>