<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url()?>/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
Tbkk
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url()?>/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url()?>/assets/demo/demo.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>/assets/css/jquery.dataTables.min.css" rel="stylesheet" />

  <link href="<?php echo base_url()?>/assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />



  
  <script src="<?php echo base_url()?>/assets/js/jquery-3.5.1.js"></script>
  <script src="<?php echo base_url()?>/assets/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()?>/assets/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url()?>/assets/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url()?>/assets/js/responsive.bootstrap4.min.js"></script>

  <script src="<?php echo base_url()?>/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>/assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="<?php echo base_url()?>/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url()?>/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url()?>/assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>

</head>
<body class="layout layout-header-fixed">
  <div class="wrapper ">
  <div class="sidebar  " data-color="green"  >
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="" class="simple-text logo-normal">
         TBKK Group
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">



        <?php foreach($menu as $r){ 
                ?>
    
                 <li class="nav-item <?php echo($r->mg == $mg[0]->mg_id)? " active open":"" ?>" >
                  <a class="nav-link" aria-haspopup="true" href="<?php echo base_url()?><?php echo $r->link ?>">
                    <i class="sidenav-icon fa  <?php echo $r->icon_menu ?>"></i>
                    <p><?php echo $r->g_name ?></p>
                  </a>

                
                </li> 
          
                 <?php
                }
                ?> 
  
      <li class="nav-item ">
      <div class="">
            <a class="nav-link   btn-danger text-white" style="box-shadow:0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(76, 175, 80, 0.4)" href="<?php echo base_url()?>Logout/index">
              <i class="fa fa-sign-out text-white"></i>
              <p>Logout</p>
            </a>
          </li>
          

          <li class="nav-item active-pro ">
            <a class="nav-link" href="./upgrade.html">
              <i class="material-icons">unarchive</i>
              <p>Upgrade to PRO</p>
            </a>
          </li>

          

        </ul>
      </div>
    </div>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar navbar-absolute fixed-top bg-white"  style="  position: sticky;" >
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand " href="javascript:;"><?php echo $mg[0]->name ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
         
        </div>
      </nav>
  