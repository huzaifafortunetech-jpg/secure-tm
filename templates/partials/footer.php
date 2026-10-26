<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-logo"> <img class="ft-img" src="assets/images/logo.png" alt="">
                    <p>Secure Trademark offers a variety of services to help you choose a strong trademark, search for existing trademarks, and register your trademark with the USPTO. Contact us today for a free consultation.</p>
                
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text">
                    <h6>Quick Links</h6>
                    <div class="footer-nav">
                        <ul>
                            <li><?php render_component('navigation-link', site_data('navigation')['footer-13']); ?></li>
                            <li><?php render_component('navigation-link', site_data('navigation')['footer-14']); ?></li>
                            <li><?php render_component('navigation-link', site_data('navigation')['footer-15']); ?></li>
                            <li><?php render_component('navigation-link', site_data('navigation')['footer-16']); ?></li>
                            <li><?php render_component('navigation-link', site_data('navigation')['footer-17']); ?></li>
                            <li><?php render_component('navigation-link', site_data('navigation')['footer-18']); ?></li> 
                             <li><?php render_component('navigation-link', site_data('navigation')['footer-19']); ?></li>
                             <li><?php render_component('navigation-link', site_data('navigation')['footer-20']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text">
                    <h6>Service</h6>
                    <div class="footer-nav">
                        <ul>
                            <li><?php render_component('navigation-link', site_data('navigation')['footer-21']); ?></li>
                            <li><?php render_component('navigation-link', site_data('navigation')['footer-22']); ?></li>
                            <li><?php render_component('navigation-link', site_data('navigation')['footer-23']); ?></li>
                            <li><?php render_component('navigation-link', site_data('navigation')['footer-24']); ?></li>
                            <li><?php render_component('navigation-link', site_data('navigation')['footer-25']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text">
                    <h6>Quick Info</h6>
                   
                    <div class="footer-links">
                        <div class="footer-img-box"> <img src="assets/images/home-page/phone.png" alt=""> <?php render_component('navigation-link', site_data('navigation')['footer-26']); ?> </div>
                        <div class="footer-img-box"> <img src="assets/images/home-page/addtherate.png" alt=""> <?php render_component('navigation-link', site_data('navigation')['footer-27']); ?> </div>
                        <div class="footer-img-box"> <img src="assets/images/home-page/location.png" alt=""> <a href=""
                                target="_blank">7901 4th St N, St. Petersburg,<br>
                                FL 33702, USA</a> </div>
                                <div class="footer-img-boxx"> <?php render_component('navigation-link', site_data('navigation')['footer-28']); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row copy-right-sec">
            <div class="col-lg-10 col-md-12 col-sm-12">
                <div class="text">
                    <div class="copy-right">
                        <p>
                            Copyright 2024 Secure Trademark, LLC. Only software and information are offered by Secure Trademark. Secure Trademark does not offer legal advice or take involved in any kind of legal representation; it is not a "lawyer referral service". Please refer to our Terms of Service and Privacy Policy before using Secure Trademark.
                          </p>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</footer>
<?php render_component('script', site_data('assets')['bootstrap-bundle-min-js']); ?>
<?php render_component('script', site_data('assets')['aos-js']); ?>
<?php render_component('script', site_data('assets')['wow-animate-js-13']); ?>
<?php render_component('script', site_data('assets')['lib-js-14']); ?>
<?php render_component('script', site_data('assets')['custom-js']); ?>
<?php render_component('script', site_data('assets')['jquery-min-js']); ?>
<?php render_component('script', site_data('assets')['slick-min-js']); ?>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog justify-content-center">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Activate your Trademark Registration <br /> <span> 50% Off Coupon</span> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="web-popup-form.php" id="popupForm" method="POST">
                
                    <div class="row">
                        <div class="col-md-12">
                            <input class="form-control mb-3" type="text" name="name" class="name" placeholder="Your Name" required>
                            <input class="form-control mb-3" type="email" name="email" class="email" placeholder="Your Email" required>
                            <input class="form-control mb-3" type="tel" name="phone" class="phone" minlength="7" maxlength="14" placeholder="Your Phone Number" required>
                            <p class="nrj">By providing a telephone number and submitting this form you are consenting to be contacted by SMS text message. Message & data rates may apply. You can reply STOP to opt-out of further messaging.</p>
                        </div>
                        <div class="col-md-12">
                            <textarea class="comments form-control mb-3" placeholder="What are you looking to protect? (e.g. Name, Logo and Slogan)" name="comment"></textarea>
                        </div>
                        <div class="col-md-12">
                          
                            <button class="t-btn" type="submit" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require TEMPLATE_PATH . '/scripts/footer-8.php'; ?>
<?php require TEMPLATE_PATH . '/scripts/footer-9.php'; ?>
<?php require TEMPLATE_PATH . '/scripts/footer-10.php'; ?>


<?php require TEMPLATE_PATH . '/scripts/footer-11.php'; ?>

<!--scrip for pop up that need to be open after 15 seconds -->

<?php require TEMPLATE_PATH . '/scripts/footer-12.php'; ?>



