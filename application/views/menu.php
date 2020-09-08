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
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  TBKK
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->  
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url()?>assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url()?>assets/demo/demo.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>
  <link href='<?= base_url() ?>assets/resources/dropzone.css' type='text/css' rel='stylesheet'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css' type='text/css' rel='stylesheet'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css' type='text/css' rel='stylesheet'>



  <script src='<?= base_url() ?>assets/resources/dropzone.js' type='text/javascript'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>
  <script src="<?php echo base_url()?>/assets/js/jquery-3.5.1.js"></script>
  <!-- <script src="<?php echo base_url()?>assets/js/responsive.bootstrap4.min.js"></script> -->
  <script src="<?php echo base_url()?>assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url()?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url()?>assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
</head>

<style>
  .bmd-label-floating {
    color:#495057;
    font-size:16px;
  }
  i{
    cursor: pointer;
  }
  .table tr:hover {
    background-color: #efefef;
  }
  .select-info{
    padding-left:20px;
  }
  .logo {
  text-shadow: 2px 2px #c7bdbd;
}
</style>

<script>
        $(document).ready(function() {
          $(".hide-it").fadeOut(5000);
});
   
    </script>
 
<body class="layout layout-header-fixed">
  <div class="wrapper ">
  <div class="sidebar  " data-color="azure"  >
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a class="simple-text logo-normal" style=" font-weight: 900;" href="<?php echo base_url().$this->uri->segment('1')?>/manage">TBKK Group
      </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">


        <?php 
        $b = $this->router->fetch_method();
        if($b == 'add' || $b == 'edit' || $b =='rule'){
          $b = 'manage';
        }
          $url = trim($this->router->fetch_class().'/'.$b); 
        foreach($menu as $r){
                ?>
                 <li class="nav-item <?php echo($r->controller == $url)? " active open":"" ?>" >
                  <a class="nav-link" aria-haspopup="true" href="<?php echo base_url()?><?php echo $r->controller ?>">
                    <i class="sidenav-icon fa  <?php echo $r->icon_menu ?>"></i>
                    <p class="lol" style=" font-weight: 500;"><?php echo $r->g_name ?></p>
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
              <p></p>
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
            <?php $now =  $this->router->fetch_method() ?>
            <a class="navbar-brand" href="<?php echo base_url().$this->uri->segment('1')?>/manage"><b><?php echo ucfirst(trim($this->router->fetch_class())) ?><?php if($now != "manage" &&  $now != "list" &&  $now != "show"){?> : <?php echo ucfirst($now) ?><?php }?></a></b>
          </div>
          <button class="navbar-toggler " type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
         
        </div>
      </nav>
  