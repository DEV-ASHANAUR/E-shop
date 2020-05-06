    <?php
        include 'page_header.php';
        if(!isset($_SESSION['user'])){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                //header("location:http://localhost/E-shop/sign_in.php?id=".$id); 
            
            echo "<script>
                window.location='http://localhost/E-shop/sign_in.php?id=$id';
            </script>";
            }
        }else{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $data = $obj->one_product($id); 
            }
            if($data->num_rows>0){
                while($row = $data->fetch_assoc()){
                    $id = $row['id'];
                    $name = $row['product_name'];
                    $img = $row['product_image'];
                    $pro_catagory = $row['product_catagory'];
                    $brand = $row['product_brand'];
                    $stock = $row['product_stcock'];
                    $section = $row['product_section'];
                    $condition = $row['product_condition'];
                    $details = $row['product_details'];
                    $main_price = $row['product_price'];
                    $dis = $row['product_discount'];
                         
                }
            } 
    ?>
    <section class="product-area  mb-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12 pt-30 d-flex justify-content-center">
                    <div class="mt-5 text-right">
                        <a href="#"><img class="zoom" src="<?php echo 'uploads/'.$img;?>"
                                data-zoom-image="<?php echo 'uploads/'.$img;?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12">
                    <div class="product-page-text pt-65">
                        <p><?php echo $condition;?></p>
                        <h2><?php echo $name;?></h2>
                        <div class="product-page-icon">
                            <a href="#"><i class="far fa-star"></i></a>
                            <a href="#"><i class="far fa-star"></i></a>
                            <a href="#"><i class="far fa-star"></i></a>
                            <a href="#"><i class="far fa-star"></i></a>
                            <a href="#"><i class="far fa-star"></i></a>
                        </div>
                        <h3>
                        <?php
                        if(!empty($dis)){
                            $dispoint = $dis/100;
                            $discount = $dispoint * $main_price;
                            $price = $main_price-$discount;
                            echo number_format($price,2);
                        }else{
                           echo number_format($main_price);
                        }?>
                    <span class="pl-1">৳</span></h3>
                        <div class="product-detlils">
                            <p>availablity:<span> in stock</span></p>
                            <p>condition: <span><?php echo $condition;?></span></p>
                            <p>Brand: <span><?php echo $brand;?></span></p>
                        </div>
                        <form action="cart_process.php?action=add&id=<?php echo $id;?>" method="post">
                            <div class="box">
                                <label for="num">Quentity:</label>
                                <input type="hidden" name="hidden_name" value="<?php echo $name;?>">
                                <input type="hidden" name="image" value="<?php echo $img;?>">
                                <?php
                                    if(!empty($dis)){
                                        $dispoint = $dis/100;
                                        $discount = $dispoint * $main_price;
                                        $price = $main_price-$discount;
                                        ?>
                                        <input type="hidden" name="hidden_price" value="<?php echo $price;?>">
                                        <?php
                                    }else{
                                        ?>
                                        <input type="hidden" name="hidden_price" value="<?php echo $main_price;?>">
                                    
                                    <?php
                                    }?>
                                <input class="quan" name="quantity" type="number" value="1" min="1" max="3">
                                <!-- for Wishlist  -->
                                <input name="w_userid" type="hidden" value="<?php echo $_SESSION['user'];?>">
                                <input name="w_product_id" type="hidden" value="<?php echo $id;?>">
                                <!-- for Wishlist  -->
                            </div>
                            <div class="button-area">
                                <button type="submit" name="addcart">add to cart</button>
                                <?php
                                    if(isset($_GET['wish']) && $_GET['wish']=='yes'){
                                        //no action
                                    }else{
                                ?>
                                <button type="submit" name="wishlist">Add to Wishlist</button>
                                <?php }?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        if(isset($_SESSION['msg']['pass_suss'])){
            ?>
                <script type="text/javascript">
                    Swal.fire(
                        'Wellcome!',
                        '<?php echo Flass_data::show_error();?>',
                        'success'
                        );
                </script>
            <?php
        }
    ?>
    <!-- product Details start -->
    <?php
        if(isset($_SESSION['msg']['review_sus'])){
            ?>
                <script type="text/javascript">
                    Swal.fire(
                        'Thanks!',
                        '<?php echo Flass_data::show_error();?>',
                        'success'
                        );
                </script>
            <?php
        }
    ?>
    <section>
        <div class="container">
            <div class="tab-head">
                <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Product detils</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Review</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="p-3">
                        <span><?php echo $details;?></span>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="p-3">BE THE FIRST TO REVIEW “SONY PLAYSTATION 4 PRO”</h3>
                                <div class="product-page-icon p-3 mt-0">
                                    <span>Your Rating</span>
                                    <a class="star" href="#"><i class="far fa-star"></i></a>
                                    <a class="star" href="#"><i class="far fa-star"></i></a>
                                    <a class="star" href="#"><i class="far fa-star"></i></a>
                                    <a class="star" href="#"><i class="far fa-star"></i></a>
                                    <a class="star" href="#"><i class="far fa-star"></i></a>
                                </div>
                                <div class="p-3">
                                    <form action="review.php" method="post">
                                        <label for="review">Your Review</label>
                                        <input type="hidden" name="uid" value="<?php echo $_SESSION['user'];?>">
                                        <input type="hidden" name="pro_id" value="<?php echo $id;?>">
                                        <textarea class="form-control" name="review" id="review" cols="30" rows="5" required=""></textarea>
                                        <button type="submit" name="submit" class="btn mt-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 comments">
                                <h6 class="p-3">REVIEWS<sup><span class="badge badge-primary"></span></sup></h3>
                                <?php
                                    $user_id = $_SESSION['user'];
                                    $product_id = $id;
                                    $review = $obj->re_review($user_id,$product_id);
                                    if($review->num_rows>0){
                                        while($row = $review->fetch_object()){
                                            $uid = $row->user_id;
                                            $nam = $obj->user_by_session($uid);
                                            ?>
                                            
                                        <div class="p-3">
                                            <?php
                                                if($nam->num_rows>0){
                                                    while($roww = $nam->fetch_object()){
                                                        ?>
                                                            <h6><?php echo $roww->name;?></h6>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                            
                                            <div class="border retrive"><?php echo $row->comment;?></div>
                                        </div>
                                    <?php
                                        }
                                    }else{
                                        ?>
                                            <div class="p-3">
                                                <h6>No Review Yet!</h6>
                                            </div>
                                        <?php
                                    }
                                ?>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            </div>
        </div>
    </section>
    <!-- product Details end -->
    <!-- Related product start -->
    <section class="looking-area mt-10 mb-40">
        <div class="container">
            <div class="row">
                <div class="looking-header mt-20 mb-30">
                    <h2>Related Product</h2>
                </div>
            </div>
            <div class="owl-carousel looking-active">
                <?php 
                    $data_sec1 = $obj->search_cat_id($pro_catagory);
                        if($data_sec1->num_rows>0){
                            while($row = $data_sec1->fetch_object()){
                                $dis = $row->product_discount;
                            ?>   
                    <div class="card-area text-center">
                        <div class="card-top-body">
                            <?php
                                if(!empty($dis)){
                                    ?>
                                    <div class="discount">
                                        <span><?php echo $dis.'%';?></span>
                                    </div>
                                    <?php
                                }
                            ?>
                            
                            <div class="rdiscount">
                                <span><?php echo $row->product_condition;?></span>
                            </div>
                            <div class="card-img pt-3 pb-3">
                                <img src="<?php echo 'uploads/'.$row->product_image;?>" alt="">
                            </div>
                            <div class="card-icon">
                                <a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="fas fa-heartbeat"></i></a>
                                <a data-toggle="tooltip" data-placement="right" title="Add to Cart" href="details.php?id=<?php echo $row->id;?>"><i class="fas fa-shopping-cart"></i></a>
                                <a data-toggle="tooltip" data-placement="right" title="Quick View" href="#"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="card-text">
                            <h4><?php echo $row->product_name?></h4>
                            <div class="card-text-icon">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="card-dollar">
                                <?php
                                    if(!empty($dis)){
                                        ?>
                                        <del class="pr-2"><span><?php echo number_format($row->product_price,2);?></span><span class="pl-1">৳</span></del>
                                        <span><?php
                                        $dispoint = $dis/100;
                                        $discount = $dispoint * $row->product_price;
                                        $price = $row->product_price-$discount;
                                            echo number_format($price,2);
                                        ?></span><span class="pl-1">৳</span>
                                        <?php
                                    }else{
                                        ?>
                                            <span><?php echo number_format($row->product_price,2);?></span><span class="pl-1">৳</span>
                                        <?php
                                    }
                                ?>
                                <!-- <del class="pr-2"><i><span>10.00</span></i><span class="pl-1">৳</span></del>
                                <span>10.00</span><span class="pl-1">৳</span> -->
                            </div>
                        </div>
                       </div>
                      <?php
                     }
                  }
                ?>
                </div>
            </div>
        </section>
        <?php
           include 'page_footer.php';
            }
        ?>