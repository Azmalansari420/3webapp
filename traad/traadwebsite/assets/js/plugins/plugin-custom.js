"use strict";
document.addEventListener("DOMContentLoaded", function () {

    $(function ($) {

        /* niceSelect */
        $("select").niceSelect();


            // secondary testimonial_swiper
            var swiper = new Swiper(".testimonial_swiper", {
                slidesPerView: 1,
                spaceBetween: 40,
                loop: true,
                speed: 2000,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });

        // Common Silder 1
        let commonSlide1 = document.querySelectorAll('.common-slider1');
        commonSlide1.forEach(function (commonSlide1) {
            var swiper = new Swiper(commonSlide1, {
                loop: true,
                slidesPerView: 1,
                slidesToShow: 1,
                paginationClickable: true,
                spaceBetween: 14,
                centeredSlides: true,
                speed: 2000,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: commonSlide1.querySelector('.ara-next'),
                    prevEl: commonSlide1.querySelector('.ara-prev'),
                },
                breakpoints: {
                    1400: {
                        slidesPerView: 1.48,
                        centeredSlides:true,
                    },
                    1200: {
                        slidesPerView: 1.22,
                        centeredSlides:false,
                    },

                }
            });
        });

            
        var swiper = new Swiper(".client_company", {
            // freeMode: true,
            slidesPerView: 2,
            slidesToShow: 1,
            spaceBetween: 14,
            speed: 6000,
            allowTouchMove: true,
            loop: true,
            paginationClickable: true,
            centeredSlides: true,
            autoplay: {
                delay:1,
            },
            breakpoints: { 
                1400: {
                    slidesPerView: 7,
                    spaceBetween: 50,
                },
                768: {
                    slidesPerView: 5,
                    spaceBetween: 40,
                },
                576: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                480: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
        });


        // /* price-range */
        // if (document.querySelector('#price-range') !== null) {
        //     $("#price-range").slider({
        //         step: 1,
        //         range: true,
        //         min: 0,
        //         max: 1000,
        //         values: [50, 800],
        //         slide: function (event, ui) { $("#priceRange").val(ui.values[0] + " - " + ui.values[1]); }
        //     });
        //     $("#priceRange").val($("#price-range").slider("values", 0) + " - " + $("#price-range").slider("values", 1));
        // }

        /* Wow js */
        new WOW().init();

        // magnific-popup
        $('.popup-video').magnificPopup({
            type: 'iframe'
        });

        // new TradingView.MarketOverviewWidget({
        //     "container_id": "custom-tradingview-widget",
        //     "width": "100%",
        //     "height": "640",
        //     "currencies": [
        //         "EUR",
        //         "USD",
        //         "JPY",
        //         "GBP",
        //         "CHF",
        //         "AUD",
        //         "CAD",
        //         "NZD",
        //         "CNY"
        //     ],
        //     "isTransparent": false,
        //     "colorTheme": "dark",
        //     "locale": "in"
        // });
    });
});
