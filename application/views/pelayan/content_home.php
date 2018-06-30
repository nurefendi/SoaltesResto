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
                    <?php echo $sumdata->sumorder($rowin->ordersIDDetails)[0]['sumtotal']; ?>
                  </td>
                  <td>                                     
                    <button type="button" class="btn btn-success btn-xs">On Prosses</button>                  
                  </td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                    <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
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