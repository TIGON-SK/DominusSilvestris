var input = document.querySelector('.pswrd');
var show = document.querySelector('.show');
show.addEventListener('click', active);
function active(){
    if(input.type === "password"){
        input.type = "text";
        show.style.color = "#1DA1F2";
        show.innerHTML = "<i class=\"fas fa-eye-slash\"></i>";
    }else{
        input.type = "password";
        show.innerHTML = "<i class=\"fas fa-eye\"></i>";
        show.style.color = "#111";
    }
}