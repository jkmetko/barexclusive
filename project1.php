<?php include('page_layout/header.php'); ?>
<?php include('page_layout/nav_menu.php'); ?>

<div class="container body_content custom-content-body" xmlns="http://www.w3.org/1999/html">
    <div id="section1" class="section">
    <div class="content_wrapper_home">

        <div class="about_content">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1 class="top">Doba barova</h1>
                    <span class="horizontal-line"></span>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="project_img">
                        <a><span class="zoom_portfolio" ><img src="img/zoom.png" alt="" /></span><img src="img/project_1.jpg" width="100%" height="100%" alt="Picture"
                             class="img-responsive project_img_hover"/></a>

                        <div class="ribbon img-responsive"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                    <div class="row vertical-line-p-project">
                        <p class="project_paragraph"><strong>Viete už čo Vám v podniku chýba?</strong> Ak Vaša prevádzka
                            nenapĺňa očakávané zisky
                            a zákazníci sa nehrnú, niekde je chyba. Projektový tým <strong>Doba Barová</strong> ponúka
                            profesionálnu konzultáciu. Zameriavame sa na komplexnú problematiku z dlhodobej praxe, ktorú
                            si nemusí všimnúť ani pomerne skúsene oko.<br/><br/>Poskytujeme riešenia z oblasti
                            personálu, prieskum trhu a verejnej mienky, marketing & PR, reklamé prezentácie, nápojové
                            lístky, barové vybavenie, interiérový design.
                            <br/><br/>

                            <a href="#">Viac informácii čoskoro <span class="glyphicon glyphicon-arrow-right"
                                                                      aria-hidden="true"></span></a>

                        </p>

                    </div>
                </div>
            </div>


        </div><!-- /end home_content-->
    </div><!-- /end ontent_wrapper_home-->
    <ul class="navigation_project">
        <li style="color: #fff;">1</li>
        <li><a href="#section2">2</a></li>
    </ul>
    </div>

    <div id="section2" class="section" style="display: none;">
        <div class="content_wrapper_home">

            <div class="about_content">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h1 class="top">Summer Beach Bar - SENEC</h1>
                        <span class="horizontal-line"></span>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="project_img">
                            <a><span class="zoom_portfolio" ><img src="img/zoom.png" alt="" /></span><img src="img/senec.jpg" width="100%" height="100%" alt="Picture"
                                 class="img-responsive project_img_hover"/></a>

                            <div class="ribbon img-responsive"></div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                        <div class="row vertical-line-p-project">
                            <p class="project_paragraph"><strong>Plážový bar v senci.</strong> Privítame Vás počas
                                celého
                                júla/agusta na seneckých jazerách s exkluzívnym zážitkom z prípravy miešaných nápojov.
                                Nielen že si budete môcť vybrať nápoj zo sortimentu štandartných a exkluzívnych nápojov,
                                my
                                Vám na požiadanie vytvoríme Váš vlastný drink. Vyskúšajte čaro čerstvého exotického
                                ovocia s
                                alko/nealkom na vlastnej chuti.
                                <br/><br/>

                                <a href="#">Viac informácii čoskoro <span class="glyphicon glyphicon-arrow-right"
                                                                          aria-hidden="true"></span></a>

                            </p>

                        </div>
                    </div>
                </div>


            </div><!-- /end home_content-->
        </div><!-- /end ontent_wrapper_home-->
        <ul class="navigation_project">
            <li><a href="#section1">1</a></li>
            <li style="color: #fff;">2</li>
        </ul>
    </div>

</div><!-- /end container-->


<script src="bootstrap/jquery.min.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>

<script src="js/custom.js"></script>
<script type="text/javascript">
    $(function () {
        $('ul.navigation_project a').bind('click', function (event) {
            var $anchor = $(this);
            $('div.container #section2').animate({
                    height: 'toggle'
                }, 1800
            );
            $('div.container #section1').animate({
                    height: 'toggle'
                }, 1800
            );
        });
    });
</script>

</body>
</html>