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
    <?php /* Section 1: home-sec-1 office-banner. */ ?><section class="home-sec-1 office-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="text" data-aos="fade-up" data-aos-duration="1500">
                <h1>Free trademark <span>lookup</span></h1>
                <p>Utilise a variety of trademarks with only one free search engine.</p>
              
                <div class="t-btn-div"> 
                    <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="t-btn">get started</a> 
                    <a href="javascript:void(0);" onclick="triggerChat();" class="t-btn  t-btn-text-s">Live Chat</a> </div>
                 <!-- <p class="copy">Packages begin at $99 plus USPTO filing fees. <a href="#package-info">See available packages.</a></p> -->
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php
    require TEMPLATE_PATH . '/partials/partners.php';
?>
    <?php /* Section 2: choose-us similar-mark-section. */ ?><section class="choose-us similar-mark-section" data-aos="fade-left" data-aos-duration="1500">
        <div class="container">
            <div class="row">
            <div class="col-md-6">
            <div class="content-section-one lopokk">
                        <h2 class="fs-64">Why Opt for Us?</h2>
                        <p class="fs-16 padding">Our advanced AI search tool surpasses human capabilities in speed and accuracy, swiftly detecting potential conflicts. Our algorithm processes thousands of searches per hour, leaving no stone unturned.
                        </p>
                        <p>Our experienced Search Experts utilize a state-of-the-art algorithm to prevent wasted time and money on already registered trademarks. We provide thorough searches to ensure optimal outcomes.</p>

                        <ul class="w-del chooseus-del w-del2">
                            <li class="first">
                                <h5 class="fs-18">Cutting-edge, comprehensive search</h5>
                            </li>

                            <li>
                                <h5 class="fs-18">Extensive Coverage of Common Law</h5>
                            </li>

                           
                        </ul>
                    </div>
                </div>
            <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-right" data-aos-duration="1500">
        <div class="search-div">
                            <div class="search-wrapper">
                                <div class="input-wrapper">
                                    <span><i class="fa fa-search"></i></span>
                                    <input type="text" class="srch" placeholder="Search for similar trademarks">
                                </div>
                                <a href="javascript:;" class="srch-btn t-btn okbh  t-btn-text-s">search</a>
                            </div>

                            <div class="search-data table-responsive" style="display:none">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Trademark</th>
                                            <th>Owner</th>
                                            <th>Serial No</th>
                                            <th>Filing Date</th>
                                        </tr>
                                    </thead>

                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
        </div>

           
            </div>
        </div>
    </section>
 <?php /* Section 3: lp-section-one. */ ?><section id="section-jump" class="lp-section-one" data-aos="fade-right" data-aos-duration="1500">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <ul class="tabs-custom-nav">
          <li><a href="#tab2" class="current">Why Choose Us</a></li>
        
          <!-- <li><a href="#tab3" class="">FAQ’s</a></li> -->
        </ul>
        <div class="tabs-custom general">
          <div id="tab2" class="selected tab-content-panel" style="display: block;">
            <div class="content-section-one">
              <h2>What's The
                <span>Purpose Of Obtaining </span>
                A Trademark?</h2>
              <p>This powerful tool allows you to easily search the United States Patent and Trademark Office (USPTO) database for existing trademarks. Simply enter the following information:</p>
            </div>
            <?php /* Section 4: lp-section-two. */ ?><section class="lp-section-two">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-section-one lop">
                       <h3>Once you click "Search," our tool will quickly scan<br> the USPTO database and provide you with:</h3>
                       
                      
                        <ul>
                          <li>Matching trademarks: A list of trademarks that match your search criteria.</li>
                          <li>Owner information: The name and contact details of the trademark owner(s) (if available).</li>
                          <li>Serial number: The unique identification number assigned to the trademark by the USPTO.</li>
                          <li>Filing date: The date the trademark application was filed with the USPTO.</li>
                      
                        </ul>
                        <h3>Benefits of using our Free Trademark Lookup Tool:</h3>
                        <ul>
                          <li>Save Time & Money: Avoid costly trademark infringement by quickly checking for existing trademarks.</li>
                          <li>Make Informed Decisions: Use the search results to choose a strong and available trademark for your brand.</li>
                          <li>Gain Peace of Mind: Ensure your brand name is unique and legally protected before you invest in marketing and branding materials.</li>
                        
                        </ul>
                      </div>
                  </div>
              
                </div>
            
              </div>
            </section>
          </div>
       
          <div id="tab3" class="tab-content-panel" style="display: none;">
          <?php /* Section 5: home-sec-8. */ ?><section class="home-sec-8">
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
                    <?php render_collection('faq', 'faqs', array_slice(site_data('pages/free-trademark-search')['faqs'], 0, 5)); ?>
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
<?php require TEMPLATE_PATH . '/scripts/free-trademark-search-1.php'; ?>
</body>

</html>