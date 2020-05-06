    <?php
        $page = 'order';
        include 'header.php';
        if(isset($_GET['or_id'])){
            $or_id = $_GET['or_id'];
            $order_data = $obj->order_product($or_id);
            $order_date = $obj->order_product($or_id);
        }
        if(isset($_GET['uid'])){
            $uid = $_GET['uid'];
            $cus_data = $obj->show_cus_id($uid);
        }
        
        if($cus_data->num_rows>0){
            while($c_row = $cus_data->fetch_object()){
                $id = $c_row->id;
                $name = $c_row->name;
                $email = $c_row->email;
                $mobile = $c_row->mobile;
                $cus_div = $c_row->division;
                $cus_dis = $c_row->district;
                $division = $c_row->div_name;
                $district = $c_row->dis_name;
                $address = $c_row->address;
            }
        }
    
    ?>
    
    
    <div class="main-content" id="print">
        <section class="section">
          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="invoice-title">
                      <h2>Invoice</h2>
                      <div class="invoice-number">Order #<?php if(isset($or_id)){echo $or_id;}?></div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Billed To:</strong><br>
                          <?php echo $name;?>
                          <br>
                          <?php echo $address;?><br>
                          <?php echo $district;?>,<br>
                          <?php echo $division;?>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Shipped To:</strong><br>
                          Keith Johnson<br>
                          197 N 2000th E<br>
                          Rexburg, ID,<br>
                          Springfield Center, USA
                        </address>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Payment Method:</strong><br>
                          Cash On Delivery<br>
                          <?php echo $email;?><br>
                          <?php echo $mobile;?>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Order Date:</strong><br>
                          <?php 
                            if($order_date->num_rows>0){
                              while($date = $order_date->fetch_object()){
                                $order_time =  $date->created;
                              }
                            }
                          
                          echo date('j-m-Y, g:i a',strtotime($order_time));?><br><br>
                          
                        </address>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">All items here cannot be deleted.</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <th data-width="40">P_id</th>
                          <th>Item</th>
                          <th class="text-center">Price</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-right">Totals</th>
                        </tr>
                        <?php 
                            if($order_data->num_rows>0){
                                $subtotal = 0;
                                while($row = $order_data->fetch_object()){
                                        $shipping = $row->shipping;
                                        $total = $row->total;
                                    ?>
                                    <tr>
                                        <td><?php echo $row->product_id;?></td>
                                        <td><?php echo $row->product_name;?></td>
                                        <td class="text-center"><?php echo number_format($row->product_price);?><span class="pl-1">৳</span></td>
                                        <td class="text-center"><?php echo $row->product_quantity;?></td>
                                        <td class="text-right"><?php echo number_format($row->product_price*$row->product_quantity);?><span class="pl-1">৳</span></td>
                                        </tr>
                                    <?php
                                    $subtotal = $subtotal +($row->product_price*$row->product_quantity); 
                                }
                            }
                        ?>
                        

                        <!-- <tr>
                          <td>2</td>
                          <td>Keyboard Wireless</td>
                          <td class="text-center">$20.00</td>
                          <td class="text-center">3</td>
                          <td class="text-right">$60.00</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Headphone Blitz TDR-3000</td>
                          <td class="text-center">$600.00</td>
                          <td class="text-center">1</td>
                          <td class="text-right">$600.00</td>
                        </tr> -->
                      </table>
                    </div>
                    <div class="row mt-4">
                      <div class="col-lg-8">
                        <div class="section-title">Payment Method</div>
                        <p class="section-lead">The payment method that we provide is to make it easier for you to pay
                          invoices.</p>
                        <div class="images">
                          <img src="assets/img/cards/visa.png" alt="visa">
                          <img src="assets/img/cards/jcb.png" alt="jcb">
                          <img src="assets/img/cards/mastercard.png" alt="mastercard">
                          <img src="assets/img/cards/paypal.png" alt="paypal">
                        </div>
                      </div>
                      <div class="col-lg-4 text-right">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Subtotal</div>
                          <div class="invoice-detail-value"><?php echo number_format($subtotal);?><span class="pl-1">৳</span></div>
                        </div>
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Shipping</div>
                          <div class="invoice-detail-value"><?php echo $shipping;?></div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Total (including all)</div>
                          <div class="invoice-detail-value invoice-detail-value-lg"><?php echo number_format($total);?><span class="pl-1">৳</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                  <a onclick="javascript: return confirm('Are You Sure?');" href="order_confirm.php?id=<?php echo $or_id;?>" class="btn btn-primary btn-icon icon-left text-white"><i class="fas fa-credit-card"></i>Confirm Order</a>
                  <a onclick="javascript: return confirm('Are You Sure?');" href="order_delete.php?id=<?php echo $or_id;?>" class="btn btn-danger btn-icon icon-left text-white"><i class="fas fa-times"></i> Cancel</a>
                </div>
                <button class="btn btn-warning btn-icon icon-left" onclick="myfun('print')"><i class="fas fa-print"></i> Print</button>
              </div>
            </div>
          </div>
        </section>
    </div>
    <?php
        
        include 'footer.php';
    
    ?>