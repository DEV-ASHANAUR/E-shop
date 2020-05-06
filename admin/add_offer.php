<?php
  $page = 'offer';
  include('header.php');
  $data = $obj->offer_show();
  
  if($data->num_rows>0){
    while($row = $data->fetch_object()){
      $id = $row->offer_id;
      $title = $row->offer_title;
      $dis = $row->offer_discount;
      $img = $row->banner;
      $status = $row->status;

    }
  }
?>  
    <?php
          if(isset($_SESSION['msg']['offer_suss'])){
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
      <?php
            if(isset($_SESSION['msg']['offer_errorr'])){
                ?>
                    <script type="text/javascript">
                        Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '<?php echo Flass_data::show_error();?>'
                            })
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
                  <form action="offer_update.php" method="post" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Manage Offer</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Offer Title</label>
                        <input type="text" name="title" value="<?php if(isset($title)){echo $title;}?>" class="form-control" required="" placeholder="Ex : Mega Sale">
                      </div>
                      <div class="form-group">
                        <label>Discount Up TO</label>
                        <input type="text" name="discount" value="<?php if(isset($dis)){echo $dis;}?>" class="form-control" required="" placeholder="Ex : 40">
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                          <label>offer Banner(<span> note:1200*450<span>)</label>
                          <input type="File" name="file" class="form-control">
                          <input type="hidden" name="picture" value="<?php if(isset($img)){echo $img;}?>"/>
                         </div>
                        </div>
                        <div class="col-md-6" id="test">
                            <img class="img-fluid img-thumbnail" width="250px" height="250px" src="<?php if(isset($img)){echo '../uploads/'.$img;}?>" alt="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Offer Status<span class='text-danger'>*</span></label>
                        <select name="status" required="" class="form-control" id="">
                          <option <?php if($status == 1){echo "selected";}?> value="1">ON</option>
                          <option <?php if($status == 0){echo "selected";}?> value="0">OFF</option>
                        </select>
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