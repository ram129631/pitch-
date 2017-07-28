<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title><?=$Title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="<?php echo site_url('pages/ico/60.png'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo site_url('pages/ico/76.png'); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo site_url('pages/ico/120.png'); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo site_url('pages/ico/152.png'); ?>">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo site_url('assets/plugins/pace/pace-theme-flash.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url('assets/plugins/boostrapv3/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url('assets/plugins/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url('assets/plugins/jquery-scrollbar/jquery.scrollbar.css'); ?>" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo site_url('assets/plugins/bootstrap-select2/select2.css'); ?>" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo site_url('assets/plugins/switchery/css/switchery.min.css'); ?>" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo site_url('pages/css/pages-icons.css'); ?>" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?php echo site_url('pages/css/pages.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo site_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css">
        <link class="main-stylesheet" href="<?php echo site_url('pages/css/themes/simple.css'); ?>" rel="stylesheet" type="text/css" />
    <!--[if lte IE 9]>
	<link href="<?php echo site_url('assets/plugins/codrops-dialogFx/dialog.ie.css'); ?>" rel="stylesheet" type="text/css" media="screen" />
	<![endif]-->
    <script type="text/javascript">
    	var strBaseURL = "<?=base_url();?>";
        var arrAvailableLevels = <?=json_encode($this->config->item('AvailableLevels'));?>
    </script>
  </head>
  <body class="fixed-header " ng-app="myApp" ng-controller="myCtrl">
    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header"> 
        <img src="http://pixelw3.com/wp-content/themes/webhost/images/site-logo.png" alt="logo" class="brand" data-src="http://pixelw3.com/wp-content/themes/webhost/images/site-logo.png" data-src-retina="http://pixelw3.com/wp-content/themes/webhost/images/site-logo.png" width="140" height="50">
        <div class="sidebar-header-controls">
          
            <button type="button" style="left: 0;top: 9px;" class="btn btn-link visible-lg-inline pull-right" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
          </button> 
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <?php $this->load->view('common/navigation'); ?>
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
      <!-- START HEADER -->
      <div class="header ">
        <!-- START MOBILE CONTROLS -->
        <div class="container-fluid relative">
          <!-- LEFT SIDE -->
          <div class="pull-left full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5" data-toggle="sidebar">
                <span class="icon-set menu-hambuger"></span>
              </a>
            </div>
            <!-- END ACTION BAR -->
          </div>
          <div class="pull-center hidden-md hidden-lg">
            <div class="header-inner">
              <div class="brand inline">
              <img src="http://pixelw3.com/wp-content/themes/webhost/images/site-logo.png" alt="logo" data-src="http://pixelw3.com/wp-content/themes/webhost/images/site-logo.png" data-src-retina="http://pixelw3.com/wp-content/themes/webhost/images/site-logo.png" width="150" height="60">
              </div>
            </div>
          </div>
          <!-- RIGHT SIDE -->
          <div class="pull-right full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <div class="notification-list no-margin visible-sm visible-xs b-grey no-style p-l-30 p-r-20">
                  
            </div>            </div>
            <!-- END ACTION BAR -->
          </div>
        </div>
        <!-- END MOBILE CONTROLS -->
        <div class=" pull-left sm-table hidden-xs hidden-sm">
          <div class="header-inner">
            <div class="brand inline">
                <a href="<?php echo site_url(); ?>"><img src="http://pixelw3.com/wp-content/themes/webhost/images/site-logo.png" alt="logo" data-src="http://pixelw3.com/wp-content/themes/webhost/images/site-logo.png" data-src-retina="http://pixelw3.com/wp-content/themes/webhost/images/site-logo.png" width="140" height="50"></a>    
            </div>
            <!-- START NOTIFICATION LIST -->
            
            <div class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
                
            </div>
           
            <!-- END NOTIFICATIONS LIST -->
           </div>
        </div>
        
        <div class=" pull-right">
          <!-- START User Info-->
          <div class="visible-lg visible-md visible-xs m-t-10">
            <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
              <span class="semi-bold">User name</span>
            </div>
            <div class="dropdown pull-right">
              <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                <img src="<?php echo site_url('assets/img/profiles/avatar.jpg'); ?>" alt="" data-src="<?php echo site_url('assets/img/profiles/avatar.jpg'); ?>" data-src-retina="<?php echo site_url('assets/img/profiles/avatar.jpg'); ?>" width="32" height="32">
            </span>
              </button>
              <ul class="dropdown-menu profile-dropdown" role="menu"> 
                <li class="bg-master-lighter">
                  <a href="<?php echo site_url('logout'); ?>" class="clearfix">
                    <span class="pull-left">Logout</span>
                    <span class="pull-right"><i class="pg-power"></i></span>
                  </a>
                </li>
                <li></li>
              </ul>
            </div>
          </div>
          <!-- END User Info-->
        </div>
      </div>
      


      <!-- END HEADER -->
      <!-- START PAGE CONTENT WRAPPER -->
      
    
    
    