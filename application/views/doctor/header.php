<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mdaktari| Doctor Dashboard </title>
   
    <script src="https://use.fontawesome.com/e4e812a2f7.js"></script>
    <script src="<?php echo base_url('/assets/js/vendor/jquery.js')?>"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')?>"></script>
   
    <!-- Custom Theme files -->
    <link href="<?php echo base_url('/assets/cal/css/style.css')?>" rel='stylesheet' type='text/css' />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="<?php echo base_url('/assets/cal/js/jquery-1.11.1.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/cal/js/jQuery-plugin-progressbar.js')?>"></script>
                 <!--Calender-->
    <link rel="stylesheet" href="<?php echo base_url('/assets/cal/css/clndr.css')?>" type="text/css" />
    <script src="<?php echo base_url('/assets/cal/js/underscore-min.js')?>"></script>
    <script src="<?php echo base_url('/assets/cal/js/moment-2.2.1.js')?>"></script>
    <script src="<?php echo base_url('/assets/cal/js/clndr.js')?>"></script>
    <script src="<?php echo base_url('/assets/cal/js/site.js')?>"></script>

    <link rel="stylesheet" href="<?php echo base_url('/assets/css/foundation.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/app.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/responsive.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/font.css')?>">

  </head>
  <body>

    <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle> </button>
      <div class="title-bar-title">Mdaktari</div>
    </div>

    <div class="top-bar primary_menu" id="main-menu">
      <div class="row">  
        <div class="top-bar-left">
          <div class="logo">
            <img src="<?php echo base_url('/assets/img/mdaktari_logo.png')?>">
          </div>
          

        </div>
          <div class="top-bar-right">
            <div class="user_details">
                <img src="<?php echo base_url('/assets/img/avatar.png')?>" class="user_avatar">
                <div class="user_name"> 
                  <?php if (isset($user_profile)) {
                    echo $user_profile['0']['fullname'];
                  } ?>
                </div>
                <div class="user_points"> <a href="<?php echo base_url('index.php/registration/logout');?>"> Logout </div>
              
            </div>
          </div>
        </div>
      </div>