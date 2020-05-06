    <?php
        include 'page_header.php';
        $cat_data = $obj->show_cat();
        $offer = $obj->offer_show();
        $cupon = $obj->check_cupon();
    ?>
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
    <?php
        if(isset($_SESSION['msg']['order_suss'])){
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
    <!-- start cupon popup -->
    <?php
        if($cupon->num_rows>0){
            while($row = $cupon->fetch_object()){
                if($row->cup_status == 1){
                    if(!isset($_SESSION['popup'])){
                ?>
                    <div id="popupMain" style="display:none">
                        <div id="popup">
                            <div class="container">
                                <h1 class="coupon-dis">-<span><?php echo $row->cup_discount;?></span>%</h1>
                                <h1 class="coupon-code">COUPON CODE : <?php echo $row->cup_code;?></h1><br>
                                <span class="cupon-title"><?php echo $row->cup_title;?></span><br>
                                <span class="coupon-valid">Valid Through <?php echo $row->cup_expired;?></span><br>
                                <button class="pop-btn mt-3" id="submit_pop">ok</button>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                }
            }
        }
    ?>
    
    
    <!-- end cupon popup -->
    <!--slider area started-->
    <section class="slider-area">
        <div id="slider-active" class="owl-carousel">
            <div class="item slider-box"
                data-background="img/2560x1600-safety-orange-blaze-orange-solid-color-background.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="slider-text">
                                <h2 style="color: #e7e2e2;"> save up to 150$ on your next laptop </h2>
                                <div class="slider-btn">
                                    <a class="btn" href="catagory.php?id=2">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="slider-img">
                                <a href="catagory.php?id=2"><img src="img/17-laptop-notebook-png-image_600x600.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slider-box" data-background="img/slide-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="slider-text">
                                <h2 style="color: #e7e2e2;"> save up to 150$ on your next Camera </h2>
                                <div class="slider-btn">
                                    <a class="btn" href="catagory.php?id=3">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="slider-img">
                                <a href="catagory.php?id=3"><img src="img/3-photo-camera-png-image_600x600.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slider-box" data-background="img/slide-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="slider-text">
                                <h2 style="color: #e7e2e2;"> save up to 250<span class="pl-1">৳</span> on your next Headphone </h2>
                                <div class="slider-btn">
                                    <a class="btn" href="catagory.php?id=3">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="slider-img">
                                <a href="catagory.php?id=3"><img src="img/10-headphones-png-image_600x600.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->

    <section class="feature-area">
        <div class="container">
            <div class="row">
                <div class="feature-box mt-40 mb-30">
                    <h2 class="g_font">feature category</h2>
                </div>
            </div>
            <div id="feature-active" class="owl-carousel">
                <?php
                if($cat_data->num_rows>0){
                    while($row_cat = $cat_data->fetch_object()){
                          $main_cat_id = $row_cat->id;
                        ?>
                            <a href="catagory.php?id=<?php echo $main_cat_id;?>">
                                <div class="single-feature text-center mt-20 mb-20">
                                    <i class="<?php echo $row_cat->cat_icon;?>"></i>
                                    <h3><?php echo $row_cat->cat_name;?></h3>
                                    <?php
                                        $data = $obj->pro_by_cat($main_cat_id);
                                        if($data->num_rows>0){
                                            $row = $data->num_rows;
                                            ?>
                                            <span><?php echo $row;?> products</span>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </a>
                        <?php
                    }
                }
                ?>
                

                <!-- <a href="#">
                    <div class="single-feature text-center mt-20 mb-20">
                        <i class="fas fa-laptop"></i>
                        <h3>Electronics</h3>
                        <span>333 products</span>
                    </div>
                </a>
                <a href="#">
                    <div class="single-feature text-center mt-20 mb-20">
                        <i class="fas fa-user-secret"></i>
                        <h3>Clothes</h3>
                        <span>333 products</span>
                    </div>
                </a>
                <a href="#">
                    <div class="single-feature text-center mt-20 mb-20">
                        <i class="fas fa-volleyball-ball"></i>
                        <h3>toy and kids</h3>
                        <span>333 products</span>
                    </div>
                </a>
                <a href="#">
                    <div class="single-feature text-center mt-20 mb-20">
                        <i class="fas fa-smile"></i>
                        <h3>toy and kids</h3>
                        <span>333 products</span>
                    </div>
                </a>
                <a href="#">
                    <div class="single-feature text-center mt-20 mb-20">
                        <i class="fas fa-smile"></i>
                        <h3>toy and kids</h3>
                        <span>333 products</span>
                    </div>
                </a> -->
            </div>
        </div>
    </section>
    <!-- offer -->
    <section>
        <?php 
            if($offer->num_rows>0){
                while($row = $offer->fetch_object()){
                    $status = $row->status;
                    $img = $row->banner;
                    $id = $row->offer_id;
                    $dis  = $row->offer_discount;
                    if($status == 1){
                        ?>
                            <div>
                                <a href="offer.php?off=<?php echo $dis;?>">
                                    <img width="100%" src="<?php if(isset($img)){echo 'uploads/'.$img;}?>" alt="">  
                                </a>  
                            </div> 
                        <?php
                    }
                }

            }
        ?>
               
    </section>  
    <!-- offer          -->
    <!--customer looking area start-->
    <section class="looking-area mt-10">
        <div class="container">
            <div class="row">
                <div class="looking-header mt-20 mb-30">
                    <h2 class="g_font">What after Customers Are looking at right now</h2>
                </div>
            </div>
            <div class="owl-carousel looking-active">
                <?php 
                    $data_sec1 = $obj->show_product_looking();
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
                            <a href="details.php?id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="fas fa-heartbeat"></i></a>
                            <a data-toggle="tooltip" data-placement="right" title="Add to Cart" href="details.php?id=<?php echo $row->id;?>"><i class="fas fa-shopping-cart"></i></a>
                            <a data-toggle="tooltip" data-placement="right" title="Quick View" href="details.php?id=<?php echo $row->id;?>"><i class="fas fa-eye"></i></a>
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
        </div>
    </section>
    <!--customer looking area end-->

    <!--just for you start-->
    <section class="just-area">
        <div class="container">
            <div class="row">
                <div class="looking-header mt-30 mb-30">
                    <h2>Just For you</h2>
                </div>
            </div>
            <div class="owl-carousel looking-active">  
            <?php 
                $data_sec2 = $obj->show_product_just();
                if($data_sec2->num_rows>0){
                    while($row = $data_sec2->fetch_object()){
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
                                    <a href="details.php?id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="fas fa-heartbeat"></i></a>
                                    <a data-toggle="tooltip" data-placement="right" title="Add to Cart" href="details.php?id=<?php echo $row->id;?>"><i class="fas fa-shopping-cart"></i></a>
                                    <a data-toggle="tooltip" data-placement="right" title="Quick View" href="details.php?id=<?php echo $row->id;?>"><i class="fas fa-eye"></i></a>
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
    <!--just for you end-->

    <!--popular product start-->
    <section class="just-area pb-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="looking-header mt-30 mb-30">
                    <h2>Popular Product</h2>
                </div>
            </div>
            <div class="owl-carousel looking-active">
            <?php 
                $data_sec3 = $obj->show_product_popular();
                if($data_sec3->num_rows>0){
                    while($row = $data_sec3->fetch_object()){
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
                                <a href="details.php?id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="fas fa-heartbeat"></i></a>
                                <a data-toggle="tooltip" data-placement="right" title="Add to Cart" href="details.php?id=<?php echo $row->id;?>"><i class="fas fa-shopping-cart"></i></a>
                                <a data-toggle="tooltip" data-placement="right" title="Quick View" href="details.php?id=<?php echo $row->id;?>"><i class="fas fa-eye"></i></a>
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
    <!--popular product end-->
    <div class="bac1">
        
    </div>
    <!--Best tech area start-->
    <section class="just-area">
        <div class="container">
            <div class="row">
                <div class="looking-header mt-40 mb-30">
                    <h2>Best of Tech</h2>
                </div>
            </div>
            <div class="owl-carousel looking-active">
            <?php 
                $data_sec4 = $obj->show_product_tech();
                if($data_sec4->num_rows>0){
                    while($row = $data_sec4->fetch_object()){
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
                                <a href="details.php?id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="fas fa-heartbeat"></i></a>
                                <a data-toggle="tooltip" data-placement="right" title="Add to Cart" href="details.php?id=<?php echo $row->id;?>"><i class="fas fa-shopping-cart"></i></a>
                                <a data-toggle="tooltip" data-placement="right" title="Quick View" href="details.php?id=<?php echo $row->id;?>"><i class="fas fa-eye"></i></a>
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
    <!--Best tech area end-->

    <!--deals area start-->
    <section class="looking-area mt-10 mb-40">
        <div class="container">
            <div class="row">
                <div class="looking-header mt-20 mb-30">
                    <h2>Deals Under 2,000<span class="pl-1">৳</span></h2>
                </div>
            </div>
            <div class="owl-carousel looking-active">
            <?php 
                $data_sec5 = $obj->show_product_under_price();
                if($data_sec5->num_rows>0){
                    while($row = $data_sec5->fetch_object()){
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
                                <a href="details.php?id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="fas fa-heartbeat"></i></a>
                                <a data-toggle="tooltip" data-placement="right" title="Add to Cart" href="details.php?id=<?php echo $row->id;?>"><i class="fas fa-shopping-cart"></i></a>
                                <a data-toggle="tooltip" data-placement="right" title="Quick View" href="details.php?id=<?php echo $row->id;?>"><i class="fas fa-eye"></i></a>
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
    ?>