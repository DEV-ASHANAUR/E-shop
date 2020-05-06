<?php
  $page = 'catagory';
  $subpage = 'catagory_list';
  include('header.php');
  $data = $obj->show_cat();
  
?>
      <?php
          if(isset($_SESSION['msg']['dcat'])){
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
                    <h4>Catagory List</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped text-center" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-left">SL</th>
                            <th>Catagory Icon</th>
                            <th>Catagory Name</th>
                            <th>action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if($data->num_rows>0){
                              $si = 1;
                              while($row = $data->fetch_object()){
                                // echo $row->id;
                                ?>
                                <tr>
                                  <td class="text-left"><?php echo $si;?></td>
                                  <td><i class="<?php echo $row->cat_icon;?>"></i></td>
                                  <td><?php echo $row->cat_name;?></td>
                                  <td class="view"><a data-toggle="tooltip" data-placement="top" title="Edit" href="edit_cat.php?id=<?php echo $row->id;?>"><i class="fas fa-edit"></i></a>

                                  <a onclick="javascript:return confirm('Are You Sure!');" data-toggle="tooltip" data-placement="top" title="Delete" href="cat_delete.php?id=<?php echo $row->id;?>" class="trash"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                                <?php
                                $si++;
                              }
                            }
                          
                          ?>
                          <!-- <tr>
                            <td class="text-left">02</td>
                            <td><i class="fas fa-trash-alt"></i></td>
                            <td>Md Ashanur Rahman</td>
                            <td class="view"><a data-toggle="tooltip" data-placement="top" title="Edit" href="edit_cat.php" class=""><i class="fas fa-edit"></i></a>
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