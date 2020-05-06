<?php
  $page = 'customer';
  include 'header.php';
  $data = $obj->show_cus();
  
?>
      <?php
          if(isset($_SESSION['msg']['del'])){
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
                    <h4>Customer's Information</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>SL</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Created</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if($data->num_rows>0){
                              $si = 1;
                              while($row = $data->fetch_object()){
                                ?>
                          <tr>
                            <td><?php echo $si;?></td>
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->email;?></td>
                            <td><?php echo $row->mobile;?></td>
                            <td><?php echo date('j-m-Y, g:i a',strtotime($row->created))?></td>
                            <td class="view"><a data-toggle="tooltip" data-placement="top" title="View" href="cus_details.php?id=<?php echo $row->id;?>" class=""><i class="fas fa-eye"></i></a></td>
                          </tr>
                          <?php
                              $si++;
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
  
  include 'footer.php';
?>