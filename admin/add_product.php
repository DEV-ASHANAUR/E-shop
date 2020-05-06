<?php
  $page = 'product';
  $subpage = 'product_add';
  include('header.php');
  $data = $obj->show_cat();
  
  
?>  
    <?php
      if(isset($_SESSION['msg']['product'])){
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
            if(isset($_SESSION['msg']['product_error'])){
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
                  <form action="product_in.php" method="post" enctype="multipart/form-data" id="uploadForm">
                    <div class="card-header">
                      <h4>Add Product</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Product Name <span class='text-danger'>*</span></label>
                        <input type="text" name="name" class="form-control" required="" placeholder="Ex : iphone x">
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                          <label>Product Image <span class='text-danger'>*</span>(<span> note:200*200<span>)</label>
                          <input type="File" name="file" id="file" class="form-control">
                         </div>
                        </div>
                        <div class="col-md-6" id="test">
                        
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Product Catagory <span class='text-danger'>*</span></label>
                        <select name="catagory" required="" class="form-control" id="">
                          <option value="">Select Catagory</option>
                          <?php
                            if($data->num_rows>0){
                              while($row = $data->fetch_object()){
                                ?>
                               <option value="<?php echo $row->id;?>"><?php echo $row->cat_name;?></option>
                              <?php
                              }
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Condition <span class='text-danger'>*</span></label>
                        <select name="condition" required="" class="form-control" id="">
                          <option value="">Select One</option>
                          <option selected value="New">New</option>
                          <option value="Old">Old</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Section <span class='text-danger'>*</span></label>
                        <select name="section" required="" class="form-control" id="">
                          <option value="">Select One</option>
                          <option value="looking">Looking At Right Now</option>
                          <option value="best_tech">Best Tech</option>
                          <option value="popular">Popular Product</option>
                          <option value="just_for_you">Just for you</option>
                          <option value="offer">Offer</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Brand <span class='text-danger'>*</span></label>
                        <input type="text" name="brand" class="form-control" required="" placeholder="Ex : samsung">
                      </div>
                      <div class="form-group">
                        <label>Product Price <span class='text-danger'>*</span>(<span> note: in taka<span>)</label>
                        <input type="text" name="price" class="form-control" required="" placeholder="Ex : 1000">
                      </div>
                      <div class="form-group">
                        <label>Product Discount(<span> note: in percent<span>)</label>
                        <input type="text" name="dis" class="form-control" placeholder="Ex : 30%">
                      </div>
                      <div class="form-group">
                        <label>Product Stock <span class='text-danger'>*</span>(<span> note: in pices<span>)</label>
                        <input type="text" name="stock" class="form-control" required="" placeholder="Ex : 100">
                      </div>
                      <div class="form-group">
                        <label>Product Details <span class='text-danger'>*</span>(<span> note: in 200 word<span>)</label>
                        <textarea name="details" required="" class="form-control" id="" cols="30" rows="10" placeholder="Ex : lorem ipsum dolar"></textarea>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="text" name="submit" class="btn btn-primary">Submit</button>
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