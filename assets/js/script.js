window.onload = function () {
    let carouselContainer = document.getElementById("carousel-container")
    let carouselImg = document.getElementById("first");
    let height = carouselImg.clientHeight;
    console.log(height);
    carouselContainer.style.height = (height) + "px";
}
window.onresize = function () {
    let carouselContainer = document.getElementById("carousel-container")
    let carouselImg = document.getElementById("first");
    let height = carouselImg.clientHeight;
    console.log(height);
    carouselContainer.style.height = (height) + "px";
}