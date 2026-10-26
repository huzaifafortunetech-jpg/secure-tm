<!DOCTYPE html>
<html lang="en">
<head>
<?php
    require SITE_ROOT . '/includes/head.php';
?>
</head>

<body>
    
    <header>
    <?php
    require SITE_ROOT . '/includes/header.php';
?>
    </header>
    <!-- <h1 class="wow fadeInRight" data-wow-duration="3s">hello</h1> -->
    <?php /* Section 1: home-sec-1. */ ?><section class="home-sec-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="text" data-aos="fade-up" data-aos-duration="1500">
                        <h1>Choose the right trademark services for your budget. <span>$45</span> <br> 
                        </h1>
                        <br>
                        <ul>
                    <li>USPTO-Approved Experts: Navigate the System with Confidence.</li>
                    <li> From Search to Registration, We've Got You Covered.</li>
                    <li>Expert Support, Affordable Solutions.</li>
                    <li>Protect Your Brand, Secure Your Future.</li>
                  </ul>
                        <div class="t-btn-div">
                            <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="t-btn">get started</a>
                            <a href="javascript:void(0);" onclick="triggerChat();" class="t-btn  t-btn-text-s">Live Chat</a>
                        </div>
                        <p class="copy">Require a Copyright instead? Click on this <a href="./copyright-registration.php">Link</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    require TEMPLATE_PATH . '/partials/partners.php';
?>
    <?php /* Section 2: home-sec-3. */ ?><section id="section-jump" class="home-sec-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12" data-aos="fade-right" data-aos-duration="1500">
                    <div class="text  box-1">
                        <h3>Streamlined Process</h3>
                        <h2>Trademark Registration
                            <br>
                            <span> Made Easy</span> </h2>
                        <p>Our straightforward trademark registration
process involves three simple steps,
increasing your chances of success.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12" data-aos="fade-left" data-aos-duration="1500">
                    <div class="img-box-sec">
                        <div class="img-box">
                            <div class="number-circle">
                                <h4>1</h4>
                            </div>
                            <div class="text">
                                <h4>Free Consultation</h4>
                                <p>Begin your journey by contacting one of our agents with free of cost initial consultation</p>
                            </div>
                        </div>
                    </div>
                    <div class="img-box-sec">
                        <div class="img-box">
                            <div class="number-circle">
                                <h4>2</h4>
                            </div>
                            <div class="text">
                                <h4>Compiling & Filing</h4>
                                <p>Our attorneys will compile your details and file Your Trademark with USPTO.</p>
                            </div>
                        </div>
                    </div>
                    <div class="img-box-sec">
                        <div class="img-box">
                            <div class="number-circle">
                                <h4>3</h4>
                            </div>
                            <div class="text">
                                <h4>Complete</h4>
                                <p>Your trademark serial no. will be delivered to you in only 24 hours.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php /* Section 3: home-sec-4 similar-mark-section. */ ?><section id="package-info" class="home-sec-4 similar-mark-section" data-aos="fade-up" data-aos-duration="1500">
            <div class="container">
              <div class="row text-center">
                <div class="col-md-12">
                  <div class="text">
                    <h3>Packages</h3>
                    <h2>Affordable <span>Trademark Registration</span> <br>
                      Packages for All <span>Budgets</span> </h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/index')['packages'][0]); ?>
                </div>
                <div class="col-lg-6 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/index')['packages'][1]); ?>
                </div>
                <div class="col-lg-3 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/index')['packages'][2]); ?>
                </div>
             
                 
               
              </div>
            </div>
          </section>
          <?php /* Section 4: testimonial slide-bg2. */ ?><section class="testimonial slide-bg2">
    <div class="container">
        <div class="testimonial-bg">
          <div class="row text-center">
            <div class="col-md-12">
              <div class="text">
                <!-- <h3>Packages</h3> -->
                <h2>Hear From Our <span>Satisfied Clients</span></h2>
              </div>
            </div>
          </div>
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="testi-heading">
                        <h2>Hear From Our Satisfied Clients</h2>
                    </div>
                </div>
            </div> -->
                    <div class="testi-slider row">
                        <div class="col-md-12">
                            <?php render_selection('testimonial', 'testimonials', site_data('pages/index')['testimonials'][0]); ?>
                        </div>
                        <div class="col-md-12">
                            <?php render_selection('testimonial', 'testimonials', site_data('pages/index')['testimonials'][1]); ?>
                        </div>
                        <div class="col-md-12">
                            <?php render_selection('testimonial', 'testimonials', site_data('pages/index')['testimonials'][2]); ?>
                        </div>
                    </div>
                </div>
          
        </div>
    
</section>
    <!-- <?php /* Section 5: home-sec-6. */ ?><section class="home-sec-6">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="text">
                        <h3>Our Trusted Partners</h3>
                        <h2> Recent Trademark <span>Registrations</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 logo-slider">
                    <div class="logo-img"> <img src="assets/images/home-page/image90.png" alt=""> </div>
                    <div class="logo-img"> <img src="assets/images/home-page/image91.png" alt=""> </div>
                    <div class="logo-img"> <img src="assets/images/home-page/image92.png" alt=""> </div>
                    <div class="logo-img"> <img src="assets/images/home-page/image93.png" alt=""> </div>
                    <div class="logo-img"> <img src="assets/images/home-page/image95.png" alt=""> </div>
                    <div class="logo-img"> <img src="assets/images/home-page/image90.png" alt=""> </div>
                    <div class="logo-img"> <img src="assets/images/home-page/image92.png" alt=""> </div>
                </div>
            </div>
        </div>
    </section> -->
  
    <?php /* Section 6: home-sec-7. */ ?><section class="home-sec-7" data-aos="fade-up" data-aos-duration="1500">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-12">
                    <div class="text">
                    <h3>3M+ Business</h3>
                <p>Trust us to protect their valuable assets, such as brand names, <br>logos, slogans, and other intellectual property.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="t-btn-div">
                        <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="t-btn">get started</a>
                        <a href="javascript:void(0);" onclick="triggerChat();" class="t-btn  t-btn-text-s">Live Chat</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php /* Section 7: home-sec-8. */ ?><section class="home-sec-8" data-aos="fade-right" data-aos-duration="1500">
        <div class="container">
        <div class="row text-center">
                <div class="col-md-12">
                  <div class="text">
                   
                    <h2>Registration of Trademarks with the <br>
                      <span> Federal Government</span></h2>
                    <p>Our experts are available to assist you via phone or chat.</p>
                  </div>
                </div>
                <div class="tabbing-sec">
                  <div class="accordion" id="accordionExample">
                    <?php render_collection('faq', 'faqs', array_slice(site_data('pages/index')['faqs'], 0, 5)); ?>
                  </div>
                </div>
              </div>
        </div>
        </div>
        </div>
    </section>
    <?php
    require TEMPLATE_PATH . '/partials/cta-info.php';
?>
    <?php
    require SITE_ROOT . '/includes/footer.php';
?>


</body>

</html>