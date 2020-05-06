<?php
  $page = 'coupon';
  include('header.php');
  $data = $obj->check_cupon();
  
  if($data->num_rows>0){
    while($row = $data->fetch_object()){
      $id = $row->cup_id;
      $title = $row->cup_title;
      $dis = $row->cup_discount;
      $code = $row->cup_code;
      $expired = $row->cup_expired;
      $status = $row->cup_status;

    }
  }
?>  
    <?php
          if(isset($_SESSION['msg']['cupon_up'])){
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
                  <form action="coupon_update.php" method="post">
                    <div class="card-header">
                      <h4>Manage Coupon</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Offer Title</label>
                        <input type="text" name="title" value="<?php if(isset($title)){echo $title;}?>" class="form-control" required="" placeholder="Ex : Coupon">
                      </div>
                      <div class="form-group">
                        <label>Discount</label>
                        <input type="text" name="discount" value="<?php if(isset($dis)){echo $dis;}?>" class="form-control" required="" placeholder="Ex : 40">
                      </div>
                      <div class="form-group">
                        <label>Coupon Code</label>
                        <input type="text" name="code" value="<?php if(isset($code)){echo $code;}?>" class="form-control" required="" placeholder="Ex : FFGGEER">
                      </div>
                      <div class="form-group">
                        <label>Expired Date</label>
                        <input type="text" name="expired" value="<?php if(isset($expired)){echo $expired;}?>" class="form-control" required="" placeholder="Ex : 2020/01/20">
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