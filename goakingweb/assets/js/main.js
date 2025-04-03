(function($) {
   "use strict";

    $(document).ready(function () {

        /**-------------------------------------------
         *  Navbar fix
         * -----------------------------------------*/
        $(document).on('click', '.navbar-area .navbar-nav li.menu-item-has-children>a', function (e) {
            e.preventDefault();
        })    

        /*--------------------------------------------------
            select onput
        ---------------------------------------------------*/
        if ($('.single-select').length){
            $('.single-select').niceSelect();
        }

        /*---------------------------------------
            Quantity
        ---------------------------------------*/
        function wcqib_refresh_quantity_increments() {
            jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
                var c = jQuery(b);
                c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
            })
        }
        String.prototype.getDecimals || (String.prototype.getDecimals = function() {
            var a = this,
                b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
            return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
        }), jQuery(document).ready(function() {
            wcqib_refresh_quantity_increments()
        }), jQuery(document).on("updated_wc_div", function() {
            wcqib_refresh_quantity_increments()
        }), jQuery(document).on("click", ".plus, .minus", function() {
            var a = jQuery(this).closest(".quantity").find(".qty"),
                b = parseFloat(a.val()),
                c = parseFloat(a.attr("max")),
                d = parseFloat(a.attr("min")),
                e = a.attr("step");
            b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
        });

        /*---------------------------------------
            Range slider
        ---------------------------------------*/
        $( "#slider-range" ).slider({
            range: true,
            min: 0.00,
            max: 40.00,
            values: [ 5.00, 1999.00 ],
            slide: function( event, ui ) {
              $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
          });
          $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );


        /* -----------------------------------------------------
            Variables
        ----------------------------------------------------- */
        var leftArrow = '<i class="ri-arrow-left-line"></i>';
        var leftAngle = '<i class="ri-arrow-left-s-line"></i>';
        var rightArrow = '<i class="ri-arrow-right-line"></i>';
        var rightAngle = '<i class="ri-arrow-right-s-line"></i>';
        var backButton = '<button class="slide-arrow prev-arrow"><i class="fa fa-angle-left"></i></button>';
        var nextButton = '<button class="slide-arrow next-arrow"><i class="fa fa-angle-right"></i></button>';

        /**onboard-slider**/
        $('.onboard-slider').owlCarousel({
            loop:true,
            nav:true,
            dots: true,
            margin: 10,
            items: 1,
            animateOut: 'fadeOut',
            autoplay:true,
            autoplayTimeout:3000,
            smartSpeed:2000,
            navText: [leftArrow,rightArrow],
        })      

        /**banner-slider**/
        $('.banner-slider').owlCarousel({
            loop:true,
            nav:false,
            dots: false,
            margin: 15,
            items: 1,
            autoplay:true,
            autoplayTimeout:3000,
            smartSpeed:1500,
        })  

        /**category-slider**/
        $('.home-category-slider').owlCarousel({
            loop:true,
            nav:false,
            dots: false,
            margin: 1,
            items: 3,
            autoplay:true,
            autoplayTimeout:3000,
            smartSpeed:1500,
            autoWidth:true,
        })  
        /**product-slider**/
        $('.home-product-slider').owlCarousel({
            loop:false,
            nav:false,
            dots: false,
            margin: 10,
            items: 1,
            smartSpeed:1500,
        })  
        /**restaurent-slider**/
        $('.restaurent-client-slider').owlCarousel({
            loop:false,
            nav:false,
            dots: false,
            margin: 10,
            items: 4,
            smartSpeed:1500,
        })  

        $('.blog-slider').owlCarousel({
            loop:true,
            nav:false,
            dots: false,
            margin: 15,
            items: 2,
            smartSpeed:1500,
        })  

        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,

            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            arrows: false,
            variableWidth: true,
            focusOnSelect: true
        });
         
        $('a[data-slide]').click(function(e) {
            e.preventDefault();
            var slideno = $(this).data('slide');
            $('.slider-nav').slick('slickGoTo', slideno - 1);
        });

        $(document).on('mouseover','.onboard-btn',function() {
            $(this).addClass('onboard-btn-active');
            $('.onboard-btn').removeClass('onboard-btn-active');
            $(this).addClass('onboard-btn-active');
        });

        /* -------------------------------------------------------------
            carousels js
        ------------------------------------------------------------- */
        $('.carousel-1').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            smartSpeed: 1500,
            items: 1,
        });

        //carousel-2
        $('.carousel-2').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            smartSpeed: 1500,
            margin: 20,
            items: 2,
        });

        //carousel-3
        $('.carousel-3').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            smartSpeed: 1500,
            margin: 20,
            items: 2,
            stagePadding: 70,
        });

        //carousel-4
        $('.carousel-4').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            smartSpeed: 1500,
            margin: 20,
            items: 3,
        });

        //carousel-5
        $('.carousel-5').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            smartSpeed: 1500,
            margin: 10,
            items: 4,
        });

        /*------------------------------------------------
            Magnific JS
        ------------------------------------------------*/
        $('.play-btn').magnificPopup({
            type: 'iframe',
            removalDelay: 260,
            mainClass: 'mfp-zoom-in',
        });
        $.extend(true, $.magnificPopup.defaults, {
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: 'https://www.youtube.com/embed/Wimkqo8gDZ0'
                    }
                }
            }
        });

        /*--------------------------------------------
            Search Popup
        ---------------------------------------------*/
        var bodyOvrelay =  $('#body-overlay');
        var searchPopup = $('#td-search-popup');

        $(document).on('click','#body-overlay',function(e){
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
        });
        $(document).on('click','.search',function(e){
            e.preventDefault();
            searchPopup.addClass('active');
        bodyOvrelay.addClass('active');
        });

        /**featured-accordion**/
        $('.accordion-item').on('click',function(e){
            $('.accordion-item').removeClass('active');
            $(this).toggleClass('active');
        });

        /**Dark Mode**/
        const storageDark = localStorage.getItem('dark')
        console.log(storageDark)
        if($('body').hasClass('dark')){
            changeMode('true');
        } else {
            changeMode('true');
        }
        if (storageDark !== 'null') {
            changeMode(storageDark)
        }
        jQuery(document).on("change", '.change-mode input[type="checkbox"]' ,function (e) {
            const dark = $(this).attr('data-active');
            if (dark === 'true') {
                $(this).attr('data-active','false')
            } else {
                $(this).attr('data-active','true')
            }
            changeMode(dark)
        })
        function changeMode (dark) {
            // const body = jQuery('body')
            // if (dark === 'true') {
            //     $('#dark-mode').prop('checked', true).attr('data-active', 'false')
            //     $('.darkmode-logo').removeClass('d-none')
            //     $('.light-logo').addClass('d-none')
            //     body.addClass('dark')
            //     dark = true
            // } else {
                // $('[data-mode="toggle"]').find('i.a-left').removeClass('ri-moon-clear-line');
                // $('[data-mode="toggle"]').find('i.a-right').addClass('ri-sun-line');
            //     $('#dark-mode').prop('checked', false).attr('data-active', 'true');
            //     $('.light-logo').removeClass('d-none')
            //     $('.darkmode-logo').addClass('d-none')
            //     body.removeClass('dark')
            //     dark = true
            // }
            updateLocalStorage(dark)
            const event = new CustomEvent("ChangeColorMode", {detail: {dark: dark} });
            document.dispatchEvent(event);
        }
        function updateLocalStorage(dark) {
            localStorage.setItem('dark', dark)
        }

        $('#example').tooltip({ boundary: 'window' })

        /*------------------
           back to top
        ------------------*/
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 200);
        });

    });

    $(window).on("scroll", function() {
        /*---------------------------------------
        sticky menu activation && Sticky Icon Bar
        -----------------------------------------*/

        var mainMenuTop = $(".navbar-area");
        if ($(window).scrollTop() >= 1) {
            mainMenuTop.addClass('navbar-area-fixed');
        }
        else {
            mainMenuTop.removeClass('navbar-area-fixed');
        }
        
        var ScrollTop = $('.back-to-top');
        if ($(window).scrollTop() > 1000) {
            ScrollTop.fadeIn(1000);
        } else {
            ScrollTop.fadeOut(1000);
        }
    });

    $(window).on('load', function () {

        /*-----------------
            preloader
        ------------------*/
        var preLoder = $("#preloader");
        preLoder.fadeOut(0);

        /*-----------------
            back to top
        ------------------*/
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut();

        /*---------------------
            Cancel Preloader
        ----------------------*/
        $(document).on('click', '.cancel-preloader a', function (e) {
            e.preventDefault();
            $("#preloader").fadeOut(500);
        });

    });


})(jQuery);