var tri = $('.triangle');

$(window).on('scroll', function(){
    $("#firstLogo").css("opacity", 1.8 - ($(window).scrollTop() / 350));
});

function triResize(){
    tri.css("border-left", $(window).width()/2 +"px solid transparent");
    tri.css("border-right", $(window).width()/2 +"px solid transparent");
    tri.css("border-bottom", $(window).width()/10 +"px solid #131313");
}
$(window).resize(function(){triResize();});
$(document).ready(triResize());