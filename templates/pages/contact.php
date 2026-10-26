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
    <?php /* Section 1: home-sec-1 contact-banner. */ ?><section class="home-sec-1 contact-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="text" data-aos="fade-up" data-aos-duration="1500">
          <h1>Secure trademark: Effortlessly <span>secure your</span> trademark</h1>
          <p>Our offerings encompass Trademark Registration, Monitoring, and Copyright Services, all at a fair cost.</p>
          <div class="t-btn-div"> 
			  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="t-btn">get started</a> 
			  <a href="javascript:void(0);" onclick="triggerChat();" class="t-btn  t-btn-text-s">Live Chat</a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
    require TEMPLATE_PATH . '/partials/partners.php';
?>
<?php /* Section 2: contact-section. */ ?><section id="section-jump" class="contact-section" data-aos="fade-right" data-aos-duration="1500">
  <div class="container">
    <div class="row text-center mb-5">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="text">
          <h3>Contact Us</h3>
          <h2>We're eager to hear <span> from you.  </span> </h2> <br>
          <p>Find answers to frequently asked questions about our services. <br>
          We're here to help! Reach out to us via phone or chat with one of our experts today!</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="contact-form-div">
          <form action="./contact-form.php" method="POST">
         
            <div class="row">
              <div class="col-md-12">
                <input class="form-control mb-3" type="text" name="name" placeholder="First Name" required="">
                <input class="form-control mb-3" type="email" name="email" placeholder="Your Email" required="">
                <input class="form-control mb-3" type="tel" name="phone" minlength="7" maxlength="14" placeholder="Your Phone Number" required="">
                <textarea class="comments form-control mb-3" placeholder="What are you looking to protect? (e.g. Name, Logo and Slogan)" name="comment"></textarea>
              </div>
              <div class="col-md-12">
                <button class="t-btn" type="submit" name="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="contact-info">
          <ul>
            <li><strong>ADDRESS</strong>7901 4th St N, St. Petersburg, FL 33702, USA</li>
            <li><strong>MOBILE</strong> +1 469-606-0082</li>
            <li><strong>EMAIL</strong> info@secure-tm.com</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php /* Section 3: home-sec-7. */ ?><section class="home-sec-7" data-aos="fade-up" data-aos-duration="1500">
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
    <?php
    require TEMPLATE_PATH . '/partials/cta-info.php';
?>
   
      <?php
    require SITE_ROOT . '/includes/footer.php';
?>


</body>

</html>