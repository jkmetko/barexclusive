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
                                    <button type="submit" class="send_bt">Odoslať Správu</button>
                                </form>
                                <?php
                            } else {
                                ?>
                                <!-- START SEND MAIL SCRIPT -->
                                <div align="center">
                                    <p><strong>Email bol úspešne odoslaný.</strong><br/>Na Vašu správu budeme reágovať
                                        do niekoľkých hodín.</p>
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
                                <p id="address" class="navigation_contacts"><strong>Hudecová 2723, 841 04</strong> <br/>
                                    Bratislava <br/>Slovakia<br/>
                                    <a href="#" class="section-transition-left">Pozrite na mape <span class="glyphicon glyphicon-arrow-right"
                                                                      aria-hidden="true"></span></a>
                                    <span class="horizontal-line"></span>
                                </p>

                                <p id="phone"><strong>Branislav Lehotský:</strong> <br/>
                                    +421 911 584 878<br/>
                                    <span class="horizontal-line"></span>
                                </p>

                                <p id="phone"><strong>Lukáš Gerhát:</strong> <br/>
                                    +421 905 353 268<br/>
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
                        <h1 class="top">Kde sa nachádzame</h1>
                        <span class="horizontal-line"></span>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 navigation_contacts">
                        <p></p>
                        <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2661.8896273558767!2d17.054969015180774!3d48.15093305821039!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c8b97ad0d0657%3A0x2d481f0d02674929!2sHudecova+2723%2C+841+04+Karlova+Ves!5e0!3m2!1ssk!2ssk!4v1458841724716" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <br/>
                        <p style="color:#999">
                            Hudecová 2723, 841 04, Bratislava
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