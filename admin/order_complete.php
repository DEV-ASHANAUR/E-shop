<?php
  $page = 'order';
  $subpage = 'order_complete';
  include('header.php');
  $data = $obj->show_complete_order();
  
?>
      <?php
      if(isset($_SESSION['msg']['order_conn'])){
          ?>
              <script type="text/javascript">
                  Swal.fire(
                      'Confirmed!',
                      '<?php echo Flass_data::show_error();?>',
                      'success'
                      );
              </script>
          <?php
        }
      ?>
      <?php
      if(isset($_SESSION['msg']['order_unshif'])){
          ?>
              <script type="text/javascript">
                  Swal.fire(
                      'UNSHIFTED!',
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
                    <h4>Order Complete</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                        <tr>
                            <th>#order_id</th>
                            <th>Customer Name</th>
                            <th>Total</th>
                            <th>Mobile</th>
                            <th>Created</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if($data->num_rows>0){
                              while($row = $data->fetch_object()){
                                //echo $row->order_id;
                                ?>    
                          <tr>
                            <td><?php echo $row->order_id;?></td>
                            <td><?php echo $row->name;?></td>
                            <td><?php echo number_format($row->total);?><span class="pl-1">৳</span></td>
                            <td><?php echo $row->mobile;?></td>
                            <td><?php echo date('j-m-Y',strtotime($row->created))?></td>
                            <td class="view text-center"><a data-toggle="tooltip" data-placement="top" title="View Invoice" href="con_invoice.php?or_id=<?php echo $row->order_id;?>&uid=<?php echo $row->user_id;?>"><i class="fas fa-eye"></i></a>

                            <a onclick="javascript:return confirm('Are You Sure.?');" data-toggle="tooltip" data-placement="top" class="trash" title="Unshift" href="unshift.php?id=<?php echo $row->order_id;?>"><i class="fas fa-redo"></i></a>
                            </td>
                          </tr>

                          <?php
                              }
                            }
                          ?>
                          <!-- <tr>
                            <td>2</td>
                            <td>Md Ashanur Rahman</td>
                            <td>ashanour009@gmail.com</td>
                            <td>018669365622345</td>
                            <td>2018-01-20</td>
                            <td class="view"><a data-toggle="tooltip" data-placement="top" title="View" href="#" class=""><i class="fas fa-eye"></i></a></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Md Ashanur Rahman</td>
                            <td>ashanour009@gmail.com</td>
                            <td>01866936562</td>
                            <td>2018-01-20</td>
                            <td class="view"><a href="#" class=""><i class="fas fa-eye"></i></a></td>
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
  include 'footer.php';
?>