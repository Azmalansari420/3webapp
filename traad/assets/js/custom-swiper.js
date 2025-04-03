var sliderThree = new Swiper(".myswiper", {
  slidesPerView: 3,
  spaceBetween: 12,
  loop: false,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

var sliderTwo = new Swiper(".slider-2", {
  slidesPerView: 2.3,
  spaceBetween: 12,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

var sliderOne = new Swiper(".slider-1", {
  slidesPerView: 1,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
