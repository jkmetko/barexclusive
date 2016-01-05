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
                else{
                    window.location.replace('gallery_thumb_mobile.php');
                }
            }
            LoadPage();
            // bind resize event
            $(window).resize(LoadPage);

        });

    </script>

    <link rel="SHORTCUT ICON" href="img/ico.jpg">
</head>
