<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mdaktari| Patient Dashboard </title>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/foundation.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/app.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/ssets/css/responsive.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/font.css')?>">
    <script src="https://use.fontawesome.com/e4e812a2f7.js"></script>

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
          <a href="<?php echo base_url();?>">
              <img src="<?php echo base_url('/assets/img/mdaktari_logo.png')?>">
          </div>
          

        </div>
          <div class="top-bar-right">
            <div class="user_details">
                <img src="<?php echo base_url('/assets/img/avatar.png')?>" class="user_avatar">
                <div class="user_name"> Griffin Muteti </div>
                <div class="user_points"> <a href="<?php echo base_url('index.php/registration/logout');?>"> Logout </div>
              
            </div>
          </div>
        </div>
      </div>