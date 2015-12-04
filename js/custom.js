/**
 * Created by trickysoft-bris on 11/23/15.
 */
$(document).ready(function() {
    function HoverNavMethod() {

        if ($(window).width() > 767) {

            $('ul.nav li.dropdown').hover(function () {
                $(this).find('.dropdown-menu').stop(true, true).delay(80).fadeIn(400);
            }, function () {
                $(this).find('.dropdown-menu').stop(true, true).delay(80).fadeOut(400);
            });
        }
        else{
            $('ul.nav li.dropdown').hover(function () {
                $(this).find('.dropdown-menu').stop(true, true);
            }, function () {
                $(this).find('.dropdown-menu').stop(true, true);
            });
        }
    }

    HoverNavMethod();
    // bind resize event
    $(window).resize(HoverNavMethod);

});

$(document).ready(function(){
    $('.project_img_hover').mouseenter(function() {
        $(this).stop().fadeTo(400,0.6);
        //$('.zoom_portfolio').css('display', 'block').animate(2000);
    }).mouseleave( function() {
        $(this).stop().fadeTo(400,1);
        //$('.zoom_portfolio').css('display', 'none').animate(2000);
    });

});





