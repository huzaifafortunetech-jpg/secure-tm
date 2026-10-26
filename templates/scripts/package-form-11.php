<script>
        $('.logo-slider').slick({
            dots: true,
            arrow: false,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1600,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    
        ////// tabs generic (nav and tabs in main div)
        $('.tab-custom .tab-custom-nav a').click(function(event) {
            $(this).closest('li').siblings('li').children('a').removeClass('current');
            $(this).addClass('current');
            $(this).closest('.tab-custom').children('div.tab-content-panel:not(:hidden)').hide();
            $(this.hash).show();
            event.preventDefault();
            $('.sliderxs').slick('setPosition');
        });
    
        $("document").ready(function() {
            setTimeout(function() {
                $("ul.tabs-custom-nav li:first-child a").trigger('click');
            }, 10);
        });
        ////// tabs generic end
    
        ////// tabs custom (place nav and tabs anywhere separately)
        $('.tabs-custom-nav a').click(function(event) {
            $('.portfolio-slider').slick('refresh');
            $(this).closest('li').siblings('li').children('a').removeClass('current');
            $(this).addClass('current');
            $(this.hash).closest('.general').children('div.tab-content-panel:not(:hidden)').hide();
            $(this.hash).show();
            event.preventDefault();
            $('.sliderxs').slick('setPosition');
        });
    </script>