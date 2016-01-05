<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>
    <!--
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    -->
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/master-nav.css">
    <link rel="stylesheet" type="text/css" href="css/content-wraper.css">
    <link rel="stylesheet" type="text/css" href="css/style_horizontal.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">

    <!-- Flip gallery css -->
    <link rel="stylesheet" href="css/flip_gallery.css" type="text/css" media="screen"/>

    <!-- jQuery -->
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/jsBackgroundSlideshow/jquery.sublimeSlideshow.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            function LoadPage() {

                if ($(window).width() > 767) {
                    window.location.replace('gallery_thumb.php');
                }
            }
            LoadPage();
            // bind resize event
            $(window).resize(LoadPage);

        });

    </script>

    <script type="text/javascript">

        $(document).ready(function(){
            function TestMethod() {

                if ($(window).width() > 767) {

                    $.sublime_slideshow({
                        src:[
                            {url:"images/supersize/1.jpg"},
                            {url:"images/supersize/2.jpg"},
                            {url:"images/supersize/3.jpg"}
                        ],
                        duration:   6,
                        fade:       1,
                        scaling:    false,
                        rotating:   false,
                        overlay:    "images/pattern.png"
                    });
                }
                else{
                    $.sublime_slideshow({
                        src:[
                            {url:"images/supersize/4.jpg"},
                            {url:"images/supersize/5.jpg"},
                            {url:"images/supersize/6.jpg"}
                        ],
                        duration:   6,
                        fade:       3,
                        scaling:    false,
                        rotating:   false,
                        overlay:    "images/pattern.png"
                    });

                    var initPhotoSwipeFromDOM = function(gallerySelector) {

                        // parse slide data (url, title, size ...) from DOM elements
                        // (children of gallerySelector)
                        var parseThumbnailElements = function(el) {
                            var thumbElements = el.childNodes,
                                numNodes = thumbElements.length,
                                items = [],
                                figureEl,
                                linkEl,
                                size,
                                item;

                            for(var i = 0; i < numNodes; i++) {

                                figureEl = thumbElements[i]; // <figure> element

                                // include only element nodes
                                if(figureEl.nodeType !== 1) {
                                    continue;
                                }

                                linkEl = figureEl.children[0]; // <a> element

                                size = linkEl.getAttribute('data-size').split('x');

                                // create slide object
                                item = {
                                    src: linkEl.getAttribute('href'),
                                    w: parseInt(size[0], 10),
                                    h: parseInt(size[1], 10)
                                };



                                if(figureEl.children.length > 1) {
                                    // <figcaption> content
                                    item.title = figureEl.children[1].innerHTML;
                                }

                                if(linkEl.children.length > 0) {
                                    // <img> thumbnail element, retrieving thumbnail url
                                    item.msrc = linkEl.children[0].getAttribute('src');
                                }

                                item.el = figureEl; // save link to element for getThumbBoundsFn
                                items.push(item);
                            }

                            return items;
                        };

                        // find nearest parent element
                        var closest = function closest(el, fn) {
                            return el && ( fn(el) ? el : closest(el.parentNode, fn) );
                        };

                        // triggers when user clicks on thumbnail
                        var onThumbnailsClick = function(e) {
                            e = e || window.event;
                            e.preventDefault ? e.preventDefault() : e.returnValue = false;

                            var eTarget = e.target || e.srcElement;

                            // find root element of slide
                            var clickedListItem = closest(eTarget, function(el) {
                                return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
                            });

                            if(!clickedListItem) {
                                return;
                            }

                            // find index of clicked item by looping through all child nodes
                            // alternatively, you may define index via data- attribute
                            var clickedGallery = clickedListItem.parentNode,
                                childNodes = clickedListItem.parentNode.childNodes,
                                numChildNodes = childNodes.length,
                                nodeIndex = 0,
                                index;

                            for (var i = 0; i < numChildNodes; i++) {
                                if(childNodes[i].nodeType !== 1) {
                                    continue;
                                }

                                if(childNodes[i] === clickedListItem) {
                                    index = nodeIndex;
                                    break;
                                }
                                nodeIndex++;
                            }



                            if(index >= 0) {
                                // open PhotoSwipe if valid index found
                                openPhotoSwipe( index, clickedGallery );
                            }
                            return false;
                        };

                        // parse picture index and gallery index from URL (#&pid=1&gid=2)
                        var photoswipeParseHash = function() {
                            var hash = window.location.hash.substring(1),
                                params = {};

                            if(hash.length < 5) {
                                return params;
                            }

                            var vars = hash.split('&');
                            for (var i = 0; i < vars.length; i++) {
                                if(!vars[i]) {
                                    continue;
                                }
                                var pair = vars[i].split('=');
                                if(pair.length < 2) {
                                    continue;
                                }
                                params[pair[0]] = pair[1];
                            }

                            if(params.gid) {
                                params.gid = parseInt(params.gid, 10);
                            }

                            return params;
                        };

                        var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
                            var pswpElement = document.querySelectorAll('.pswp')[0],
                                gallery,
                                options,
                                items;

                            items = parseThumbnailElements(galleryElement);

                            // define options (if needed)
                            options = {

                                // define gallery index (for URL)
                                galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                                getThumbBoundsFn: function(index) {
                                    // See Options -> getThumbBoundsFn section of documentation for more info
                                    var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                                        pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                                        rect = thumbnail.getBoundingClientRect();

                                    return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
                                }

                            };

                            // PhotoSwipe opened from URL
                            if(fromURL) {
                                if(options.galleryPIDs) {
                                    // parse real index when custom PIDs are used
                                    // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                                    for(var j = 0; j < items.length; j++) {
                                        if(items[j].pid == index) {
                                            options.index = j;
                                            break;
                                        }
                                    }
                                } else {
                                    // in URL indexes start from 1
                                    options.index = parseInt(index, 10) - 1;
                                }
                            } else {
                                options.index = parseInt(index, 10);
                            }

                            // exit if index not found
                            if( isNaN(options.index) ) {
                                return;
                            }

                            if(disableAnimation) {
                                options.showAnimationDuration = 0;
                            }

                            // Pass data to PhotoSwipe and initialize it
                            gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
                            gallery.init();
                        };

                        // loop through all gallery elements and bind events
                        var galleryElements = document.querySelectorAll( gallerySelector );

                        for(var i = 0, l = galleryElements.length; i < l; i++) {
                            galleryElements[i].setAttribute('data-pswp-uid', i+1);
                            galleryElements[i].onclick = onThumbnailsClick;
                        }

                        // Parse URL and open gallery if it contains #&pid=3&gid=1
                        var hashData = photoswipeParseHash();
                        if(hashData.pid && hashData.gid) {
                            openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
                        }
                    };

                    // execute above function
                    initPhotoSwipeFromDOM('.my-gallery');
                }
            }

            TestMethod();
            // bind resize event
            $(window).resize(TestMethod);

        });
    </script>


    <!-- PHOTO SWIPE -->
    <!-- Core CSS file -->
    <link rel="stylesheet" href="PhotoSwipe/dist/photoswipe.css">

    <!-- Skin CSS file (styling of UI - buttons, caption, etc.)
         In the folder of skin CSS file there are also:
         - .png and .svg icons sprite,
         - preloader.gif (for browsers that do not support CSS animations) -->
    <link rel="stylesheet" href="PhotoSwipe/dist/default-skin/default-skin.css">

    <!-- Core JS file -->
    <script src="PhotoSwipe/dist/photoswipe.min.js"></script>

    <!-- UI JS file -->
    <script src="PhotoSwipe/dist/photoswipe-ui-default.min.js"></script>

    <link rel="SHORTCUT ICON" href="img/ico.jpg">
    <style type="text/css">
        .my-gallery {
            width: 100%;
            float: left;
        }
        .my-gallery img {
            width: 100%;
            height: auto;
        }
        .my-gallery figure {
            display: block;
            float: left;
            margin: 0 5px 5px 0;
            width: 150px;
        }
        .my-gallery figcaption {
            display: none;
        }
    </style>
</head>

<body>

    <?php include('page_layout/nav_menu.php'); ?>

    <div class="container body_content">
        <div class="content_wrapper_home">
            <p class="p_logo_2"><img src="img/logo2.png" style="position: relative; left: 15px; top: 5px"
                                     class="img-responsive"> <br/><br/>
            </p>

            <div class="home_content">

                <h3 class="gallery-h3-name">COCKTAIL BAR</h3>

                <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">

                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="images/thumb_nav/album/7.jpg" itemprop="contentUrl" data-size="1024x572">
                            <img src="images/thumb_nav/album/thumbs/7.jpg" itemprop="thumbnail" alt="Image description" />
                        </a>
                        <figcaption itemprop="caption description">Image caption  1</figcaption>

                    </figure>

                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="images/thumb_nav/album/6.jpg" itemprop="contentUrl" data-size="1024x572">
                            <img src="images/thumb_nav/album/thumbs/6.jpg" itemprop="thumbnail" alt="Image description" />
                        </a>
                        <figcaption itemprop="caption description">Image caption 2</figcaption>
                    </figure>

                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="images/thumb_nav/album/8.jpg" itemprop="contentUrl" data-size="1024x572">
                            <img src="images/thumb_nav/album/thumbs/8.jpg" itemprop="thumbnail" alt="Image description" />
                        </a>
                        <figcaption itemprop="caption description">Image caption 3</figcaption>
                    </figure>

                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="images/thumb_nav/album/9.jpg" itemprop="contentUrl" data-size="1024x572">
                            <img src="images/thumb_nav/album/thumbs/9.jpg" itemprop="thumbnail" alt="Image description" />
                        </a>
                        <figcaption itemprop="caption description">Image caption 4</figcaption>
                    </figure>

                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="images/thumb_nav/album/10.jpg" itemprop="contentUrl" data-size="1024x572">
                            <img src="images/thumb_nav/album/thumbs/10.jpg" itemprop="thumbnail" alt="Image description" />
                        </a>
                        <figcaption itemprop="caption description">Image caption 4</figcaption>
                    </figure>

                </div>

                <p></p>
                <h3 class="gallery-h3-name">MAD SKILL SHOW</h3>

                <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">

                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="images/thumb_nav/album/1.jpg" itemprop="contentUrl" data-size="1024x572">
                            <img src="images/thumb_nav/album/thumbs/1.jpg" itemprop="thumbnail" alt="Image description" />
                        </a>
                        <figcaption itemprop="caption description">Image caption  1</figcaption>

                    </figure>

                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="images/thumb_nav/album/2.jpg" itemprop="contentUrl" data-size="1024x572">
                            <img src="images/thumb_nav/album/thumbs/2.jpg" itemprop="thumbnail" alt="Image description" />
                        </a>
                        <figcaption itemprop="caption description">Image caption 2</figcaption>
                    </figure>

                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="images/thumb_nav/album/3.jpg" itemprop="contentUrl" data-size="1024x572">
                            <img src="images/thumb_nav/album/thumbs/3.jpg" itemprop="thumbnail" alt="Image description" />
                        </a>
                        <figcaption itemprop="caption description">Image caption 3</figcaption>
                    </figure>

                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="images/thumb_nav/album/4.jpg" itemprop="contentUrl" data-size="1024x572">
                            <img src="images/thumb_nav/album/thumbs/4.jpg" itemprop="thumbnail" alt="Image description" />
                        </a>
                        <figcaption itemprop="caption description">Image caption 4</figcaption>
                    </figure>

                </div>

                <h3 class="gallery-h3-name" style="visibility: hidden;">Third gallery:</h3>


                <!-- Root element of PhotoSwipe. Must have class pswp. -->
                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                    <!-- Background of PhotoSwipe.
                         It's a separate element, as animating opacity is faster than rgba(). -->
                    <div class="pswp__bg"></div>

                    <!-- Slides wrapper with overflow:hidden. -->
                    <div class="pswp__scroll-wrap">

                        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                        <div class="pswp__container">
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                        </div>

                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                        <div class="pswp__ui pswp__ui--hidden">

                            <div class="pswp__top-bar">

                                <!--  Controls are self-explanatory. Order can be changed. -->

                                <div class="pswp__counter"></div>

                                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                                <button class="pswp__button pswp__button--share" title="Share"></button>

                                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                                <!-- element will get class pswp__preloader--active when preloader is running -->
                                <div class="pswp__preloader">
                                    <div class="pswp__preloader__icn">
                                        <div class="pswp__preloader__cut">
                                            <div class="pswp__preloader__donut"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                <div class="pswp__share-tooltip"></div>
                            </div>

                            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                            </button>

                            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                            </button>

                            <div class="pswp__caption">
                                <div class="pswp__caption__center"></div>
                            </div>

                        </div>

                    </div>

                </div>


            </div><!-- /end home_content-->
        </div><!-- /end content_wrapper_home-->
    </div><!-- /end container-->

    <script type="text/javascript">

    </script>

    <script src="js/custom.js"></script>

</body>
</html>
