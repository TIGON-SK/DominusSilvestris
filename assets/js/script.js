window.onload = function () {
    let carouselContainer = document.getElementById("carousel-container");
    let carouselSlide = document.getElementById("carousel-slide");
    let carouselImg = document.getElementById("first");
    let height = carouselImg.clientHeight;
    carouselContainer.style.height = (height) + "px";
    carouselSlide.style.height = (height) + "px";
}
window.onresize = function () {
    let carouselContainer = document.getElementById("carousel-container");
    let carouselSlide = document.getElementById("carousel-slide");
    let carouselImg = document.getElementById("first");
    let height = carouselImg.clientHeight;
    carouselContainer.style.height = (height) + "px";
    carouselSlide.style.height = (height) + "px";
}