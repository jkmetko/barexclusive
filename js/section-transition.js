/**
 * POSITION SECTIONS ACCORDING TO WINDOW WIDTH
 *
 * @param sections
 */
function positionSections( sections ) {
    var wWidth = $(window).width();

    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null){
            return null;
        }
        else{
            return results[1] || 0;
        }
    }

    //alert($.urlParam('section'));
    if($.urlParam('section') == "contact"){
        $('#section1').addClass("active");
    }else{
        $('#section2').addClass("active");
    }

    sections.filter('.active').css({
        left: (wWidth / 2) - (sections.first().width() / 2)-15,
    });

    sections.not('.active').each(function( index ) {
        $(this).css({
            left: wWidth*(index+1) + 'px',
        });
    });
};

/**
 * MOVE SECTIONS ON X AXIS
 *
 * @param direction
 * @param wrapper
 */
function moveSections( direction, sections ){
    var wWidth = $(window).width();
    var offset = movement = sections.eq( 1 ).position().left - sections.eq( 0 ).position().left;

    sections.each(function( index ){
        var sign = (direction == 'left' ? '-' : '+');
        console.log(offset);

        $(this).animate({
            left: sign+'='+ offset +'px'
        }, 500);
    });
}

/**
 * INITIALIZE THE SECTIONS POSITIONING
 */
$(function(){
    var sectionsWrapper = $('.sections-transition-wrapper');
    var sections = $('.section-transition');
    var btnLeft = $('.section-transition-left');
    var btnRight = $('.section-transition-right');

    //initial positions
    positionSections( sections, sectionsWrapper );

    //move positions left on button click
    btnLeft.click(function(){
        moveSections( 'left', sections );
    });

    //move positions right on button click
    btnRight.click(function(){
        moveSections( 'right', sections );
    });
});

/**
 * REPOSITION SECTIONS AFTER WINDOW RESIZE
 */
$(window).resize(function(){
    var sections = $('.section-transition');

    positionSections( sections )
});