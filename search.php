    <?php
        include 'page_header.php';
        if(isset($_POST['submit'])){
            $search = $_POST['search'];
            $data = $obj->search_iteam($search);
        }
    ?>
    <!-- background photo start-->

    <div class="bac">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="category text-center">
                        <h2>Search Result</h2>
                        <span>E-Shop</span><i class="fas fa-arrow-right"></i><span>Search</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">

        <div class="looking-header mt-20 mb-30 search">
            <h2>Search Result</h2>
        </div>
        <div class="row">
            <!-- loop start -->
            

               <?php 
                if($data->num_rows>0){
                    while($row = $data->fetch_object()){
                        $dis = $row->product_discount;
                        ?>  
                <div class="col-md-3 col-sm-6 col-xs-12 mb-20"> 
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
                    </div>
                    <?php
                    }
                }else{
                    ?>
                        <h3 class="text-center text-danger ml-3 m-auto">Your Searching Result is Not Found!</h3>
                    <?php
                }
            ?>
            <!-- loop end -->
        </div>
    </div>

    <!-- background photo end-->
    <!-- Related product start -->
    <section class="looking-area mt-10 mb-40">
            <div class="container">
                <div class="row">
                    <div class="looking-header mt-20 mb-30">
                        <h2>Best Seller You May Like This!</h2>
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

        <?php
           include 'page_footer.php';
        ?>