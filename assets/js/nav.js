const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");
const navLink = document.querySelectorAll(".nav-link");
const Main = document.getElementById("main");
hamburger.addEventListener("click", mobileMenu);
navLink.forEach(n => n.addEventListener("click", closeMenu));

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
    if(navMenu.classList.contains("active")){
        Main.classList.remove("slideUp");
        Main.classList.add("slideDown");
    }else if(!navMenu.classList.contains("active")){
        Main.classList.remove("slideDown");
        Main.classList.add("slideUp");
    }
}

function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}

