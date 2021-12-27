console.firebug=true;
let sectionOnPage = $('section');
let htmlTag = document.querySelector("html");

$(function(){
    if(sectionOnPage.is('.home')){

        window.onload = function () {
           htmlTag.style.overflowX = "hidden";
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
        htmlTag.style.overflowX = "auto";
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
    if(sectionOnPage.is('.adminAbout')) {
        window.onload = function () {
            console.log(`About`);
        let sessionMessageDiv = document.querySelector('.session-display-admin-about');
        let sessionMessage = document.querySelector('.session-message-admin-about');
        console.log(sessionMessageDiv);
            console.log(sessionMessage);
        if (sessionMessageDiv && sessionMessage) {
            sessionHandle(sessionMessageDiv, sessionMessage);
        }}
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

