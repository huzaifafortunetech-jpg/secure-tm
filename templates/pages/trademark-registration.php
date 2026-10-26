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
    <?php /* Section 1: home-sec-1 tr-banner. */ ?><section class="home-sec-1 tr-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="text" data-aos="fade-up" data-aos-duration="1500">
                <h1>Safeguard your valuable assets through <span>trademark registration</span></h1>
                <p>Fortifying your brand against imitators and rivals by officially registering your name, logo, or slogan.</p>
                <ul>
                  <li>Answer brief questions directly in a simple questionnaire.</li>
                  <li>Get a complimentary report on trademark clearance search.</li>
                  <li>Complete a trademark application with the USPTO.</li>
                </ul>
                <div class="t-btn-div"> 
                    <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="t-btn">get started</a> 
                    <a href="javascript:void(0);" onclick="triggerChat();" class="t-btn  t-btn-text-s">Live Chat</a> </div>
                 <p class="copy">Packages begin at $99 plus USPTO filing fees. <a href="#package-info">See available packages.</a></p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php
    require TEMPLATE_PATH . '/partials/partners.php';
?>
 <?php /* Section 2: lp-section-one. */ ?><section id="section-jump" class="lp-section-one" data-aos="fade-right" data-aos-duration="1500">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <ul class="tabs-custom-nav">
          <li><a href="#tab2" class="current">Why Choose Us</a></li>
        
          <li><a href="#tab3" class="">FAQ’s</a></li>
        </ul>
        <div class="tabs-custom general">
          <div id="tab2" class="selected tab-content-panel" style="display: block;">
            <div class="content-section-one">
              <h2>What's The
                <span>Purpose Of Obtaining </span>
                A Trademark?</h2>
              <p>At Secure Trademark, our team of highly skilled professionals is equipped with the necessary knowledge and expertise to assist clients in navigating the complex legal requirements involved in trademark registration. Our services cover a wide range of aspects, including conducting trademark searches, filing trademark applications, responding to office actions, and managing trademark portfolios.</p>
            </div>
            <?php /* Section 3: lp-section-two. */ ?><section class="lp-section-two">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-section-one lop">
                       
                        <p>
                            Failing to register your trademark leaves your business vulnerable to potential ownership claims by others, posing an imminent risk to your investments in product or service development.</p>
                        <br>
                        <p>Acquiring a registered trademark not only safeguards your brand but also grants you the authority to prevent others from capitalizing on similar identifiers to profit from your business's accomplishments. Overlooking trademark registration could lead to legal obstacles as your business expands.</p>
                       <br>
                        <ul>
                          <li>Trademarks play a crucial role in shaping brand reputations.</li>
                          <li>Trademark registration grants owners exclusive rights.</li>
                          <li>Trademarks facilitate business expansion endeavors.</li>
                      
                        </ul>
                      </div>
                  </div>
              
                </div>
            
              </div>
            </section>
          </div>
       
          <div id="tab3" class="tab-content-panel" style="display: none;">
          <?php /* Section 4: home-sec-8. */ ?><section class="home-sec-8" data-aos="fade-up" data-aos-duration="1500">
            <div class="container">
              <div class="row text-center">
                <div class="col-md-12">
                  <div class="text">
                    <h3>FAQs</h3>
                    <h2>Do you still have <br>
                      <span> Questions?</span></h2>
                    <p>Our experts are available to assist you via phone or chat.</p>
                  </div>
                </div>
                <div class="tabbing-sec">
                  <div class="accordion" id="accordionExample">
                    <?php render_collection('faq', 'faqs', array_slice(site_data('pages/trademark-registration')['faqs'], 0, 5)); ?>
                  </div>
                </div>
              </div>
            </div>
            </section></div>
          </div></div></div></div></section>
          <?php /* Section 5: home-sec-4 similar-mark-section. */ ?><section id="package-info" class="home-sec-4 similar-mark-section" data-aos="fade-up" data-aos-duration="1500">
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
                  <?php render_selection('pricing-card', 'packages', site_data('pages/trademark-registration')['packages'][0]); ?>
                </div>
                <div class="col-lg-6 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/trademark-registration')['packages'][1]); ?>
                </div>
                <div class="col-lg-3 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/trademark-registration')['packages'][2]); ?>
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