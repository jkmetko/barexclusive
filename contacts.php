<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250"/>
<title>BarExclusive - mobilný bar</title>
<meta name="description" content="BarExclusive - webová prezentácia"/>
<meta name="keywords" content=""/>
<link href="css/master.css" rel="stylesheet" type="text/css"/>
<!-- Style vertical  scroll -->
<link rel="stylesheet" href="css/style_vertical.css" type="text/css" media="screen"/>
<!-- JQUERY -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<!-- start cufon -->
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/NeoSans.font.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<!-- Supersize image background -->
<script type="text/javascript" src="js/supersized.3.1.3.js"></script>
<link rel="stylesheet" href="css/supersized.css" type="text/css" media="screen"/>
<!-- Jquery Validate-->
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#myform").validate();
  });
  </script>
<!--[if IE 7]>
 <link href="css/ie7.css" rel="stylesheet" type="text/css"  />
<![endif]-->
</head>
<body>

<!-- start header -->
<div id="header_line"></div>
<div id="logo"><a href="index.html"><img src="img/logo.png" width="188" height="89" alt="Logo"/></a></div><!-- your logo -->

<!-- start menu -->
<ul id="my_menu" class="my_menu">
	<li><a href="index.html">Home</a>
		<div class="submenu_empty"></div>
	</li>
	<li><a href="">Portfolio</a>
	<div id="portfolio">
		<ul>
			<li class="menu_heading">Photo galeria</li>
			<li><a href="gallery_thumb_nav.html">Akcie</a></li>
			<li><a href="flip_gallery.html">Drinky</a></li>
			<li><a href="gallery_supersize.html">Inšpirácia</a></li>
		</ul>
		<ul>
			<li class="menu_heading">Projekty</li>
			<li><a href="project1.html">Aktuálne</a></li>
			<li><a href="#">Predchádzajúce</a></li>
		</ul>
		<ul class="last">
			<li class="menu_heading">Video galleria</li>
			<li><a href="#">Flair show</a></li>
			<li><a href="#">Fire show</a></li>
            <li><a href="#">Akcie</a></li>
		</ul>
	</div>
	</li>
	<li><a href="">About</a>
	<div id="about">
		<ul>
			<li class="menu_heading">About us</li>
			<li><a href="about_barex.html">BarExclusive</a></li>
			<li><a href="about_flairshow.html">Flair show</a></li>
			<li><a href="about_prenosnybar.html">Prenosný bar</a></li>
			<li><a href="about_mixology.html">Mixológia</a></li>
		</ul>
	</div>
	</li>
	<li><a href="">Contacts</a>
	<div id="contacts">
		<ul class="info">
			<li class="menu_heading">Adresa</li>
			<li>Cesta na Kamzík 37/B - Bratislava, Koliba</li>
			<li>Phone +421 902 285842 / Email info@barexclusive.sk</li>
		</ul>
		<ul class="last">
			<li class="menu_heading">Contact</li>
			<li><a href="contacts.php">Napíšte správu</a></li>
			<li><a href="contacts.php#map">Pozrite si na mape</a></li>
		</ul>
	</div>
	</li>
	<li><a href="">Partners</a>
	<div id="partnery">
		<ul class="info">
			<li class="menu_heading">Finlandia</li>
			<li><img src="img/finlandia.jpg" alt=""/></li>
		</ul>
		<ul class="info">
			<li class="menu_heading">Bacardi</li>
			<li><img src="img/bacardi.jpg" alt=""/></li>
		</ul>
		<ul class="info">
			<li class="menu_heading">RedBull</li>
			<li><img src="img/redbull.jpg" alt=""/></li>
		</ul>
		<ul class="info">
			<li class="menu_heading">City-Party</li>
			<li><img src="img/cityparty.jpg" alt=""/></li>
		</ul>
		<ul class="last">
			<li class="menu_heading" style="width: 255px">PRO-MEDIA, s.r.o.</li>
			<li><img src="img/promedia.jpg" alt=""/></li>
		</ul>
	</div>
	</li>
</ul>
<!-- end menu -->
<!-- /end header -->

<div class="section" id="contact">
	<div class="content_wrapper_pt">
		<h2>Kontaktujte nas</h2>
		<div class="content_b">
			<div class="two_third_col_pt">
            <!-- start form -->
	<?php
		if (!count($_POST)){
		?>
				<form method="post" id="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<br />
          <fieldset class="col_f_1"> 						
            <label style="margin-top:0">Meno</label><input name="Name" type="text" class="required" />
					</fieldset>
					<fieldset class="col_f_2">
						<label style="margin-top:0">Email</label><input name="Email" type="text" class="required email" />
					</fieldset>
					<div class="clr">
					</div>
					<fieldset>
						<label>Sprava</label><textarea name="Message" class="required" cols="" rows="" ></textarea>
					</fieldset>
					<button type="submit" class="send_bt">Send Message</button>
				</form>
                <?php
		}else{
	    ?>
                   <!-- START SEND MAIL SCRIPT -->
        <div align="center">
                    <p><strong>Email bol úspešne odposlaný.</strong><br />Na Vašu správu budeme reágovať do niekoľkých hodín.</p>
        </div>
						
						<?php
						$mail = $_POST['email'];

						/*$subject = "".$_POST['subject'];*/
						$to = "info@barexclusive.sk";
						$subject = "BarExclusive";
						$headers = "From: BarExclusive.sk <".$_POST['Email'].">";
						$message = "Správa z webovej stánky\n";
						$message .= "\nOd: " . $_POST['Name'];
						$message .= "\nEmail: " . $_POST['Email']."\n";
						$message .= "\nSpráva: " . $_POST['Message'];
	
						
						//Receive Variable
						$sentOk = mail($to,$subject,$message,$headers);
						}
						?>
						
		<!-- END SEND MAIL SCRIPT -->   
        <!--end form -->   
			</div>
			<div class="one_third_col_pt">
				<ul id="contact_info">
					<br />
          <li id="address">Cesta na Kamzík 37/B, 83101 <br /> Bratislava, Koliba <br />Slovakia<br /><span class="nav_contacts"><a href="#map" class="details">Pozrite na mape </a></span></li>
					<li id="phone">managment:<br />00421 902 285842</li>
					<li id="phone">bar:<br />00421 917 676000</li>
					<li id="email"><a href="mailto: info@barexclusive.sk">info@barexclusive.sk</a></li>
					<li id="web"><a href="http://www.barexclusive.sk">www.barexclusive.sk</a></li>
				</ul>
      </div>
			<div class="clr">
			</div>
		</div>
	</div>
</div>
<div class="section white" id="map">
	<div class="content_wrapper_pt">
		<h2>Where we are</h2>
		<div class="content_b">
			<iframe width="800" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?msa=0&amp;msid=201329224454885838200.0004a6db0cd2337d826ba&amp;ie=UTF8&amp;ll=48.169449,17.103417&amp;spn=0,0&amp;t=h&amp;output=embed" style="margin-bottom:5px;">
			</iframe>
			<br/>
			<small style="float:right"><a href="http://maps.google.com/maps/ms?msa=0&amp;msid=201329224454885838200.0004a6db0cd2337d826ba&amp;ie=UTF8&amp;ll=48.169449,17.103417&amp;spn=0,0&amp;iwloc=0004a6db1466d82e8f8d9&amp;source=embed" style="text-align:right">Zobraziť celú mapu</a></small>
			<p style="color:#999">
				Cesta na Kamzík 37/B, 831 01, Bratislava
			</p>
			<span class="nav_contacts"><a href="#contact" class="details">Kontaktujte nás </a></span>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/bg_images_2.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript"> Cufon.now(); </script>
<script type="text/javascript">
            $(function() {
                $('.nav_contacts a').bind('click',function(event){
                    var $anchor = $(this);
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1500,'easeInOutExpo');
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1000);
                    event.preventDefault();
                });
            });
        </script>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>