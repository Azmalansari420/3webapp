/*====================
  RTL js
======================*/
const dirSwitch = document.querySelector("#dir-switch");
const htmlDom = document.querySelector("html");
const rtlLink = document.querySelector("#rtl-link");
const initialCheck = localStorage.getItem("dir");

if (dirSwitch) {
    if (initialCheck === "rtl") dirSwitch.checked = true;
}
dirSwitch?.addEventListener("change", (e) => {
    const checkbox = e.target;
    console.log(checkbox.checked);
    if (checkbox.checked) {
        htmlDom.setAttribute("dir", "rtl");
        rtlLink.href = "assets/css/vendors/bootstrap.rtl.min.css";
        localStorage.setItem("rtlcss", "assets/css/vendors/bootstrap.rtl.min.css");
        localStorage.setItem("dir", "rtl");
    }

    if (!checkbox.checked) {
        htmlDom.setAttribute("dir", "ltr");
        rtlLink.href = "assets/css/vendors/bootstrap.css";
        localStorage.setItem("rtlcss", "assets/css/vendors/bootstrap.css");
        localStorage.setItem("dir", "ltr");
    }
});
// Rtl
htmlDom.setAttribute("dir", localStorage.getItem("dir")?localStorage.getItem("dir") : "ltr");
rtlLink.href = localStorage.getItem("rtlcss")?localStorage.getItem("rtlcss") : "assets/css/vendors/bootstrap.css";

/*====================
  Dark js
======================*/
const darkSwitch = document.querySelector("#dark-switch");
const bodyDom = document.querySelector("body");
const initialDarkCheck = localStorage.getItem("layout_version");
if (darkSwitch) {
    if (initialDarkCheck === "dark") darkSwitch.checked = true;
}
darkSwitch?.addEventListener("change", (e) => {
    const checkbox = e.target;
    if (checkbox.checked) {
        bodyDom.classList.add("dark");
        localStorage.setItem("layout_version", "dark");
    }

    if (!checkbox.checked) {
        bodyDom.classList.remove("dark");
        localStorage.removeItem("layout_version");
    }
});

if (localStorage.getItem("layout_version") == "dark") {
    bodyDom.classList.add("dark");
}