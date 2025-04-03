var swiper2 = new Swiper(".story-box", {
  slidesPerView: 4.6,
  freeMode: true,
  spaceBetween: 15,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});


var storySlider = new Swiper(".story__slider", {
  slidesPerView: 1,
  centeredSlides: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false
  },
  pagination: {
    el: ".swiper-pagination",
    type: "progressbar",
    clickable: true,
  },
  on: {
    autoplayTimeLeft(s, time, progress) {
      progressCircle.style.setProperty("--progress", 1 - progress);
      progressContent.textContent = `${Math.ceil(time / 1000)}s`;
    }
  }
});

var swiper4 = new Swiper(".onboarding", {
  slidesPerView: 1,
  spaceBetween: 0,
  keyboard: true,

  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
});