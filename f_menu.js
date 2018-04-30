var main = document.getElementById("main");
var mainTop="0px";

window.onload = function() {
    mainTop = main.style.marginTop;
}
function openNav() {
    document.getElementById("dropMenu").style.width = "100%";
}
function closeNav() {
    document.getElementById("dropMenu").style.width = "0";
}
function returnNav(){
    if (window.innerWidth > screen.width-10 && window.innerHeight > screen.height-10){
        closeNav();
        main.style.marginTop="0px";
    } else {
        main.style.marginTop=mainTop;
        if (window.innerWidth>600){
            openNav();
        } else {
            closeNav();
        }
    }
}