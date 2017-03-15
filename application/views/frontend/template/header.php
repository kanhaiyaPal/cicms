<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=$title?></title>
	<meta name="description" content="<?=$description?>" />
	<meta name="keywords" content="<?=$keywords?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="menu/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="menu/css/webslidemenu.css" />
	<script type="text/javascript" src="menu/js/webslidemenu.js"></script>
	<link rel="stylesheet" type="text/css" href="menu/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="t-slider/css/jquery.bxslider.css" type="text/css" />
	<script type="text/javascript" src="t-slider/js/jquery.min.js"></script>
	<script type="text/javascript" src="t-slider/js/jquery.bxslider.js"></script>
	<script type="text/javascript">
	var $2222 = jQuery.noConflict();
	$2222(document).ready(function(){
	$2222('#slider2').bxSlider({
	  slideWidth: 550,
		moveSlides: 1,
		auto: true,
		controls: false,
		slideMargin: 10	
	});
	});
	</script>
</head>
<body>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<header data-spy="affix" data-offset-top="250">
  <div class="top-nav">
    <div class="container">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
          <div class="tnr"> <span class="tl-curve"></span> <span class="tr-curve"></span>
            <div class="row">
              <div class="col-md-4 col-xs-5"><a href="#"><i class="fa fa-volume-control-phone"></i> 987 654-3210</a></div>
              <div class="col-md-4 res-hide"><a href="mailto:info@visaforuae.com"><i class="fa fa-envelope"></i> info@evisasonline.com</a></div>
              <div class="col-md-4 col-xs-7"><a href="login.php"><i class="fa fa-user"></i> Login | Register</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="logo"><a href="index.php"><img src="images/logo.png" alt="E Visas Online" /></a></div>
    <div class="header-right">
      <div class="t-menu">
        <div class="wsmenucontainer">
          <div class="wsmenuexpandermain slideRight"><a id="navToggle" class="animated-arrow slideLeft" href="#"><span></span></a></div>
          <div class="wsmenucontent overlapblackbg"></div>
          <div>
            <!--Menu HTML Code-->
            <nav class="wsmenu slideLeft clearfix">
              <ul class="mobile-sub wsmenu-list">
                <li><a href="index.php">Home</a></li>
                <li><a href="about-us.php">About us</a></li>
                <li><a href="about-us.php">Visa Processing Steps</a>
                <li><a href="about-us.php">Track Your Status</a></li>
                <li><a href="contact.php">Contact us</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</header>
