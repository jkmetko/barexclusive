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


