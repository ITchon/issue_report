<!--
=========================================================
Material Kit - v2.0.7
=========================================================

Product Page: https://www.creative-tim.com/product/material-kit
Copyright 2020 Creative Tim (https://www.creative-tim.com/)

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
    Material Kit by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url().'assets/css/material-kit.css?v=2.0.7'?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url().'assets/demo/demo.css'?>" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">

  <div class="page-header header-filter" style="background-image: url('<?php echo base_url()?>/assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" action="<?php echo base_url()?>Login/chklogin" method="post" data-toggle="validator">
              <div class="card-header card-header-success text-center">
                <h4 class="card-title">Login</h4>
                <div class="social-line">
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                   <h4>ISSUE REPORT</h4>
                  </a>
                </div>
              </div>
              <p class="description text-center" style="padding-top:10px"></p>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" name="username" class="form-control" placeholder="Username...">
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Password...">
                </div>
              </div>
              <div class="footer text-center" style="padding-bottom:20px">
                <button class="btn btn-rose " type="submit"><a href="#pablo" class="text-white">Get Started</a></button>
              </div>
            </form>
          </div>
        </div>
        
      </div>
      
    </div>
    
    <footer class="footer">
      <div class="container">
        <nav class="float-left">
          <ul>
            <li>
              <a href="https://www.creative-tim.com/">
                Creative Tim
              </a>
            </li>
            <li>
              <a href="https://www.creative-tim.com/presentation">
                About Us
              </a>
            </li>
            <li>
              <a href="https://www.creative-tim.com/blog">
                Blog
              </a>
            </li>
            <li>
              <a href="https://www.creative-tim.com/license">
                Licenses
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, made with <i class="material-icons">favorite</i> by
          <a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a> for a better web.
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url().'assets/js/core/jquery.min.js'?>"></script>

  <script src="<?php echo base_url().'assets/js/core/popper.min.js'?>"></script>

  <script src="<?php echo base_url().'assets/js/core/bootstrap-material-design.min.js'?>"></script>

  <script src="<?php echo base_url().'assets/js/plugins/moment.min.js'?>"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->

  <script src="<?php echo base_url().'assets/js/plugins/bootstrap-datetimepicker.js'?>"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->

  <script src="<?php echo base_url().'assets/js/plugins/nouislider.min.js'?>"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->

  <script src="<?php echo base_url().'assets/js/material-kit.js?v=2.0.7'?>"></script>
</body>

</html>