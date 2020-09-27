$(function(){
    var navpos = $("#subNav").offset();
    console.log(navpos.top);
    $(window).bind('scroll', function() {
        if ($(window).scrollTop() > navpos.top) {
         $('#subNav').addClass('fixed-top-2');
         }
         else {
           $('#subNav').removeClass('fixed-top-2');
         }
      });
});