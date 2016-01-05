<?php include('page_layout/header.php'); ?>
<?php include('page_layout/nav_menu.php'); ?>

<div class="container-fluid body_content section-transition-wrapper">
    <div id="section1" class="section-transition container ">

        <div class="content_wrapper_home">
            <div class="about_content">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h1 class="top">Kontaktujte nas</h1>
                        <span class="horizontal-line"></span>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-custom-text">

                        <div class="row">

                            <?php
                            if (!count($_POST)) {
                                ?>
                                <form method="post" id="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <br/>
                                    <fieldset class="col_f_1 col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <label style="margin-top:0">Meno</label><input name="Name" type="text"
                                                                                       class="required"/>
                                    </fieldset>
                                    <fieldset class="col_f_1 col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <label style="margin-top:0">Email</label><input name="Email" type="text"
                                                                                        class="required email"/>
                                    </fieldset>

                                    <fieldset class="col_f_1 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <label>Sprava</label><textarea name="Message" class="required" cols=""
                                                                       rows=""></textarea>
                                    </fieldset>
                                    <button type="submit" class="send_bt">Send Message</button>
                                </form>
                                <?php
                            } else {
                                ?>
                                <!-- START SEND MAIL SCRIPT -->
                                <div align="center">
                                    <p><strong>Email bol �spe�ne odposlan�.</strong><br/>Na Va�u spr�vu budeme re�gova�
                                        do nieko�k�ch hod�n.</p>
                                </div>

                                <?php
                                $mail = $_POST['email'];

                                /*$subject = "".$_POST['subject'];*/
                                $to = "info@barexclusive.sk";
                                $subject = "BarExclusive";
                                $headers = "From: BarExclusive.sk <" . $_POST['Email'] . ">";
                                $message = "Spr�va z webovej st�nky\n";
                                $message .= "\nOd: " . $_POST['Name'];
                                $message .= "\nEmail: " . $_POST['Email'] . "\n";
                                $message .= "\nSpr�va: " . $_POST['Message'];


                                //Receive Variable
                                $sentOk = mail($to, $subject, $message, $headers);
                            }
                            ?>

                            <!-- END SEND MAIL SCRIPT -->
                            <!--end form -->

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="row vertical-line-p col-xs-12 col-sm-12 col-md-12 col-lg-12 contacts">

                            <div class="contacts-info">
                                <p id="address" class="navigation_contacts"><strong>Cesta na Kamzík 37/B, 83101</strong> <br/>
                                    Bratislava, Koliba <br/>Slovakia<br/>
                                    <a href="#" class="section-transition-left">Pozrite na mape <span class="glyphicon glyphicon-arrow-right"
                                                                      aria-hidden="true"></span></a>
                                    <span class="horizontal-line"></span>
                                </p>

                                <p id="phone"><strong>managment:</strong> <br/>
                                    00421 902 285842<br/>
                                    <span class="horizontal-line"></span>
                                </p>

                                <p id="phone"><strong>bar:</strong> <br/>
                                    00421 917 676000<br/>
                                    <span class="horizontal-line"></span>
                                </p>

                                <p id="email">
                                    <a href="mailto: info@barexclusive.sk">info@barexclusive.sk</a>
                                    <span class="horizontal-line"></span>
                                </p>

                                <p id="web">
                                    <a href="http://www.barexclusive.sk">www.barexclusive.sk</a>
                                    <span class="horizontal-line"></span>
                                </p>
                            </div>
                        </div>
                    </div>


                </div><!-- /end home_content-->
            </div><!-- /end content_wrapper_home-->
        </div>
    </div>
    <div id="section2" class="section-transition container">
        <div class="content_wrapper_home">

            <div class="about_content">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h1 class="top">Where we are</h1>
                        <span class="horizontal-line"></span>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 navigation_contacts">
                        <p></p>
                        <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                src="http://maps.google.com/maps/ms?msa=0&amp;msid=201329224454885838200.0004a6db0cd2337d826ba&amp;ie=UTF8&amp;ll=48.169449,17.103417&amp;spn=0,0&amp;t=h&amp;output=embed"
                                style="margin-bottom:5px;">
                        </iframe>
                        <br/>
                        <small style="float:right"><a
                                href="http://maps.google.com/maps/ms?msa=0&amp;msid=201329224454885838200.0004a6db0cd2337d826ba&amp;ie=UTF8&amp;ll=48.169449,17.103417&amp;spn=0,0&amp;iwloc=0004a6db1466d82e8f8d9&amp;source=embed"
                                style="text-align:right">Zobraziť celú mapu</a></small>
                        <p style="color:#999">
                            Cesta na Kamzík 37/B, 831 01, Bratislava
                        </p>
                        <a href="#" class="section-transition-right">Kontaktujte nás <span class="glyphicon glyphicon-arrow-right"
                                                          aria-hidden="true"></span></a>

                    </div>

                </div>


            </div><!-- /end home_content-->
        </div><!-- /end ontent_wrapper_home-->
    </div>
</div><!-- /end container-->

<script src="js/custom.js"></script>
<script src="js/section-transition.js"></script>


</body>
</html>