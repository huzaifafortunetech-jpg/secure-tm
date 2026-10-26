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
    <?php /* Section 1: home-sec-1 faq-ban. */ ?><section class="home-sec-1 faq-ban">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="text" data-aos="fade-up" data-aos-duration="1500">
                <h1>Federal Trademark Registration
 <span>FAQs</span></h1>
                <p>Can't find what you're looking for?</p>
                <div class="t-btn-div"> <a href="tel:+1 469-680-8801" class="t-btn">CALL US </a> <a href="javascript:void(0);" onclick="triggerChat();" class="t-btn  t-btn-text-s">Live Chat </a> </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php
    require TEMPLATE_PATH . '/partials/partners.php';
?>
      <?php /* Section 2: home-sec-8. */ ?><section id="section-jump" class="home-sec-8" data-aos="fade-right" data-aos-duration="1500">
        <div class="container">
          <div class="row text-center">
            <div class="col-md-12">
              <div class="text">
                <h3>FAQs</h3>
                <h2>secure trademark <span> <br>
                  Registration</span></h2>
              </div>
            </div>
            <div class="tabbing-sec">
            <div class="accordion" id="accordionExample">
                    <?php render_collection('faq', 'faqs', array_slice(site_data('pages/faq')['faqs'], 0, 10)); ?>
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