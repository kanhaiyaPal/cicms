<!DOCTYPE html>
<html>
  <head>
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url(); ?>/assets/css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body <?php if(isset($body_class)){ echo "class='$body_class'"; }?>>