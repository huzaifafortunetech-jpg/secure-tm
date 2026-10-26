<?php
/** Testimonial layout; content comes from the selected data record. */
?><div class="testi-slide">
                                <div class="user">
                                    <img src="<?= esc($item['src']) ?>"  alt="<?= esc($item['alt']) ?>">
                                </div>
                                <div class="slide-content">
                                    <!-- <span class="slide-qoute"><img src="assets/images/qoute.svg" alt=""></span> -->
                                    <p><?= text($item['quote']) ?></p>
                                    <div class="user-detail">
                                        <span class="user-name"><?= text($item['name']) ?></span>
                                        <!-- <span class="user-des"><?= text($item['quote_2']) ?></span> -->
                                    </div>

                                </div>
                            </div>