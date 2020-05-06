<?php
  $page = 'catagory';
  $subpage = 'catagory_add';
  include('header.php');
  
  
?>  
    <?php
          if(isset($_SESSION['msg']['cat'])){
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
                  <form action="cat_insert.php" method="post">
                    <div class="card-header">
                      <h4>Add Catagory</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Catagory Icon (<span><a target="_blank" href="https://fontawesome.com/icons?m=free">Visit for link</a></span>)</label>
                        <input type="text" name="icon" class="form-control" required="" placeholder="Ex : fas fa-gift">
                      </div>
                      <div class="form-group">
                        <label>Catagory Name</label>
                        <input type="text" name="name" class="form-control" required="" placeholder="Ex : Mobile">
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