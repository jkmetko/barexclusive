
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Scroll Horizontally</title>

    <script type="text/javascript" src="bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>

    <script>

        $(document).ready(function() {

            $('a.panel').click(function () {

                $('a.panel').removeClass('selected');
                $(this).addClass('selected');

                current = $(this);

                $('#wrapper').scrollTo($(this).attr('href'), 800);

                return false;
            });

            $(window).resize(function () {
                resizePanel();
            });

        });

        function resizePanel() {

            width = $(window).width();
            height = $(window).height();

            mask_width = width * $('.item').length;

            $('#debug').html(width  + ' ' + height + ' ' + mask_width);

            $('#wrapper, .item').css({width: width, height: height});
            $('#mask').css({width: mask_width, height: height});
            $('#wrapper').scrollTo($('a.selected').attr('href'), 0);

        }

    </script>

    <style>

        body {
            height:100%;
            width:100%;
            margin:0;padding:0;
            overflow:hidden;
        }

        #wrapper {
            width:100%;
            height:100%;
            position:absolute;
            top:0;left:0;
            background-color:#ccc;
            overflow:hidden;
        }

        #mask {
            width:500%;
            height:100%;
            background-color:#eee;
        }

        .item {
            width:20%;
            height:100%;
            float:left;
            background-color:#ddd;
        }


        .content {
            width:400px;
            height:300px;
            top:20%;
            margin:0 auto;
            background-color:#aaa;
            position:relative;
        }

        .selected {
            background:#fff;
            font-weight:700;
        }

        .clear {
            clear:both;
        }

    </style>
</head>
<body>


<div id="wrapper">
    <div id="mask">

        <div id="item1" class="item">

            <a name="item1"></a>
            <nav class="content">item1
                <a href="#item1" class="panel">1</a> |
                <a href="#item2" class="panel">2</a> |
                <a href="#item3" class="panel">3</a> |
                <a href="#item4" class="panel">4</a> |
                <a href="#item5" class="panel">5</a>
            </nav>



        </div>

        <div id="item2" class="item">
            <a name="item2"></a>
            <div class="content">item2 <a href="#item1" class="panel">back</a></div>
        </div>

        <div id="item3" class="item">
            <a name="item3"></a>
            <div class="content">item3 <a href="#item1" class="panel">back</a></div>
        </div>

        <div id="item4" class="item">
            <a name="item4"></a>
            <div class="content">item4 <a href="#item1" class="panel">back</a></div>
        </div>

        <div id="item5" class="item">
            <a name="item5"></a>
            <div class="content">item5 <a href="#item1" class="panel">back</a></div>
        </div>

    </div>
</div>

</body>
</html>
