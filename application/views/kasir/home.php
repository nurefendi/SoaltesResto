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
                  <li><a href="<?php echo base_url('index.php/kasir/kasir/productMakanan'); ?>">Food</a></li>
                  <li><a href="<?php echo base_url('index.php/kasir/kasir/productMinuman'); ?>">Drink</a></li>                      
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
              <a href="<?php echo base_url('index.php/kasir/kasir'); ?>" class="info-number">
                <span class="badge bg-green"><?php echo $countorder[0]['ttorder']; ?></span>
                <i class="fa fa-reorder"></i> List
              </a>
            </li>
            <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-shopping-cart"></i> Orders
                <span class="count-cart badge bg-green"><?php echo count($this->cart->contents()); ?></span>
              </a>
              <ul id="datacart" class="dropdown-menu list-unstyled msg_list">
                <table class="table">
                  <tbody id="detail_cart">


                  </tbody>
                </table>         
              </ul>
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
<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="antoform" class="form-horizontal calender" role="form" action="<?php echo base_url();?>index.php/cart/proses_cart" method="post">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Order Chek Out</h4>
      </div>
      <div class="modal-body">
        <div id="testmodal" style="padding: 5px 20px;">
          
            <div class="form-group">
              <label class="col-sm-3 control-label">No Meja</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" id="title" name="nomeja" required>
              </div>
            </div>
            <div class="form-group">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody id="modalcart">
                 
                </tbody>
              </table> 
            </div>

          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary antosubmit">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>theme/vendors/jquery/dist/jquery.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>theme/vendors/bootstrap/dist/js/bootstrap.js"></script>

<script type="text/javascript">
      $(document).ready(function(){
            $('.add_cart').click(function(){
                  var produk_id    = $(this).data("produkid");
      var produk_nama  = $(this).data("produknama");
      var produk_harga = $(this).data("produkharga");
      var quantity     = $('#' + produk_id).val();
                  
            $.ajax({
                  url : "<?php echo base_url();?>index.php/cart/add_to_cart",
                  method : "POST",
        data : {produk_id: produk_id, produk_nama: produk_nama, produk_harga: produk_harga, quantity: quantity},
           success: function(data){ 
          $('#detail_cart').html(data);
          $('#modalcart').html(data); 

          $('.count-cart').load("<?php echo base_url();?>index.php/cart/count_cart");
                              

           }
            });
    });

    // Load shopping cart
    $('#detail_cart').load("<?php echo base_url();?>index.php/cart/load_cart");
    // Load shopping cart
    $('#modalcart').load("<?php echo base_url();?>index.php/cart/load_cartmodal");


     //Hapus Item Cart
    $(document).on('click','.hapus_cart',function(){
      var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
      $.ajax({
        url : "<?php echo base_url();?>index.php/cart/hapus_cart",
        method : "POST",
        data : {row_id : row_id},
        success :function(data){
          $('#detail_cart').html(data);
          $('#modalcart').html(data); 
          $('.count-cart').load("<?php echo base_url();?>index.php/cart/count_cart");
        }
      });
    });
            
      });
</script>
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
