document.addEventListener("DOMContentLoaded", function () {
    var header = document.getElementById("header");
    if (!header) return; // Prevents the error if the element is missing

    var sticky = header.offsetTop;

    window.onscroll = function () {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    };
});
