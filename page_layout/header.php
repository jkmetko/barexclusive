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

    <!-- jQuery -->
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/jsBackgroundSlideshow/jquery.sublimeSlideshow.js"></script>
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
                }
            }

            TestMethod();
            // bind resize event
            $(window).resize(TestMethod);

        });
    </script>




</head>

<body>