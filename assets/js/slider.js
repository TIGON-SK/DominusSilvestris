(function ($) {
    let carouselSlide = $("#carousel-slide");
    let counter = 1;
    let b = false;
    let imgsCount = 6;
    let counterElement = $('#countNum');
    setInterval(function () {
        carouselSlide.children(':not(:last)').show();
        carouselSlide.children(':last').fadeOut(2000, function () {
            $(this).prependTo(carouselSlide);
        }).prev().fadeIn(3000);
        if (b === true) {
            b = false;
        } else {
            b = true;
            counterElement.fadeIn(2000).text(counter);
            counterElement.fadeOut(2000);
            counter++;
            if (counter === imgsCount + 1) {
                counter = 1;
            }
        }
    }, 2000);
})(jQuery);
