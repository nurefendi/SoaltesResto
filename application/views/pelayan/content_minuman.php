
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Food</h3>
      </div>
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
      
      <?php foreach (json_decode($product) as $pro) {?> 
        <div class="col-md-3 col-xs-12 widget widget_tally_box">
          <div class="x_panel ui-ribbon-container fixed_height_390">

            <div class="x_content">

              <div style="text-align: center; margin-bottom: 17px">
                <img width="200" src="https://pbs.twimg.com/profile_images/679184869579055105/-SCjq8A6_400x400.jpg">
              </div>

              <h3 class="name_title"><?php echo $pro->productName; ?></h3>
              <h4 class="name_title"><?php echo 'Rp '.number_format($pro->productPrice);?></h4>


              <div class="divider"></div>


              <?php if ($pro->productStok == '0') { ?>
                <a href="javascript:void(0);" class="btn btn-danger btn-block" role="button">Sold Out!</a>
              <?php }else{ ?>
                <div class="col-md-5">
                  <input type="number" name="quantity" id="<?php echo $pro->productID;?>" value="1" class="quantity form-control">                
                </div>
                <div class="col-md-7">
                  <button class="add_cart btn btn-success btn-block form-control" data-produkid="<?php echo $pro->productID;?>" data-produknama="<?php echo $pro->productName;?>" data-produkharga="<?php echo $pro->productPrice;?>">Select</button>
                </div>

              <?php }?>


            </div>

          </div>

        </div>

      <?php } ?>
    </div>
  </div>
</div>



