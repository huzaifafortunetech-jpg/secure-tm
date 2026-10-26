<?php
require_once SITE_ROOT . '/includes/urls.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require SITE_ROOT . '/includes/head.php';
    ?>
</head>

<body>
    <?php require TEMPLATE_PATH . '/head/agent-form-styles.php'; ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QQV3FW6"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSH7VPQM"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <header>
        <?php
    require SITE_ROOT . '/includes/header.php';
        ?>
    </header>

    <?php /* Section 1: home-sec-1 contact-banner. */ ?><section class="home-sec-1 contact-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="text" data-aos="fade-up" data-aos-duration="1500">
                        <h1>Agent <span>tools</span></h1>
                        <p>Create a secure client payment link with prefilled details—fast, simple, and aligned with our checkout flow.</p>
                        <div class="t-btn-div">
                            <a href="javascript:void(0);" onclick="triggerChat();" class="t-btn t-btn-text-s">Live Chat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require TEMPLATE_PATH . '/partials/partners.php'; ?>

    <?php /* Section 2: contact-section. */ ?><section id="agent-form-section" class="contact-section" data-aos="fade-up" data-aos-duration="1500">
        <div class="container">
            <div class="row text-center mb-4 mb-lg-5">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="text">
                        <!-- <h3>Client link generator</h3> -->
                        <h2>Agent <span>Form</span></h2>
                        <!-- <p class="mt-3">Enter the client’s name and a short case description. We’ll append them to the client form URL.</p> -->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-11">
                    <div class="contact-form-div">
                        <form id="agentForm" novalidate>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="visually-hidden" for="firstName">First name</label>
                                    <input class="form-control mb-3" type="text" id="firstName" name="firstName" placeholder="First name" required autocomplete="given-name">
                                </div>
                                <div class="col-md-6">
                                    <label class="visually-hidden" for="lastName">Last name</label>
                                    <input class="form-control mb-3" type="text" id="lastName" name="lastName" placeholder="Last name" required autocomplete="family-name">
                                </div>
                                <div class="col-12">
                                    <label class="visually-hidden" for="description">Description</label>
                                    <textarea class="comments form-control mb-2" id="description" name="description" rows="5" placeholder="Brief description (e.g. mark details, package, notes for the client)" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="t-btn" onclick="generateLink()">Generate client link</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="cta-bg mt-4 mt-md-5">
                        <div class="text mb-3 text-start">
                            <h4 class="link-output-title">Generated client link</h4>
                            <!--<p class="link-output-hint">Copy and send this URL to your client.</p>-->
                        </div>
                        <label class="visually-hidden" for="clientLink">Generated link</label>
                        <div class="d-flex flex-column flex-sm-row gap-2 gap-sm-3 align-items-stretch align-items-sm-center">
                            <input type="text" class="form-control agent-link-field flex-grow-1" id="clientLink" readonly placeholder="Your link will appear here after you generate it.">
                            <button type="button" class="t-btn t-btn-text-s flex-shrink-0" onclick="copyClientLink()" id="copyLinkBtn">Copy link</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<?php /* Section 3: home-sec-7. */ ?><section class="home-sec-7" data-aos="fade-up" data-aos-duration="1500">-->
    <!--    <div class="container">-->
    <!--        <div class="row align-items-center">-->
    <!--            <div class="col-lg-8 col-md-12">-->
    <!--                <div class="text">-->
    <!--                    <h3>3M+ Business</h3>-->
    <!--                    <p>Trust us to protect their valuable assets, such as brand names, <br>logos, slogans, and other intellectual property.</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-12">-->
    <!--                <div class="t-btn-div">-->
    <!--                    <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="t-btn">get started</a>-->
    <!--                    <a href="javascript:void(0);" onclick="triggerChat();" class="t-btn t-btn-text-s">Live Chat</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

   
    <?php require SITE_ROOT . '/includes/footer.php'; ?>

    <?php require TEMPLATE_PATH . '/scripts/agent-initialization.php'; ?>
    <?php require TEMPLATE_PATH . '/scripts/agent-link-config.php'; ?>
</body>

</html>
