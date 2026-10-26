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
    <?php /* Section 1: home-sec-1 tm. */ ?><section class="home-sec-1 tm">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="text" data-aos="fade-up" data-aos-duration="1500">
                <h1>Find top-notch services for
                    <span>monitoring trademarks</span> 
                </h1>
                <p>Utilize our cutting-edge trademark monitoring services to safeguard your brand effectively.</p>
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
          <li><a href="#tab1" class="current">Overview</a></li>
          <li><a href="#tab2" class="">Why Choose Us </a></li>
          <li><a href="#tab3" class="">FAQ’s</a></li>
        </ul>
        <div class="tabs-custom general">
          <div id="tab1" class="selected tab-content-panel" style="display: block;">
            <div class="content-section-one">
              <h2>It's  
                  <span>Vital To Prevent </span>
                  Infringement</h2>
              <p>A reliable solution to monitor the use of your trademark across various platforms and jurisdictions ensuring your brand's integrity and value.</p>
            </div>
            <?php /* Section 3: lp-section-two. */ ?><section class="lp-section-two">
              <div class="container">
                <div class="row">
                  <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="section-two-left">
                      <h3>Why keep an eye on your brand?</h3>
                      <h4>Trademark surveillance has several uses. These are some important justifications for giving it top priority:</h4>
                      <ul>
                        <li>Defending Your Trademark Against Copying</li>
                        <li>Sending a Cease and Desist Letter to Prevent Knock-Offs and Impersonators</li>
                        
                      </ul>
                      <h3>What benefits come with making use of a trademark monitoring service?</h3>
                      <p>You can profit from the following by utilising Secure Trademark Monitoring service:</p>
                      <ul>
                        <li>Determine any trademark infringements prior to the opposition deadline passing.</li>
                        <li>Avoid having your trademark rights revoked as a result of tardiness or inadequate response.</li>
                        <li>Lower danger and increase security</li>
                        <li>Strengthen and maintain your competitive edge.</li>
                        <li>Track the trademark activities of your competitors.</li>
                        <li>Dissuade others from registering trademarks that are comparable.</li>
                        <li>Remain one step ahead of the opposition.</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="section-two-right">
                      <div class="price-tag">$175 <span>/ Quarterly</span></div>
                      <div class="content-price">
                        <p>Keep Your Protection Going with Our Personalized, Thorough, and Proactive Monitoring Service</p>
                        <ul>
                          <li>Methodical Surveillance of Comparable Trademarks</li>
                          <li>Receive Customized Monthly Reports and Full Customer Support with Round-the-Clock</li>
                          <li>Account Access</li>
                        </ul>
                      </div>
                      <div class="price-button"><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">GET STARTED</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div id="tab2" class="tab-content-panel" style="display: none;">
            <div class="content-section-one">
              <h2>What Sets Us <span>Apart?</span> </h2>
              <p>Utilize our cutting-edge AI monitoring system to proactively detect and flag any domains or online content that infringe upon your trademark, including logos and visual trademarks.</p>
              <h3>Ensure The Protection Of Your Brand</h3>
              <p class="custom-p">Monitoring your trademark offers various advantages, with one of the most crucial being the safeguarding of your brand against potential infringements.</p>
              <ul>
                <li>Extensive Remediation for Trademark Infringement</li>
                <li>Prioritized Management of Trademark Infringement Risks</li>
                <li>Comprehensive Oversight of Takedown Notices</li>
              </ul>
            </div>
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
                    <?php render_collection('faq', 'faqs', array_slice(site_data('pages/trademark-monitoring')['faqs'], 0, 5)); ?>
                  </div>
                </div>
              </div>
            </div>
            </section></div>
          </div></div></div></div></section>
     
          <?php
    require TEMPLATE_PATH . '/partials/cta-info.php';
?>
          <?php
    require SITE_ROOT . '/includes/footer.php';
?>


</body>

</html>