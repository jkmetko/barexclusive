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

    <!-- Vegas -->
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="js/vegas/vegas.min.css">


    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/master-nav.css">
    <link rel="stylesheet" type="text/css" href="css/content-wraper.css">
    <link rel="stylesheet" type="text/css" href="css/style_horizontal.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reset.css">

    <!-- jQuery -->
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <link rel="SHORTCUT ICON" href="img/ico.jpg">

    <script type="text/javascript">
        $(document).ready(function() {
            function LoadPage() {

                if ($(window).width() <= 767) {
                    window.location.replace('gallery_thumb_mobile.php');
                }
            }
            LoadPage();
            // bind resize event
            $(window).resize(LoadPage);

        });

    </script>

</head>

<body>

<?php include('page_layout/nav_menu.php'); ?>

<div class="container body_content">
</div>

<div class="container-fluid">
    <div class="characters ">
        <div class="characters-poster"></div>
        <div class="characters-label"></div>
        <ul class="characters-list">
            <li><a class="a_custom" href="#" data-character="">Jessica Alba</a></li>
            <li><a class="a_custom" href="#" data-character="">Mickey Roorke</a></li>
            <li><a class="a_custom" href="#" data-character="">Josh Brolin</a></li>
            <li><a class="a_custom" href="#" data-character="">Joseph Gordon-Lewitt</a></li>
            <li><a class="a_custom" href="#" data-character="">Eva Green</a></li>
            <li><a class="a_custom" href="#" data-character="">Bruce Willis</a></li>
            <li><a class="a_custom" href="#" data-character="">Rosarion Dawson</a></li>
            <li><a class="a_custom" href="#" data-character="">Powers Boothe</a></li>
            <li><a class="a_custom" href="#" data-character="">Jessica Alba</a></li>
            <li><a class="a_custom" href="#" data-character="">Mickey Roorke</a></li>
            <li><a class="a_custom" href="#" data-character="">Josh Brolin</a></li>
            <li><a class="a_custom" href="#" data-character="">Joseph Gordon-Lewitt</a></li>
            <li><a class="a_custom" href="#" data-character="">Eva Green</a></li>
            <li><a class="a_custom" href="#" data-character="">Bruce Willis</a></li>
            <li><a class="a_custom" href="#" data-character="">Rosarion Dawson</a></li>
            <li><a class="a_custom" href="#" data-character="">Powers Boothe</a></li>

        </ul>

    </div>
    <img class="logo" src="img/logo2.png"/>
</div>


<script src="js/vegas/vegas.min.js"></script>
<script src="js/vegas/demo.js"></script>

<script src="js/custom.js"></script>

<script type="text/javascript">

</script>

</body>
</html>
