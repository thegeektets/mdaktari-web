<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <title>Mdaktari Admin </title>
    <link rel="shortcut icon" href="favicon.ico" />
    <!-- start: META -->
    <meta charset="utf-8" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- end: META -->
    
    <!-- start: MAIN CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('/assets/admin/components/bootstrap/dist/css/bootstrap.min.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('/assets/admin/components/font-awesome/css/font-awesome.min.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('/assets/admin/fonts/clip-font.min.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('/assets/admin/components/iCheck/skins/all.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('/assets/admin/components/perfect-scrollbar/css/perfect-scrollbar.min.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('/assets/admin/components/sweetalert/dist/sweetalert.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('/assets/admin/css/main.min.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('/assets/admin/css/main-responsive.min.css')?>" />
    <link type="text/css" rel="stylesheet" media="print" href="<?php echo base_url('/assets/admin/css/print.min.css')?>" />
    <link type="text/css" rel="stylesheet" id="skin_color" href="<?php echo base_url('assets/admin/css/theme/light.min.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('/assets/admin/css/custom.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('/assets/admin/css/font.css')?>" />

    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link href="<?php echo base_url('/assets/admin/components/fullcalendar/dist/fullcalendar.min.css')?>" rel="stylesheet" />
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
</head>

<body>

    <!-- start: HEADER -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <!-- start: TOP NAVIGATION CONTAINER -->
        <div class="container">
            <div class="navbar-header">
                <!-- start: RESPONSIVE MENU TOGGLER -->
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="clip-list-2"></span>
            </button>
                <!-- end: RESPONSIVE MENU TOGGLER -->
                <!-- start: LOGO -->
                <a class="navbar-brand" href="<?php echo base_url('index.php/admin');?>">
                     <img src="<?php echo base_url('assets/admin/images/mdaktari_logo.png')?>">
                </a>
                <!-- end: LOGO -->
            </div>
            <div class="navbar-tools">
                <!-- start: TOP NAVIGATION MENU -->
                <ul class="nav navbar-right">
                    <!-- start: USER DROPDOWN -->
                    <li class="dropdown current-user">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                            <img src="<?php if (strlen($user_profile['0']['user_avatar']) > 0) {
                                echo $user_profile['0']['user_avatar'];
                              } else { echo base_url('/assets/img/avatar.png'); } ?>" class="user_avatar">
                            <span class="username">
                                <?php if (isset($user_profile)) {
                                  echo $user_profile['0']['fullname'];
                                } ?>
                            </span>
                            <i class="clip-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="pages_user_profile.html">
                                    <i class="clip-user-2"></i> &nbsp;My Profile
                                </a>
                            </li>
                            <li>
                                <a href="pages_calendar.html">
                                    <i class="clip-calendar"></i> &nbsp;My Calendar
                                </a>
                                <li>
                                    <a href="pages_messages.html">
                                        <i class="clip-bubble-4"></i> &nbsp;My Messages (3)
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="utility_lock_screen.html">
                                        <i class="clip-locked"></i> &nbsp;Lock Screen
                                    </a>
                                </li>
                                <li>
                                    <a href="login_example1.html">
                                        <i class="clip-exit"></i> &nbsp;Log Out
                                    </a>
                                </li>
                        </ul>
                        </li>
                        <!-- end: USER DROPDOWN -->
                </ul>
                <!-- end: TOP NAVIGATION MENU -->
            </div>
        </div>
        <!-- end: TOP NAVIGATION CONTAINER -->
    </div>
    <!-- end: HEADER -->