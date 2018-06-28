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

<?php foreach (json_decode($product) as $pro) {?> 
    <div class="col-md-3 col-xs-12 widget widget_tally_box">
      <div class="x_panel ui-ribbon-container fixed_height_390">
        <div class="ui-ribbon-wrapper">
          <div class="ui-ribbon">
            30% Off
          </div>
        </div>
        <div class="x_content">

          <div style="text-align: center; margin-bottom: 17px">
            <span class="chart" data-percent="86">
              <span class="percent"></span>
            </span>
          </div>

          <h3 class="name_title"><?php echo $pro->productName; ?></h3>
          <h4 class="name_title">Rp. <?php echo $pro->productPrice; ?></h4>

          <div class="divider"></div>

          <p><?php echo $pro->productDescription; ?></p>
           <a href="javascript:void(0);" class="btn btn-success btn-block" role="button">Select</a>

        </div>

      </div>

    </div>
<?php } ?>

  </div>
</div>