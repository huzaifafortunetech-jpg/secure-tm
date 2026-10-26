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
    <?php /* Section 1: home-sec-1 copyright-registration-banner. */ ?><section class="home-sec-1 copyright-registration-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="text" data-aos="fade-up" data-aos-duration="1500">
                <h1>Protect your creativity by
                    <span>registering your copyright</span> 
                </h1>
                <p>By enrolling your copyright, you shield your innovative ideas from being copied or replicated by competitors. After investing considerable effort to bring your ideas to fruition, it's essential to secure them.</p>
                <ul>
                    <li>Guard your creations</li>
                    <li>Enhance your rights</li>
                    <li>Stop unauthorized usage</li>
                  </ul>
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
          <li><a href="#tab2" class="current">Over view</a></li>
        
          <li><a href="#tab3" class="">FAQ’s</a></li>
        </ul>
        <div class="tabs-custom general">
          <div id="tab2" class="selected tab-content-panel" style="display: block;">
            <div class="content-section-one">
              <h2>Preventing 
                  <span>Infringement Is Crucial </span>
                  In Safeguarding</h2>
              <p>Employing a dependable solution to copyright the utilization of your trademark across different platforms and jurisdictions ensures the protection of your brand's identity and worth.</p>
            </div>
            <?php /* Section 3: lp-section-two. */ ?><section class="lp-section-two">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-section-one lop">
                       
                        <p>Copyrights grant authors exclusive rights to their content, allowing them to reproduce, distribute, adapt, publicly perform, display, or broadcast their work. Furthermore, copyright owners have the authority to authorize others to utilize these exclusive rights.</p>
                        <br>
                        <p>Commonly, individuals inquire about the rationale behind incurring additional expenses and undertaking the requisite procedures to register their copyright with the U.S. Copyright Office.</p>
                       <br>
                        <ul>
                          <li>Public Record Recording of Ownership Details: By registering with the U.S. Copyright Office, ownership details are recorded in public records, providing clarity and evidence of ownership.</li>
                          <li>Assumption of Ownership: Registration establishes a legal presumption of ownership, simplifying legal proceedings in case of disputes.</li>
                          <li>Capability to Initiate Legal Actions for Infringement: Registered copyright holders gain the ability to file lawsuits for infringement, seeking remedies and damages.</li>
                          <li>Qualification for Statutory Compensation and Legal Fees: Registration enables copyright owners to qualify for statutory compensation and reimbursement of legal fees in successful infringement cases.</li>
                        </ul>
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
                    <?php render_collection('faq', 'faqs', array_slice(site_data('pages/copyright-registration')['faqs'], 0, 5)); ?>
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
                    <h2>Affordable <span>Copyright Registration</span> <br>
                      Packages for All <span>Budgets</span> </h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/copyright-registration')['packages'][0]); ?>
                </div>
                <div class="col-lg-6 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/copyright-registration')['packages'][1]); ?>
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