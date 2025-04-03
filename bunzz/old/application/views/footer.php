<?php
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
?>

<section class="section social-footer mt-0">
  <div class=" p-0">



    <img class="hide-mobile" src="<?=base_url() ?>img//section-banner3.jpg" alt="Want more? Connect with US">
    <!-- <img class="hide-mobile" src="img/social-icon-bg.jpg" alt="Want more? Connect with US"> -->



    <!-- SOCIAL MEDIA ICONS -->

    <div class="icons-footer just-tablet-mobile">

      <ul>

        <li>
          <a class="facebook" rel="nofollow noopener noreferrer" href="https://www.facebook.com/lays/" target="_blank">
            <span class="srt">Facebook</span>
            <i class="bi bi-facebook text-white"></i>
          </a>
        </li>
        <li>
          <a class="twitter" rel="nofollow noopener noreferrer" href="https://www.twitter.com/lays/" target="_blank">
            <span class="srt">Twitter</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="28" fill="currentColor" class="bi bi-twitter-x text-white" viewBox="0 0 16 16">
              <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
            </svg>
          </a>
        </li>
        <li>
          <a class="instagram" rel="nofollow noopener noreferrer" href="https://www.instagram.com/lays/"
            target="_blank">
            <span class="srt">Instagram</span>
            <i class="bi bi-instagram text-white"></i>
          </a>
        </li>
        <li>
          <a class="youtube" rel="nofollow noopener noreferrer" href="https://www.youtube.com/user/lays/"
            target="_blank">
            <span class="srt">YouTube</span>
            <i class="bi bi-youtube text-white"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</section>

<footer>

  <div class="container">

    <!-- LEGAL LINKS (PRIVACY, ETC.) -->
    <ul class="footer-links">


      <li>
        <a data-hover="PepsiCo Foodservice" target="_blank" rel="nofollow noopener noreferrer"
          href="<?=base_url() ?>about-us.php">
          About Us
          <span class="srt"> (opens a new window)</span>
        </a>
      </li>

      <li>
        <a data-hover="Contact Us" target="_blank" rel="nofollow noopener noreferrer"
          href="<?=base_url() ?>contact.php">
          Contact Us
          <span class="srt"> (opens a new window)</span>
        </a>
      </li>



      <!-- <li>
        <a data-hover="Terms &amp; Conditions" target="_blank" rel="nofollow noopener noreferrer"
          href="https://contact.pepsico.com/FritoLay/terms-conditions">
          Terms &amp; Conditions
          <span class="srt"> (opens a new window)</span>
        </a>
      </li> -->


      <li>
        <a data-hover="Privacy Policy" target="_blank" rel="nofollow noopener noreferrer"
          href="<?=base_url() ?>privacy-policy.php">
          Privacy Policy
          <span class="srt"> (opens a new window)</span>
        </a>
      </li>






      <li>
        <div id="teconsent" consent="0,1,2" aria-label="Open Cookie Preferences Modal" role="complementary">

          <a href="#">Cookies Preferences</a>
        </div>
      </li>

    </ul>

    <div class="footer-logo">
      <img class="play" src="<?=base_url() ?>img/bunzz-logo-fnl.png" width="100px" alt="Bunzz logo">
    </div>

    <!-- COPYRIGHT -->
    <p class="copyright">©
      2024
      All rights reserved BUNZZ</p>

  </div>

</footer>

<!-- Back to Top -->
<a href="#" class="btn  rounded-circle back-to-top"><i class="fa fa-arrow-up text-white"></i></a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url() ?>lib/easing/easing.min.js"></script>
<script src="<?=base_url() ?>lib/waypoints/waypoints.min.js"></script>
<script src="<?=base_url() ?>lib/lightbox/js/lightbox.min.js"></script>
<script src="<?=base_url() ?>lib/owlcarousel/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.2.2/mixitup.min.js'></script>
<!-- fancybox -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js'></script>
<script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
<!-- Template Javascript -->
<script src="<?=base_url() ?>js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000, // Animation duration in ms
    once: true // Animation occurs only once when scrolling
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.2/vanilla-tilt.min.js"></script>


<script>
  VanillaTilt.init(document.querySelectorAll(".tilt"), {
    max: 15, // Maximum tilt angle
    speed: 400, // Transition speed
    scale: 0.1, // Scale on hover
    glare: true, // Add a glare effect
    "max-glare": 0.5 // Maximum glare opacity
  });
</script>

<!-- <script>
  document.addEventListener("DOMContentLoaded", () => {
    function counter(id, start, end, duration) {
      let obj = document.getElementById(id),
        current = start,
        range = end - start,
        increment = end > start ? 1 : -1,
        step = Math.abs(Math.floor(duration / range)),
        timer = setInterval(() => {
          current += increment;
          obj.textContent = current;
          if (current == end) {
            clearInterval(timer);
          }
        }, step);
    }
    counter("count1", 50, 107, 1000);
    counter("count2", 9911, 10000, 1000);
    counter("count3", 0, 21, 1000);
    counter("count4", 10, 56, 1000);
  });
</script> -->

<script>
  $('#customers-teams').owlCarousel({
    loop: true,
    center: true,
    items: 3,
    margin: 10,
    autoplay: true,
    dots: false,
    autoplayTimeout: 4500,
    checkVisibility: true,
    autoWidth: true, // Prevents inline width styles
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      1170: {
        items: 3
      }
    }
  });
</script>


<script>
  $('#customers-video').owlCarousel({
    loop: true,
    center: false,
    items: 4,
    margin: 0,
    autoplay: true,
    dots: false,
    autoplayTimeout: 4500,
    checkVisibility: true,
    responsive: {
      0: {
        items: 1,
        center: true
      },
      768: {
        items: 2
      },
      1170: {
        items: 4
      }
    }
  });
</script>

<script>
  $(document).ready(function() {
    const swiper = new Swiper('.swiper-container', {
      loop: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      keyboard: {
        enabled: true,
        onlyInViewport: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      effect: 'slide',
    });

  });
</script>
<script>
  $(document).ready(function() {
    const swiper = new Swiper('.pro-slider', {
      loop: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      keyboard: {
        enabled: true,
        onlyInViewport: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      effect: 'slide',

      // Responsive breakpoints
      breakpoints: {
        // When the viewport width is >= 320px
        320: {
          slidesPerView: 1, // Show 1 slide at a time on small screens
          spaceBetween: 0, // Space between slides in pixels
        },
        // When the viewport width is >= 768px
        768: {
          slidesPerView: 2, // Show 2 slides at a time
          spaceBetween: 0,
        },
        // When the viewport width is >= 1024px
        1024: {
          slidesPerView: 4, // Show 3 slides at a time
          spaceBetween: 0,
        },
        // When the viewport width is >= 1440px (large desktop)
        1440: {
          slidesPerView: 4, // Show 4 slides at a time on desktops
          spaceBetween: 0,
        },
      }
    });
  });
</script>


<script>
  $(document).ready(function() {
    // First row - Right to Left
    const swiperRow1 = new Swiper('.pro-gallery', {
      loop: true,
      slidesPerView: 4, // 4 slides for desktop
      spaceBetween: 0, // No gap
      autoplay: {
        delay: 10000,
        disableOnInteraction: false,
        reverseDirection: true, // Move right to left

      },
      breakpoints: {
        320: {
          slidesPerView: 1
        }, // 1 slide for mobile
        768: {
          slidesPerView: 2
        }, // 2 slides for tablets
        1024: {
          slidesPerView: 4
        }, // 3 slides for laptops
        1440: {
          slidesPerView: 4
        }, // 4 slides for desktop
      },
    });

    // Second row - Left to Right
    const swiperRow2 = new Swiper('.pro-gallery-second', {
      loop: true,
      slidesPerView: 4, // 4 slides for desktop
      spaceBetween: 0, // No gap
      autoplay: {
        delay: 10000,
        disableOnInteraction: false,

      },
      breakpoints: {
        320: {
          slidesPerView: 1
        }, // 1 slide for mobile
        768: {
          slidesPerView: 2
        }, // 2 slides for tablets
        1024: {
          slidesPerView: 4
        }, // 3 slides for laptops
        1440: {
          slidesPerView: 4
        }, // 4 slides for desktop
      },
    });
  });
</script>

<script>
  // Select all menu items
  const menuItems = document.querySelectorAll('.nav-item');

  // Add click event listeners to each menu item
  menuItems.forEach(item => {
    item.addEventListener('click', () => {
      // Remove 'active' class from all menu items
      menuItems.forEach(menu => menu.classList.remove('active'));

      // Add 'active' class to the clicked menu item
      item.classList.add('active');
    });
  });
</script>

<script>
  // JavaScript to toggle visibility of the input field
  document.getElementById('queryTypeSelect').addEventListener('change', function() {
    const distributionInput = document.getElementById('distributionInput');
    if (this.value === "For Careers") {
      distributionInput.style.display = "none"; // Hide the input
      distributionInput.removeAttribute('required'); // Remove required attribute
    } else {
      distributionInput.style.display = "block"; // Show the input
      distributionInput.setAttribute('required', true); // Add required attribute
    }
  });
</script>

<script>
  $(document).ready(function() {
    $('.banner-slider').slick({
      dots: true, // Show navigation dots
      infinite: true, // Infinite loop
      speed: 500, // Slide transition speed
      slidesToShow: 1, // Show 1 slide at a time
      slidesToScroll: 1, // Scroll 1 slide at a time
      autoplay: true, // Autoplay slides
      autoplaySpeed: 2000, // Autoplay speed in milliseconds (2 seconds)
      arrows: false // Hide navigation arrows
    });
  });
</script>
<script>
  document.getElementById('weightFilter').addEventListener('change', function() {
    const selectedWeight = this.value; // Get selected value
    const productCards = document.querySelectorAll('.product-card'); // Get all product cards

    productCards.forEach(card => {
      const productWeight = card.getAttribute('data-weight'); // Get the weight attribute
      if (selectedWeight === 'all' || productWeight === selectedWeight) {
        card.style.display = 'block'; // Show the product
      } else {
        card.style.display = 'none'; // Hide the product
      }
    });
  });
</script>

<script>
  const mainImages = document.querySelectorAll('.main-image img');
  const thumbnails = document.querySelectorAll('.thumbnails img');
  const leftArrow = document.querySelector('.arrow.left');
  const rightArrow = document.querySelector('.arrow.right');
  let currentIndex = 0;

  // Function to show the active image
  function showImage(index) {
    mainImages.forEach((img, i) => {
      img.classList.toggle('active', i === index);
    });
    thumbnails.forEach((thumb, i) => {
      thumb.classList.toggle('active', i === index);
    });
  }

  // Thumbnail click event
  thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => {
      currentIndex = index;
      showImage(index);
    });
  });

  // Arrow navigation
  leftArrow.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + mainImages.length) % mainImages.length;
    showImage(currentIndex);
  });

  rightArrow.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % mainImages.length;
    showImage(currentIndex);
  });

  // Auto-slide functionality
  function autoSlide() {
    currentIndex = (currentIndex + 1) % mainImages.length;
    showImage(currentIndex);
  }

  // Start auto-slide
  let slideInterval = setInterval(autoSlide, 3000);

  // Pause auto-slide when hovering over the gallery
  const gallery = document.querySelector('.gallery');
  gallery.addEventListener('mouseenter', () => clearInterval(slideInterval));
  gallery.addEventListener('mouseleave', () => slideInterval = setInterval(autoSlide, 3000));
</script>
</body>

</html>