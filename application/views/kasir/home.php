<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SOALTES RESTO | </title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url(); ?>theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url(); ?>theme/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url(); ?>theme/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url(); ?>theme/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url(); ?>" class="site_title"> <span>SOALTES Resto</span></a>
          </div>

          <div class="clearfix"></div>


          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
               <li><a href="<?php echo base_url('index.php/kasir/kasir'); ?>"><i class="fa fa-home"></i> Home </a></li>
               <li><a><i class="fa fa-cutlery"></i> Product <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?php echo base_url('index.php/kasir/kasir/productMakanan'); ?>">Makanan</a></li>
                  <li><a href="<?php echo base_url('index.php/kasir/kasir/productMinuman'); ?>">Minuman</a></li>                      
                </ul>
              </li>  
              <li><a href="<?php echo base_url('index.php/kasir/kasir/transaction'); ?>"><i class="fa fa-area-chart"></i> Transaction</a></li>                
            </ul>
          </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->

        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="images/img.jpg" alt=""><?php echo $userName; ?>
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="<?php echo base_url('index.php/kasir/kasir/profile'); ?>"> Profile</a></li>
                <li><a href="javascript:;">Help</a></li>
                <li><a href="<?php echo base_url('index.php/kasir/kasir/logOut'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
              </ul>
            </li>
            <li>
              <a href="javascript:;" class="info-number">
                <span class="badge bg-green">32</span>
                <i class="fa fa-reorder"></i> Orders
              </a>
            </li>
            <li>
              <a href="javascript:;" class="info-number">
                <span class="badge bg-green">32</span>
                <i class="fa fa-shopping-cart"></i> Orders
              </a>
            </li>
            
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->

    <!-- page content -->
    <?php $this->load->view($loadCotent); ?>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
      <div class="pull-right">
       Soaltes Resto
     </div>
     <div class="clearfix"></div>
   </footer>
   <!-- /footer content -->
 </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>theme/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>theme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>theme/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>theme/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url(); ?>theme/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>theme/build/js/custom.min.js"></script>
</body>
</html>
