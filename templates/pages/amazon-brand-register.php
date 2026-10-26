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
    <?php /* Section 1: home-sec-1 amazon-banner. */ ?><section class="home-sec-1 amazon-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="text" data-aos="fade-up" data-aos-duration="1500">
                <h1>Enroll with <br>
                  <span>amazon</span></h1>
                <p>Enlisting your brand on Amazon offers access to sophisticated reporting tools and enhances brand management, culminating in an enhanced customer experience.</p>
                <div class="t-btn-div"> <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="t-btn">get started</a> <a href="javascript:void(0);" onclick="triggerChat();" class="t-btn  t-btn-text-s">Live Chat</a> </div>
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
              <h2>Secure-TM Brand Boost:  
                <span>Harnessing Amazon's </span>
                A+ Content Edge</h2>
              <p>The A+ Content feature offers a unique avenue for conveying your brand message. It includes high-quality visuals, strategic positioning of text, and showcasing product characteristics. Enhance your brand visibility by running advertisements featuring your logo, a memorable slogan, and three showcased products. Efficiently market your brand and products through your complimentary multi-page Amazon store. Utilize our Brand Analytics tool to swiftly and intelligently make strategic choices, leveraging robust data such as customer behavior analyses and search queries.</p>
            </div>
         
          </div>
       
          <div id="tab3" class="tab-content-panel" style="display: none;">
          <?php /* Section 3: home-sec-8. */ ?><section class="home-sec-8">
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
                    <?php render_collection('faq', 'faqs', array_slice(site_data('pages/amazon-brand-register')['faqs'], 0, 5)); ?>
                  </div>
                </div>
              </div>
            </div>
            </section></div>
          </div></div></div></div></section>
          <?php /* Section 4: home-sec-4 similar-mark-section. */ ?><section id="package-info" class="home-sec-4 similar-mark-section" data-aos="fade-up" data-aos-duration="1500">
            <div class="container">
              <div class="row text-center">
                <div class="col-md-12">
                  <div class="text">
                    <h3>Packages</h3>
                    <h2>Affordable <span>Amazon Brand Registry</span> <br>
                      Packages for All <span>Budgets</span> </h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/amazon-brand-register')['packages'][0]); ?>
                </div>
                <div class="col-lg-6 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/amazon-brand-register')['packages'][1]); ?>
                </div>
                <div class="col-lg-3 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/amazon-brand-register')['packages'][2]); ?>
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