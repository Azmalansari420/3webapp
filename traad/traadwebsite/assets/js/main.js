"use strict";
document.addEventListener("DOMContentLoaded", function () {

    $(function ($) {

       // pre_loader
       $(".preloader").delay(300).animate({
        "opacity": "0"
    }, 500, function () {
        $(".preloader").css("display", "none");
    });

        // Click to Scroll Top
        var ScrollTop = $(".scrollToTop");
        $('.scrollToTop').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 600);
            return false;
        });

        // window on scroll function
        $(window).on("scroll", function () {

            // Sticky Header
            var fixed_top = $(".header-section");
            $(window).on("scroll", function () {
                if ($(window).scrollTop() > 50) {
                    fixed_top.addClass("animated fadeInDown header-fixed");
                }
                else {
                    fixed_top.removeClass("animated fadeInDown header-fixed");
                }
            });

            // Check Scroll 
            if ($(this).scrollTop() < 600) {
                ScrollTop.removeClass("active");
            } else {
                ScrollTop.addClass("active");
            }

            // Odometer Init 
            let windowHeight = $(window).height();
            $('.odometer').children().each(function () {
                if ($(this).isInViewport({ "tolerance": windowHeight, "toleranceForLast": windowHeight, "debug": false })) {
                    var section = $(this).closest(".counters");
                    section.find(".odometer").each(function () {
                        $(this).html($(this).attr("data-odometer-final"));
                    });
                }
            });

            // circle img rotation
            var images = document.querySelectorAll(".circle-area img");
            images.forEach(function (image) {
                var rotation = window.scrollY / 4;
                image.style.transform = "rotate(" + rotation + "deg)";
            });


            // // profile-top-nav
            // $(".navbar_menu i").on("click", function () {
            //     $(this).toggleClass("active");
            //     $(".navbar-collapse").slideToggle();
            //     // $(this).parent().next(".navbar-collapse").slideToggle();
            // });
            // $(document).click(function(event) {
            //     if (!$(event.target).closest('.navbar-collapse').length && !$(event.target).is('.navbar_menu i')) {
            //     $('.navbar-collapse').slideUp();
            //     }
            // });


        });
        

        // mobile menubar
        const mobileSize = window.matchMedia("(max-width: 991px)");
        function handleMediaScreen(e) {
            if (e.matches) {
                $(".navbar-nav .sub").addClass("dropdown-menu");
                // $(".navbar-nav .dropdown").removeClass("show-dropdown");
                // $(".navbar-nav .sub").removeClass("sub-menu");

                $(".navbar-nav .dropdown-menu").parent("li").on('click', function (e) {
                    if (e.target.className !== "dropdown-item") {
                        $(this).find(">.dropdown-menu").toggle(300);
                        e.stopPropagation();
                    }
                });
            } else {
                $(".navbar-nav .dropdown-menu").parent("li").off("click");
                $("sub-dropdown").off("click");

                $(".navbar-nav .dropdown-menu").show();
                $(".navbar-nav .dropdown").addClass("show-dropdown");
                $(".navbar-nav .sub").addClass("sub-menu");
                $(".navbar-nav .sub").removeClass("dropdown-menu");
            }
        }
        handleMediaScreen(mobileSize);
        mobileSize.addEventListener("change", handleMediaScreen);

        // Navbar Custom Menu Button 
        $('.navbar-toggler').on('click', function () {
            $(this).toggleClass('open');
        });

        // Box Style 
        const targetBtn = document.querySelectorAll('.box-style')
        if (targetBtn) {
            targetBtn.forEach((element) => {
                element.addEventListener('mousemove', (e) => {
                    const x = e.offsetX + 'px';
                    const y = e.offsetY + 'px';
                    element.style.setProperty('--x', x);
                    element.style.setProperty('--y', y);
                })
            })
        }


    // cmn-btn effect
    $(function () {
        $('.cmn-btn')
            .on('mousemove', function (e) {
                var parentOffset = $(this).offset(),
                    relX = e.pageX - parentOffset.left,
                    relY = e.pageY - parentOffset.top;
                $(this).css({ '--top': relY + 'px', '--left': relX + 'px' });
            });
    });
    $(function () {
        $('.btn_box')
            .on('mousemove', function (e) {
                var parentOffset = $(this).offset(),
                    relX = e.pageX - parentOffset.left,
                    relY = e.pageY - parentOffset.top;
                $(this).css({ '--top': relY + 'px', '--left': relX + 'px' });
            });
    });


        // Circle Text
        const text = document.querySelector(".circle-text p");
        function applyCircleText(textElement, rotationStep) {
            if (textElement) {
                textElement.innerHTML = textElement.innerText.split('').map(
                    (char, i) =>
                        `<span style="transform:rotate(${i * rotationStep}deg)">${char}</span>`
                ).join('');
            }
        }
        const totalCharacters = 30; // Replace with the actual number of characters
        const rotationStep = 360 / totalCharacters;
        applyCircleText(text, rotationStep);

        // faq
        $(".header-area").on("click", function () {
            $('.accordion-single').removeClass("accordion_bg");
            $(this).parent().closest('.accordion-single').toggleClass("accordion_bg");
        });

        // Password Show Hide
        $('.password-eye-icon').on('click', function () {
            var passwordInput = $($(this).siblings(".input-pass input"));
            
            if (passwordInput.attr("type") == "password") {
                passwordInput.attr("type", "text");
            } else {
                passwordInput.attr("type", "password");
            }
            $(this).toggleClass('visible');
        });




        // progress bar
        $('.progress-done').each(function () {
            var $progress = $(this);
            var donePercentage = $progress.data('done') + '%';
            $progress.css('width', donePercentage);
            $progress.css('opacity', 1);
        });

        // // read-more-toggler
        // var readMoreBtn = $('.read-more-btn');
        // var readMoreContent = $('.read-more-content');
        // $(readMoreBtn).on('click', function () {
        //     $(readMoreContent).toggleClass('active');
        //     $(this).parent().toggleClass('btn-overlay');
        //     if ($(this).parent().hasClass("btn-overlay")) {
        //         $(this).text("Read More");
        //     } else {
        //         $(this).text("Okay, I get the point");
        //     }
        // });

        // sidebar-toggler
        $('.sidebar_toggler_btn').on('click', function (event) {
            var $sidebarSection = $(this).closest('.sidebar-section');
            $sidebarSection.css('position', 'relative');
            $sidebarSection.find('.sidebar-xxl-section, .sidebar-xl-section, .sidebar-lg-section, .sidebar-md-section').toggleClass('show');
            event.stopPropagation();
        });
        $(document).on('click', function (event) {
            if (!$(event.target).closest('.sidebar_toggler_btn, .sidebar-xxl-section, .sidebar-xl-section, .sidebar-lg-section, .sidebar-md-section').length) {
                $('.sidebar-xxl-section, .sidebar-xl-section, .sidebar-lg-section, .sidebar-md-section').removeClass('show');
            }
        });


        // comments-area
        $('.reply-btn').on('click', function () {
            $(this).closest(".author__content").find(".reply-form").slideToggle();
        });

        //    // reply
        //   $(".reply").on("click", function () {
        //     $(this).toggleClass("reply-active");
        //     $(this).parent().next(".reply__content").slideToggle();
        // });

        // fill strok text 
        $('.fill-stroke-text').on('mouseenter mouseleave', function () {
            $(this).toggleClass('dataContent');
            const strokeData = $('.fill-stroke-text.dataContent')[0].innerText;
            $(this).attr('data-content', strokeData);
        });

        // Current Year
        $(".currentYear").text(new Date().getFullYear());

        // Mouse Follower
        const follower = document.querySelector(".mouse-follower .cursor-outline");
        const dot = document.querySelector(".mouse-follower .cursor-dot");
        window.addEventListener("mousemove", (e) => {
            follower.animate(
                [
                    {
                        opacity: 1,
                        left: `${e.clientX}px`,
                        top: `${e.clientY}px`,
                        easing: "ease-in-out"
                    }
                ],
                {
                    duration: 3000,
                    fill: "forwards"
                }
            );
            dot.animate(
                [
                    {
                        opacity: 1,
                        left: `${e.clientX}px`,
                        top: `${e.clientY}px`,
                        easing: "ease-in-out"
                    }
                ],
                {
                    duration: 1500,
                    fill: "forwards"
                }
            );
        });



        // Custom Tabs
        $(".tablinks .nav-links").each(function () {
            var targetTab = $(this).closest(".singletab");
            targetTab.find(".tablinks .nav-links").each(function () {
                var navBtn = targetTab.find(".tablinks .nav-links");
                navBtn.click(function () {
                    navBtn.removeClass('active');
                    $(this).addClass('active');
                    var indexNum = $(this).closest("li").index();
                    var tabcontent = targetTab.find(".tabcontents .tabitem");
                    $(tabcontent).removeClass('active');
                    $(tabcontent).eq(indexNum).addClass('active');
                });
            });
        });

        // tabLinks add active 
        $('.tabLinks .nav-links').on('mouseenter', function () {
            $(this).addClass('active');
            $('.tabLinks .nav-links').not(this).removeClass('active');
        }
        );

        // custom Accordion
        $('.accordion-single .header-area').on('click', function () {
            if ($(this).closest(".accordion-single").hasClass("active")) {
                $(this).closest(".accordion-single").removeClass("active");
                $(this).next(".content-area").slideUp();
            } else {
                $(".accordion-single").removeClass("active");
                $(this).closest(".accordion-single").addClass("active");
                $(".content-area").not($(this).next(".content-area")).slideUp();
                $(this).next(".content-area").slideToggle();
            }
        });


    

  

        // Navbar Active Class Only for HTML
        var curUrl = $(location).attr('href');
        var terSegments = curUrl.split("/");
        var desired_segment = terSegments[terSegments.length - 1];
        var removeGarbage = desired_segment.split(".html")[0] + ".html";
        var checkLink = $('.navbar-nav a[href="' + removeGarbage + '"]');
        var targetClass = checkLink.addClass('active');
        targetClass.parents(".sub-dropdown").find("button").first().addClass('active');
        targetClass.parents(".show-dropdown").find("button").first().addClass('active');

        // Dropdown Active Remove
        // $("section, .close-btn").on('click', function () {
        //     $('.single-item').removeClass('active');
        // });

       

    });

});




