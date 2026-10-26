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
                <h1>Our<span> pricing</span></h1>
               
             
                <div class="t-btn-div"> 
                    <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="t-btn">get started</a> 
                    <a href="javascript:void(0);" onclick="triggerChat();" class="t-btn  t-btn-text-s">Live Chat</a> </div>
                 <p class="copy">Packages begin at $99 plus USPTO filing fees. <a href="#section-jump">See available packages.</a></p>
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
          <li><a href="#regis" class="current">Trademark Registration</a></li>
        
          <li><a href="#copy" class="">Copyright Registration</a></li>
           <li><a href="#comp" class="">Comprehensive Trademark Search</a></li>
           <li><a href="#amazon" class="">Amazon Brand Registry</a></li>
        </ul>
        <div class="tabs-custom general">
          <div id="regis" class="selected tab-content-panel home-sec-4" style="display: block;">
           
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
                  <?php render_selection('pricing-card', 'packages', site_data('pages/pricing')['packages'][0]); ?>
                </div>
                <div class="col-lg-6 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/pricing')['packages'][1]); ?>
                </div>
                <div class="col-lg-3 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/pricing')['packages'][2]); ?>
                </div>
             
                 
               
              </div>
            </div>
          </div>
       
          <div id="copy" class="tab-content-panel home-sec-4" style="display: none;">
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
                  <?php render_selection('pricing-card', 'packages', site_data('pages/pricing')['packages'][3]); ?>
                </div>
                <div class="col-lg-6 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/pricing')['packages'][4]); ?>
                </div>
               
              </div>
            </div>
              
         </div>
         <div id="comp" class="selected tab-content-panel home-sec-4" style="display: block;">
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
                  <?php render_selection('pricing-card', 'packages', site_data('pages/pricing')['packages'][5]); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-md-12 lmll">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/pricing')['packages'][6]); ?>
                </div>
                <div class="col-lg-3 col-md-6 col-md-12 lmm">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/pricing')['packages'][7]); ?><strong><strong>
                </strong></strong></div><strong><strong>
           
              
                 
               
              </strong></strong></div><strong><strong>
            </strong></strong></div>
         </div>
         <div id="amazon" class="selected tab-content-panel home-sec-4" style="display: block;">
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
                  <?php render_selection('pricing-card', 'packages', site_data('pages/pricing')['packages'][8]); ?>
                </div>
                <div class="col-lg-6 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/pricing')['packages'][9]); ?>
                </div>
                <div class="col-lg-3 col-md-12">
                  <?php render_selection('pricing-card', 'packages', site_data('pages/pricing')['packages'][10]); ?>
                </div>
             
                 
               
              </div>
            </div>
         </div>
          </div></div></div></div></section>
          
     
  
          <?php
    require SITE_ROOT . '/includes/footer.php';
?>

</body>

</html>