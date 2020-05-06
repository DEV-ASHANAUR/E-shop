    <?php
        include 'page_header.php';
        $cat_data = $obj->show_cat();
        if(isset($_POST['sub'])){
            $min = $_POST['min'];
            $max = $_POST['max'];
            $data = $obj->filter_product($min,$max);
        }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $data = $obj->search_cat_id($id);
        }
        
    ?>
    <!-- background photo start-->
    <div class="bac">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="category text-center">
                            <h2>Our category</h2>
                            <span>E-Shop</span><i class="fas fa-arrow-right"></i><span>category</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cotainer ">
            <div class="row rpws">
                <div class="col-md-2 col-xs-12 back pt-3 pb-3">
                    <div class="heading text-center">
                        <span class="cat-title mt-2">Shop By Price</span>
                        <div class="">
                            <form action="catagory.php" method="post">
                                <table>
                                    <tr>
                                        <th><span class="text-white">৳&nbsp;</span><input type="number" class="form-control" name="min" min="1" value="1000" required=""></th>
                                        <th><span class="text-white">৳&nbsp;</span><input type="number" name="max" class="form-control" value="4000" required=""></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><input type="submit" min="1" name="sub" class="btn mt-2" value="Apply"></th>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <span class="cat-title mt-2">Catagory</span>
                        <ul class="catagory">
                            <?php
                                if($cat_data->num_rows>0){
                                    while($row = $cat_data->fetch_object()){
                                        $main_cat_id = $row->id;
                                        $dataa = $obj->pro_by_cat($main_cat_id);
                                        ?>
                                        <li><a href="catagory.php?id=<?php echo $row->id;?>"><?php echo $row->cat_name;?><span class="pl-2">(
                                            <?php
                                                if($dataa->num_rows>0){
                                                    echo $row = $dataa->num_rows;
                                                }
                                                ?>
                                        )</span></a></li>
                                        <?php
                                    }
                                }
                            ?>
                               
                        </ul>
                        
                    </div>
                </div>
                <div class="col-md-10 pt-3 pb-3">
                    <h4 class="mb-5 mt-3">Catagory Based</h4>
                    <div class="row rows">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- background photo end-->
        <?php
          include 'page_footer.php';
        ?>