<?php
  $page = 'product';
  include('header.php');
  $obj = new Main();
  $value = $obj->show_cat();
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $obj->one_product($id);
  }
  if($data->num_rows>0){
    while($row = $data->fetch_object()){
          $id = $row->id;
          $name = $row->product_name;
          $img = $row->product_image;
          $pro_catagory = $row->product_catagory;
          $brand = $row->product_brand;
          $price = $row->product_price;
          $dis = $row->product_discount;
          $stock = $row->product_stcock;
          $section = $row->product_section;
          $condition = $row->product_condition;
          $details = $row->product_details;
    }
  }
  
?>
    <?php
      if(isset($_SESSION['msg']['pro_up_sus'])){
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
            if(isset($_SESSION['msg']['pro_up_error'])){
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
                  <form action="pro_up.php" method="post" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4><i class="fas fa-edit"></i> Edit Product</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" value="<?php if(isset($name)){echo $name;}?>" class="form-control" required="" placeholder="Ex : iphone x">
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                          <label>Product Image(<span> note:200*200<span>)</label>
                          <input type="File" name="file" class="form-control">
                          <input type="hidden" name="picture" value="<?php if(isset($img)){echo $img;}?>"/>
                         </div>
                        </div>
                        <div class="col-md-6" id="test">
                            <img class="img-fluid img-thumbnail" width="150px" height="150px" src="<?php if(isset($img)){echo "../uploads/".$img;}?>" alt="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Product Catagory</label>
                        <select name="catagory" class="form-control" id="">
                          <option value="">Select Catagory</option>
                          <?php
                            if($value->num_rows>0){
                              while($row = $value->fetch_object()){
                                $cat_id = $row->id;
                                ?>
                               <option <?php if($cat_id == $pro_catagory){echo "selected = 'selected'";}?> value="<?php echo $row->id;?>"><?php echo $row->cat_name;?></option>
                              <?php
                              }
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Condition</label>
                        <select name="condition" class="form-control" id="">
                          <option value="">Select One</option>
                          <option <?php if($condition === "New"){echo "selected = 'selected'";}?> value="New">New</option>
                          <option <?php if($condition === "Old"){echo "selected = 'selected'";}?> value="Old">Old</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Section</label>
                        <select name="section" class="form-control" id="">
                          <option value="">Select One</option>
                          <option <?php if($section === "looking"){echo "selected = 'selected'";}?> value="looking">Looking At Right Now</option>
                          <option <?php if($section === "best_tech"){echo "selected = 'selected'";}?> value="best_tech">Best Tech</option>
                          <option <?php if($section === "popular"){echo "selected = 'selected'";}?> value="popular">Popular Product</option>

                          <option <?php if($section === "just_for_you"){echo "selected = 'selected'";}?> value="just_for_you">Just for you</option>

                          <option <?php if($section === "offer"){echo "selected = 'selected'";}?> value="offer">offer</option>
                          
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Brand</label>
                        <input type="text" name="brand" value="<?php if(isset($brand)){echo $brand;}?>" class="form-control" required="" placeholder="Ex : samsung">
                      </div>
                      <div class="form-group">
                        <label>Product Price(<span> note: in taka<span>)</label>
                        <input type="text" name="price" value="<?php if(isset($price)){echo $price;}?>" class="form-control" required="" placeholder="Ex : 1000">
                      </div>
                      <div class="form-group">
                        <label>Product Discount(<span> note: in percent<span>)</label>
                        <input type="text" name="dis" value="<?php if(isset($dis)){echo $dis;}?>" class="form-control" placeholder="Ex : 30%">
                      </div>
                      <div class="form-group">
                        <label>Product Stock(<span> note: in pices<span>)</label>
                        <input type="text" name="stock" value="<?php if(isset($stock)){echo $stock;}?>" class="form-control" required="" placeholder="Ex : 100">
                        <input type="hidden" value="<?php echo $id;?>" name="hid">
                      </div>
                      <div class="form-group">
                        <label>Product Details(<span> note: in 200 word<span>)</label>
                        <textarea name="details" class="form-control" id="" cols="30" rows="10" placeholder="Ex : lorem ipsum dolar"><?php if(isset($details)){echo $details;}?></textarea>
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