<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=$title?></title>
	<meta name="description" content="<?=$description?>" />
	<meta name="keywords" content="<?=$keywords?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>/assets/images/favicon.png" />
	<link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/menu/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/assets/menu/css/webslidemenu.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/menu/js/webslidemenu.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/menu/font-awesome/css/font-awesome.min.css" />
	<?php if(isset($testimonial_show)): ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/t-slider/css/jquery.bxslider.css" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/t-slider/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/t-slider/js/jquery.bxslider.js"></script>
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
	<?php endif; ?>
</head>
<body>
<link href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<header data-spy="affix" data-offset-top="250">
  <div class="top-nav">
    <div class="container">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
          <div class="tnr"> <span class="tl-curve"></span> <span class="tr-curve"></span>
            <div class="row">
              <div class="col-md-4 col-xs-5"><a href="tel:<?=$phone?>"><i class="fa fa-volume-control-phone"></i> <?=$phone?></a></div>
              <div class="col-md-4 res-hide"><a href="mailto:<?=$mailid?>"><i class="fa fa-envelope"></i> <?=$mailid?></a></div>
              <div class="col-md-4 col-xs-7"><a href="<?=$login_url?>"><i class="fa fa-user"></i> Login | Register</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="logo"><a href="<?=base_url()?>"><img src="<?=base_url('uploads/admin/').$logo?>" alt="E Visas Online" /></a></div>
    <div class="header-right">
      <div class="t-menu">
        <div class="wsmenucontainer">
          <div class="wsmenuexpandermain slideRight"><a id="navToggle" class="animated-arrow slideLeft" href="#"><span></span></a></div>
          <div class="wsmenucontent overlapblackbg"></div>
          <div>
            <!--Menu HTML Code-->
            <nav class="wsmenu slideLeft clearfix">
              <ul class="mobile-sub wsmenu-list">
                <li><a href="<?=base_url()?>">Home</a></li>
                <?=$site_menu?>
                <li><a href="<?=base_url()?>">Visa Processing Steps</a>
                <li><a href="<?=base_url()?>">Track Your Status</a></li>
                <li><a href="<?=base_url('contact-us')?>">Contact us</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</header>