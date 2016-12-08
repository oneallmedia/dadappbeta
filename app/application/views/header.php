<?php
$user=$this->session->userdata('user');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdPact</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/skins/_all-skins.min.css">


    <script src="<?php echo base_url();?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <!--<script src="<?php echo base_url();?>plugins/sparkline/jquery.sparkline.min.js"></script>-->
    <!-- jvectormap -->
    <!--<script src="<?php echo base_url();?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>-->
    <!--<script src="<?php echo base_url();?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url();?>plugins/slimScroll/jquery.slimscroll.min.js"></script>

    <script src="<?php echo base_url();?>plugins/select2/select2.full.min.js"></script>

    <script src="<?php echo base_url();?>plugins/datepicker/bootstrap-datepicker.js"></script>
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHiW11DgZd93giYgu46WbUgaz3RS1QnQA" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <!--<script src="<?php echo base_url();?>plugins/chartjs/Chart.min.js"></script>-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="<?php site_url();?>user/dashboard" class="logo">
          <span class="logo-mini"><b>AdPact</b></span>
          <span class="logo-lg"><b>Ad</b>Pact</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if(isset($user['txt_profile_image']) && $user['txt_profile_image']!=''){ ?>
                  <img src="<?php echo base_url()."uploads/".$user['txt_profile_image'];?>" class="user-image" alt="User Image">
                 <?php }else{?>
                  <img src="<?php echo base_url();?>uploads/no-image.png" class="user-image" alt="User Image">
                 <?php } ?> 
                  <span class="hidden-xs"><?php echo $user['txt_name'] ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  <?php if(isset($user['txt_profile_image']) && $user['txt_profile_image']!=''){ ?>
                    <img src="<?php echo base_url()."uploads/".$user['txt_profile_image'];?>" class="img-circle" alt="User Image">
                  <?php }else{?>
                    <img src="<?php echo base_url();?>uploads/no-image.png" class="img-circle" alt="User Image">
                  <?php }?>  
                    <p>
                      <?php echo $user['txt_name'] ?> - <?php echo $user['int_user_type']=='1'?'Admin':'Sub User' ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url();?>/user/profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url();?>/user/signout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      </header>