<?php
  $page = 'catagory';
  include('header.php');
  $obj = new Main();
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $obj->one_cat($id);
  }
  if($data->num_rows>0){
    while($row = $data->fetch_object()){
          $id = $row->id;
          $icon = $row->cat_icon;
          $name = $row->cat_name;
    }
  }
  
?>
  <?php
          if(isset($_SESSION['msg']['up'])){
              ?>
                  <script type="text/javascript">
                      Swal.fire(
                          'Good Job!',
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
              <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                  <form action="cat_up.php" method="post">
                    <div class="card-header">
                      <h4><i class="fas fa-edit"></i> Edit Catagory</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Catagory Icon (<span><a target="_blank" href="https://fontawesome.com/icons?m=free">Visit for link</a></span>)</label>
                        <input type="text" name="icon" value="<?php if(isset($icon)){echo $icon;}?>" class="form-control" required="" placeholder="Ex : fas fa-gift">
                      </div>
                      <div class="form-group">
                        <label>Catagory Name</label>
                        <input type="text" name="name" value="<?php if(isset($name)){echo $name;}?>" class="form-control" required="" placeholder="Ex : Mobile">
                        <input type="hidden"  name="hid" value="<?php if(isset($id)){echo $id;}?>">
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
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