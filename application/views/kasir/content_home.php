<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Orders <small>Listing Order</small></h3>
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
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Active Orders</h2>                    
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

           

            <!-- start project list -->
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <th style="width: 1%">#</th>
                  <th style="width: 20%">No Table</th>
                  <th>Order Date</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th style="width: 20%">#Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach (json_decode($activeorder) as $val => $rowin) { ?>
                 
                <tr>
                  <td>#</td>
                  <td>
                    <a>Table No: <?php echo $rowin->ordersTableNumber; ?></a>
                    <br />
                    <small><?php echo $rowin->ordersID; ?></small>
                  </td>
                  <td>
                    <a><?php echo $rowin->ordersDate; ?></a>
                  </td>
                  <td>
                   
                    <?php echo $sumdata->sumorder($rowin->ordersIDDetails)[0]['sumqty']; ?>
                  </td>
                  <td>
                    <?php echo 'Rp '.number_format($sumdata->sumorder($rowin->ordersIDDetails)[0]['sumtotal']); ?>
                  </td>
                  <td>                                     
                    <button type="button" class="btn btn-success btn-xs">On Prosses</button>                  
                  </td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#lihat"><i class="fa fa-folder"></i> View </a>
                    <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit"><i class="fa fa-pencil"></i> Edit </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                  </td>
                </tr>
                
                <?php } ?>
              </tbody>
            </table>
            <!-- end project list -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="lihat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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