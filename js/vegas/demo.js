
/*

 IMPORTANT NOTE:

 For demo purpose only.

 Except the Sin City Promotional Material and the downloadable Vegas plugin,
 any reproduction, even partial, of this design is strictly prohibited
 without previous written authorisation from the author.

 */

/* jshint strict: false */

var $body       = $('body'),
    $characters = $('.characters'),
    $posters    = $('.characters-poster'),
    $names      = $('.characters-list a'),
    $label      = $('.characters-label');

var backgrounds = [
    { src: 'images/thumb_nav/album/1.jpg', valign: 'top' },
    { src: 'images/thumb_nav/album/2.jpg', valign: 'top' },
    { src: 'images/thumb_nav/album/3.jpg', valign: 'top' },

];

var posters = [
    { src: 'images/thumb_nav/album/1.jpg' },
    { src: 'images/thumb_nav/album/2.jpg' },
    { src: 'images/thumb_nav/album/3.jpg' },
    { src: 'images/thumb_nav/album/4.jpg' },
    { src: 'images/thumb_nav/album/6.jpg' },
    { src: 'images/thumb_nav/album/7.jpg' },
    { src: 'images/thumb_nav/album/8.jpg' },
    { src: 'images/thumb_nav/album/9.jpg' }
];

var backdrops = [
    { src: 'images/thumb_nav/album/1.jpg' },
    { src: 'images/thumb_nav/album/2.jpg' },
    { src: 'images/thumb_nav/album/3.jpg' },
    { src: 'images/thumb_nav/album/4.jpg' },
    { src: 'images/thumb_nav/album/6.jpg' },
    { src: 'images/thumb_nav/album/7.jpg' },
    { src: 'images/thumb_nav/album/8.jpg' },
    { src: 'images/thumb_nav/album/9.jpg' }
];

$('html').addClass('animated');

var displayBackdrops = false;

$body.vegas({
    preload: false,
    timer:false,
    overlay: 'js/vegas/overlays/01.png',
    transitionDuration: 4000,
    delay: 10000,
    slides: backgrounds,
    walk: function (nb, settings) {
        if (settings.video) {
            $('.logo').addClass('collapsed');
        } else {
            $('.logo').removeClass('collapsed');
        }
    }
});

$posters.vegas({
        preload: true,
        transition: 'swirlLeft2',
        transitionDuration: 1000,
        timer: false,
        delay: 5000,
        slides: posters,
        walk: function (nb) {
            $('.characters-list li')
                .removeClass('active')
                .eq(nb)
                .addClass('active');

            var name = $names.eq(nb).data('character');

            $label
                .removeClass('animated');

            setTimeout(function () {
                $label
                    .text(name)
                    .addClass('animated');
            }, 250);

            if (displayBackdrops === true) {
                var backdrop;

                backdrop = backdrops[nb];
                backdrop.animation  = 'kenburns';
                backdrop.animationDuration = 20000;
                backdrop.transition = 'fade';
                backdrop.transitionDuration = 1000;

                $body
                    .vegas('options', 'slides', [ backdrop ])
                    .vegas('next');
            }
        }
    })
    .on('mouseenter', function () {
        displayBackdrops = true;

        $posters
            .vegas('trigger', 'walk')
            .vegas('pause');
    })
    .on('click', debounce(function () {
        $posters.vegas('next');
    }, 250, true));

$characters
    .on('mouseenter', function () {
        displayBackdrops = true;
    })
    .on('mouseleave', function () {
        displayBackdrops = false;

        $body
            .vegas('options', 'slides', backgrounds)
            .vegas('next');

        $posters.vegas('play');
    });

$names
    .on('mouseenter', debounce(function (e) {
        e.preventDefault();

        var index = $(this).index('.characters-list a');

        $posters
            .vegas('jump', index)
            .vegas('pause');
    }, 250));

// JavaScript Debounce Function
// By David Walsh
// http://davidwalsh.name/javascript-debounce-function

function debounce (func, wait, immediate) {
    var timeout;

    return function () {
        var context = this,
            args = arguments,
            later = function() {
                timeout = null;

                if (!immediate) {
                    func.apply(context, args);
                }
            },
            callNow = immediate && !timeout;

        clearTimeout(timeout);
        timeout = setTimeout(later, wait || 500);

        if (callNow) {
            func.apply(context, args);
        }
    };
}