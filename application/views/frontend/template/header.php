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
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
	<?php if(isset($testimonial_show)): ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/t-slider/css/jquery.bxslider.css" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/t-slider/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/t-slider/js/jquery.bxslider.js"></script>
	<script type="text/javascript">
	var $2222 = jQuery.noConflict();
	$2222(document).ready(function(){
	$2222('#slider2').bxSlider({
		moveSlides: 1,
		auto: true,
		controls: false,
		slideMargin: 10	
	});
	});
	</script>
	<?php endif; ?>
    
<link href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>


<script src="<?php echo base_url(); ?>/assets/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>/assets/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="top-nav">
    <div class="container">
      <div class="row">
        <div class="col-md-8"><a href="#"><i class="fa fa-sticky-note"></i> UAE travel visa requirements</a></div>
        <!--
        <div class="col-md-3"><a href="tel:<?=$phone?>"><i class="fa fa-volume-control-phone"></i> <?=$phone?></a></div>
        <div class="col-md-3"><a href="mailto:<?=$mailid?>"><i class="fa fa-envelope"></i> <?=$mailid?></a></div>
        -->
        
        
        <div class="col-md-4 text-right res-hide">
        <?php if(isset($this->session->usersession)&&($this->session->usersession != '')): ?>
	<a href="<?=$myapplication_url?>"><i class="fa fa-file-text"></i>  View Applications</a> <a href="<?=$myaccount_url?>"><i class="fa fa-user-secret"></i>  Account</a> <a href="<?=$logout_url?>"><i class="fa fa-user-circle-o"></i>  Logout</a> 
	<?php else: ?>
	<a href="<?=$login_url?>"><i class="fa fa-key"></i> Login</a> <a href="<?=$login_url?>"><i class="fa fa-user-plus"></i> Register</a>
	<?php endif; ?>
    
    </div>
      </div>
    </div>
  </div>


<header data-spy="affix" data-offset-top="120">  
  <div class="container">
    <div class="logo"><a href="<?=base_url()?>"><img src="<?=base_url('uploads/admin/').$logo?>" alt="E Visas Online" /></a></div>
    <div class="logo2"><a href="<?=base_url()?>"><img src="<?=base_url('assets/images/')?>logo2.png" alt="E Visas Online" /></a></div>
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
                <li><a href="<?=base_url('frontend/pages/visa_processing_steps')?>">Visa Processing Steps</a>
                <li><a href="<?=base_url('frontend/pages/track_status')?>">Application Tracking</a></li>
                
                <?php if(isset($this->session->usersession)&&($this->session->usersession != '')): ?>
				<li class="res-show"><a href="<?=$myaccount_url?>">Account</a></li>
				<li class="res-show"><a href="<?=$logout_url?>">Logout</a></li>
				<?php else: ?>
				<li class="res-show"><a href="<?=$login_url?>">Login</a></li>
                <li class="res-show"><a href="<?=$login_url?>">Register</a></li>
				<?php endif; ?>
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