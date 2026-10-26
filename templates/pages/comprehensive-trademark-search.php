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
    <?php /* Section 1: home-sec-1 comprehensive-search-banner. */ ?><section class="home-sec-1 comprehensive-search-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="text" data-aos="fade-up" data-aos-duration="1500">
                <h1>Thorough examination for trademark <span>clearance</span></h1>
                <p>Mitigate the chances of infringement, opposition, or consumer uncertainty. Our trademark search reports ensure optimal protection and minimal contention for your new brands. </p>
                <ul>
                  <li>Proficient Analysts with Advanced Expertise</li>
                  <li>Cutting-edge AI Tools for Investigation</li>
                  <li>Effortless and Swift Process</li>
                </ul>
                <div class="t-btn-div"> <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="t-btn">get started</a> <a href="javascript:void(0);" onclick="triggerChat();" class="t-btn  t-btn-text-s">Live Chat</a> </div>
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
              <h2>Comprehensive Search
                <span>Trademark </span></h2>
              <p>A thorough examination of databases to ensure your proposed trademark is unique, available for use, and not likely to cause confusion with existing trademarks.</p>
            </div>
            <?php /* Section 3: lp-section-two. */ ?><section class="lp-section-two">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="section-two-left">
                       
                        <h4>When it comes to your name or logo, several considerations are crucial:

                        <p>Simply registering a domain name doesn't confer ownership of the corresponding trademark. The sole method to secure this ownership is by trademarking your domain name.</p>
                        <br>
                        <p>During domain name registration, verify that it's not already in use by another party. It's wise to steer clear of domain names resembling or utilizing a competitor's brand name or trademark to prevent potential disputes.</p>
                        <br>
                        <p>Trademarking a domain name generally protects your business's reputation, credibility, and financial interests.</p>
                        
                      </div>
                  </div>
              
                </div>
            
              </div>
            </section>
          </div>
       
          <div id="tab3" class="tab-content-panel" style="display: none;">
          <?php /* Section 4: home-sec-8. */ ?><section class="home-sec-8">
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
                    <?php render_collection('faq', 'faqs', array_slice(site_data('pages/comprehensive-trademark-search')['faqs'], 0, 5)); ?>
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
                    <h2>Affordable <span>Trademark Search</span> <br>
                      Packages for All <span>Budgets</span> </h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-6 col-md-12 ll">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/comprehensive-trademark-search')['packages'][0]); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-md-12 lmll">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/comprehensive-trademark-search')['packages'][1]); ?>
                </div>
                <div class="col-lg-3 col-md-6 col-md-12 lmm">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/comprehensive-trademark-search')['packages'][2]); ?>
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