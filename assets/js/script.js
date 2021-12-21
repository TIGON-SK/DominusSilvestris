console.firebug=true;
let sectionOnPage = $('section');
$(function(){
    if(sectionOnPage.is('.home')){
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

    }
    if(sectionOnPage.is('.eshop')) {
        window.onload = function () {
            let sessionMessageDiv = document.querySelector('.order-state-div');
            let sessionMessage = document.querySelector('.order-state-message');
            let sessionMessageDivAdmin = document.querySelector('.session-display-admin-eshop');
            let sessionMessageAdmin = document.querySelector('.session-message-admin-eshop');
            if (sessionMessageDiv && sessionMessage){
                sessionHandle(sessionMessageDiv,sessionMessage);
            }else{
                sessionHandle(sessionMessageDivAdmin,sessionMessageAdmin);
            }

        }
    }
    function sessionHandle(sessionMessageDiv,sessionMessage){

        if (sessionMessage.textContent!==""){
            sessionMessageDiv.style.display="block";
        }
        else{
            sessionMessageDiv.style.display="none";
        }
    }
});

