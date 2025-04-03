/*========================
 Manifest js
 ==========================*/
window.onload = () => {
  'use strict';
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker
      .register('sw.js');
  }
}


/*====================
 Ratio js
=======================*/
window.addEventListener("load", () => {
  const bgImg = document.querySelectorAll(".bg-img");
  for (i = 0; i < bgImg.length; i++) {
    let bgImgEl = bgImg[i];
    /// Optional Class Add ///
    if (bgImgEl.classList.contains("bg-top")) {
      bgImgEl.parentNode.classList.add("b-top");
    } else if (bgImgEl.classList.contains("bg-bottom")) {
      bgImgEl.parentNode.classList.add("b-bottom");
    } else if (bgImgEl.classList.contains("bg-center")) {
      bgImgEl.parentNode.classList.add("b-center");
    } else if (bgImgEl.classList.contains("bg-left")) {
      bgImgEl.parentNode.classList.add("b-left");
    } else if (bgImgEl.classList.contains("bg-right")) {
      bgImgEl.parentNode.classList.add("b-right");
    }

    /// Lazyloader Class Add ///
    if (bgImgEl.classList.contains("blur-up")) {
      bgImgEl.parentNode.classList.add("blur-up", "lazyload");
    }

    /// Size Class Add ///
    if (bgImgEl.classList.contains("bg_size_content")) {
      bgImgEl.parentNode.classList.add("b_size_content");
    }

    /// Ratio Style ///
    bgImgEl.parentNode.classList.add("bg-size");
    const bgSrc = bgImgEl.src;
    bgImgEl.style.display = "none";
    bgImgEl.parentNode.setAttribute(
      "style",
      `
background-image: url(${bgSrc});
background-size:cover;
background-position: center;
background-repeat: no-repeat;
display: block;
`
    );
  }
});


/*==================
  Loader js
======================*/
const loaderSpan = document.querySelector(".loader").children;
const animate = function () {
  document.querySelector(".loader").classList.toggle("animate");
};

const timeOutAnimation = setInterval(animate, 1000);
document.onreadystatechange = function () {
  if (document.readyState !== "complete") {
    timeOutAnimation;
  } else {
    setTimeout(function () {
      document.querySelector(".loader-wrapper").classList.add("hidden");
      clearInterval(timeOutAnimation);
    }, 1000);
  }
};


/*==================
  RTL js
======================*/
// remove this js if not needed
const dirSwitch = document.querySelector('#dir-switch');
const htmlDom = document.querySelector('html');
const rtlLink = document.querySelector('#rtl-link');
const initialCheck = localStorage.getItem('dir');
if (dirSwitch) {
  if (initialCheck === 'rtl') dirSwitch.checked = true;
}
dirSwitch?.addEventListener('change', (e) => {
  const checkbox = e.target;
  console.log(checkbox.checked);
  if (checkbox.checked) {
    htmlDom.setAttribute('dir', 'rtl');
    rtlLink.href = 'assets/css/vendors/bootstrap.rtl.css';
    localStorage.setItem('rtlcss', 'assets/css/vendors/bootstrap.rtl.css');
    localStorage.setItem('dir', 'rtl');
  }

  if (!checkbox.checked) {
    htmlDom.setAttribute('dir', 'ltr');
    rtlLink.href = 'assets/css/vendors/bootstrap.css';
    localStorage.setItem('rtlcss', 'assets/css/vendors/bootstrap.css');
    localStorage.setItem('dir', 'ltr');
  }
});
// Rtl
htmlDom.setAttribute('dir', localStorage.getItem('dir') ? localStorage.getItem('dir') : 'ltr');
rtlLink.href = localStorage.getItem('rtlcss') ? localStorage.getItem('rtlcss') : 'assets/css/vendors/bootstrap.css';