const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");
const navLink = document.querySelectorAll(".nav-link");
const Main = document.getElementById("main");
const MainAdmin = document.getElementById("main-admin");
hamburger.addEventListener("click", mobileMenu);
navLink.forEach(n => n.addEventListener("click", closeMenu));

function mobileMenu() {
    if (Main) {
        sliding(Main,"slideUp", "slideDown")
    } else if (MainAdmin) {
        sliding(MainAdmin,"slideUp-admin", "slideDown-admin")
    }
}

function sliding(mainParameter,slideUpParameter, slideDownParameter) {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
    if (navMenu.classList.contains("active")) {
        mainParameter.classList.remove(slideUpParameter);
        mainParameter.classList.add(slideDownParameter);
    } else if (!navMenu.classList.contains("active")) {
        mainParameter.classList.remove(slideDownParameter);
        mainParameter.classList.add(slideUpParameter);
    }
}

function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}