/**
* ---------------------------------------------------------------------------
Template Name: Finance business template 
URL: http://finance.imranhoshain.com
Author: spytoever
Version: 1.0
* --------------------------------------------------------------------------- 
*/
(function ($) {
    "use strict";

    $(document).ready(function ($) {


        $(".embed-responsive iframe").addClass("embed-responsive-item");
        $(".carousel-inner .item:first-child").addClass("active");

        $('[data-toggle="tooltip"]').tooltip();

        /*---------------------------------------------------
                    Camera slider
        ---------------------------------------------------*/

        if ($("#camera_wrap_4").length) {
            $("#camera_wrap_4").camera({
                height: '590px',
                pagination: false,
                thumbnails: false,
                imagePath: 'img/',
                playPause: false,
                loader: 'none',
                time: 3000,
                transPeriod: 1500,
            });
        }

        /*---------------------------------------------------
                    Owlcarousel slider
        ---------------------------------------------------*/

        $(".choose-slider").owlCarousel({
            items: 1,
            autoplay: true,
            loop: true,
            smartSpeed: 1000,
            nav: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        });

        $(".testi-slider").owlCarousel({
            items: 3,
            autoplay: true,
            margin: 15,
            loop: true,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
            }
        });

        /*---------------------------------------------------
                    Smooth menu
        ---------------------------------------------------*/

        $('li.smooth-menu a').on('click', function () {
            var headerH = "70";
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top - headerH + 'px'
            }, 1208, 'easeInOutExpo');

        });

        /*---------------------------------------------------
                    Counter
        ---------------------------------------------------*/

        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });

        /*---------------------------------------------------
                    Isotop menu
        ---------------------------------------------------*/

        var $portfolio = $('.portfolios');

        $portfolio.isotope({
            itemSelector: '.col-md-4',
            layoutMode: 'masonry',
            filter: '*',
            percentPosition: true,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false,
            }
        });

        $('.portfolio-menu li').on('click', function () {
            $('.portfolio-menu li').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $portfolio.isotope({
                filter: selector,
            });
        });

        /*---------------------------------------------------
                    Lightbox
        ---------------------------------------------------*/

        $(".gallery-lightbox").magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        /*---------------------------------------------------
                    Sticky menu
        ---------------------------------------------------*/

        $(".header-bottom-area").sticky({
            topSpacing: 0
        });

        /*---------------------------------------------------
                    Scrool Top
        ---------------------------------------------------*/

        $('#scrollTop').on('click', function () {
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
            return false;
        });
		
		/*---------------------------------------------------
                    Code Protect
        ---------------------------------------------------*/

       document.onkeydown = function(e) {
         if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 ||
			 e.keyCode === 83 ||			 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            return false;
        }};

    });


    $(window).load(function () {

    });

}(jQuery));