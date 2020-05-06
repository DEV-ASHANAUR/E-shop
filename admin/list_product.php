<?php
  $page = 'product';
  $subpage = 'product_list';
  include('header.php');
  $data = $obj->show_product();
  
?>
    <?php
          if(isset($_SESSION['msg']['product_del'])){
              ?>
                  <script type="text/javascript">
                      Swal.fire(
                          'Deleted!',
                          '<?php echo Flass_data::show_error();?>',
                          'success'
                          );
                  </script>
              <?php
          }
      ?>
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Product List</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped text-center" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-left">SL</th>
                            <th class="text-left">Product</th>
                            <th>Price</th>
                            <th>Product Catagory</th>
                            <th>Discount</th>
                            <th>Stock</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if($data->num_rows>0){
                                $si = 1;
                              while($row = $data->fetch_object()){
                                  $dis = $row->product_discount;
                                  $id =$row->id;
                                  $main_stock = $row->product_stcock;
                                  $pro_stock = $obj->cal_pro_stock($id);
                                  
                                  ?>
                                  
                          <tr>
                            <td class="text-left"><?php echo $si;?></td>
                            <td class="text-left"><img alt="image" src="<?php echo "../uploads/".$row->product_image;?>" class="rounded-circle" width="35"
                                data-toggle="tooltip" title="<?php echo $row->product_name;?>"><span class="pl-1"><?php echo $row->product_name;?></span></td>
                            <td><span><?php echo number_format($row->product_price);?></span><span> ৳</span></td>

                            <td><?php echo $row->cat_name;?></td>
                            <td><?php if(!empty($dis)){echo $dis;}else{ echo '0';}?><span>%</span></td>
                                
                            <td>
                            <?php
                            if($pro_stock->num_rows>0){
                                    //$roww = $pro_stock->num_rows;
                                    // $total_stock = $stock-$roww;
                                    $sum = 0;
                                    while($rew = $pro_stock->fetch_object()){
                                      $sum = $sum + ($rew->product_quantity);
                                    }
                                    $sum;
                                    $stock = $main_stock-$sum;
                                    if($stock<=20){
                                      ?>
                                       <a data-toggle="tooltip" data-placement="top" title="<?php echo $stock;?>" href="#" class="badge badge-danger warning-pill text-white">low</a> 
                                      <?php
                                    }elseif($stock<=50){
                                      ?>
                                       <a data-toggle="tooltip" data-placement="top" title="<?php echo $stock;?>" href="#" class="badge badge-warning warning-pill text-white">Medium</a> 
                                      <?php
                                    }elseif($stock>=51){
                                      ?>
                                       <a data-toggle="tooltip" data-placement="top" title="<?php echo $stock;?>" href="#" class="badge badge-success warning-pill text-white">High</a> 
                                      <?php
                                    }
                                  }else{
                                    if($main_stock<=20){
                                      ?>
                                       <a data-toggle="tooltip" data-placement="top" title="<?php echo $main_stock;?>" href="#" class="badge badge-danger warning-pill text-white">low</a> 
                                      <?php
                                    }elseif($main_stock<=50){
                                      ?>
                                       <a data-toggle="tooltip" data-placement="top" title="<?php echo $main_stock;?>" href="#" class="badge badge-warning warning-pill text-white">Medium</a> 
                                      <?php
                                    }elseif($main_stock>=51){
                                      ?>
                                       <a data-toggle="tooltip" data-placement="top" title="<?php echo $main_stock;?>" href="#" class="badge badge-success warning-pill text-white">High</a> 
                                      <?php
                                    }
                                  }
                                  
                                  ?>
                            
                            </td>

                            <td class="view"><a data-toggle="tooltip" data-placement="top" title="View &amp; Edit" href="edit_product.php?id=<?php echo $row->id;?>" class=""><i class="fas fa-edit"></i></a>

                            <a onclick="javascript:return confirm('Are You Sure!');" data-toggle="tooltip" data-placement="top" title="Delete" href="product_delete.php?id=<?php echo $row->id;?>" class="trash"><i class="fas fa-trash-alt"></i></a></td>
                          </tr>
                          <?php
                            $si++;
                              }
                            }
                          ?>
                          <!-- <tr>
                            <td class="text-left">02</td>
                            <td><img alt="image" src="assets/img/users/user-1.png" class="rounded-circle" width="35"
                                data-toggle="tooltip" title="Nur Alpiana"><span class="pl-1">Laptop</span></td>
                            <td><span>5,000</span><span> ৳</span></td>
                            <td>laptop</td>
                            <td>40<span>%</span></td>
                            <td>500<span class="pl-1">pice</span></td>
                            <td class="view"><a data-toggle="tooltip" data-placement="top" title="View &amp; Edit" href="edit_cat.php" class=""><i class="fas fa-edit"></i></a>
                            <a data-toggle="tooltip" data-placement="top" title="Delete" href="#" class="trash"><i class="fas fa-trash-alt"></i></a></td>
                          </tr> -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php
  // id="swal-6"
  include('footer.php');
?>