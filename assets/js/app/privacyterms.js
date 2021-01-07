$(function(){
    $(".collapse").on('show.bs.collapse', function(){
        $(this).prev(".card-header").find(".fas").removeClass("fa-chevron-right").addClass("fa-chevron-down");
    }).on('hide.bs.collapse', function(){
        $(this).prev(".card-header").find(".fas").removeClass("fa-chevron-down").addClass("fa-chevron-right");
    });
});