    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QQV3FW6"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSH7VPQM"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->




    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="./index.php"><img src="assets/images/logo.png" alt=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <?php render_component('navigation-link', site_data('navigation')['header-1']); ?>
                  </li>

                  <li class="nav-item dropdown">
                    <?php render_component('navigation-link', site_data('navigation')['header-2']); ?>
                    <ul class="dropdown-menu">
                      <li><?php render_component('navigation-link', site_data('navigation')['header-3']); ?></li>
                      <li><?php render_component('navigation-link', site_data('navigation')['header-4']); ?></li>
                      <li><?php render_component('navigation-link', site_data('navigation')['header-5']); ?></li>
                      <li><?php render_component('navigation-link', site_data('navigation')['header-6']); ?></li>
                      <li><?php render_component('navigation-link', site_data('navigation')['header-7']); ?></li>
                      <li><?php render_component('navigation-link', site_data('navigation')['header-8']); ?></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <?php render_component('navigation-link', site_data('navigation')['header-9']); ?>
                  </li>
                  <li class="nav-item">
                    <?php render_component('navigation-link', site_data('navigation')['header-10']); ?>
                  </li>
                  <li class="nav-item">
                    <?php render_component('navigation-link', site_data('navigation')['header-11']); ?>
                  </li>
                  <li class="nav-item">
                    <?php render_component('navigation-link', site_data('navigation')['header-12']); ?>
                  </li>


                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <a href="tel:+1 469-606-0082" class="t-btn"> <i class="fa fa-phone" aria-hidden="true"></i> &nbsp; +1 469-606-0082</a>

                </form>
                &nbsp;<form class="form-inline my-2 my-lg-0 jhn">
                  <a href="javascript:void(0);" onclick="triggerChat();" class="t-btn"> <i class="fa fa-comment" aria-hidden="true"></i> &nbsp; Live Chat</a>
                </form>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>