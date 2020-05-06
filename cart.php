    <?php
        include 'page_header.php';
        if(!isset($_SESSION['user'])){
            echo "<script>
            window.location='http://localhost/E-shop/sign_in.php';
            </script>";
        }else{
            $user_idd = $_SESSION['user'];
            $check = $obj->check_ship($user_idd);
            //update item
            if(isset($_POST['submit'])){
                foreach($_SESSION['cart'] as $key => $value){
                    if($value['item_id'] == $_POST['idd']){
                        $item_array = array(
                            'item_id' => $_POST['idd'],
                            'item_name' => $_POST['p_name'],
                            'item_image' => $_POST['p_image'],
                            'item_price' => $_POST['p_price'],
                            'item_qun' => $_POST['quantity_up']
                        );
                        $_SESSION['cart'][$key] = $item_array;
                        
                    }
                }
            }
            //remove Item
            if(isset($_GET['action'])){
                if($_GET['action']=='remove'){
                    foreach($_SESSION['cart'] as $key => $value){
                        if($value['item_id'] == $_GET['id']){
                            unset($_SESSION['cart'][$key]);
                            echo "<script>
                            window.location='http://localhost/E-shop/cart.php';
                            </script>";
                        }
                    }
                }
            }

    ?>
    <!-- cart section here -->
    <section class="mb-30" style="margin-bottom:400px;">
        <div class="container">
            <div class="feature-box mt-40 mb-30">
                <h2 class="ml-0">Shoping cart</h2>
            </div>
            <!-- <div class="mt-20">
                    <button class="btn f-right mb-3">Add More Item</button>
                </div> -->
            <div class="mt-5">
                <table class="table tbl-border">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($_SESSION['cart'])){
                                $total = 0;
                                foreach($_SESSION['cart'] as $key => $value){
                                    ?>
                                    
                        <tr>
                            <td><img src="<?php echo 'uploads/'.$value['item_image'];?>" class="img-fluid rounded" width="100px" height="100px" alt=""> <span><?php echo $value['item_name'];?></span></td>
                            <td><?php echo number_format($value['item_price']);?><span><span class="pl-1">৳</span></td>

                            <td class="quantity-title text-center">
                                <form action="#" method="post">
                                    <input type="number" class="quan" name="quantity_up" value="<?php echo $value['item_qun'];?>" min="1" max="3" />

                                    <input type="hidden" name="p_name" value="<?php echo $value['item_name'];?>">

                                    <input type="hidden" name="p_image" value="<?php echo $value['item_image'];?>">

                                    <input type="hidden" name="p_price" value="<?php echo $value['item_price'];?>">

                                    <input type="hidden" name="idd" value="<?php echo $value['item_id'];?>">

                                    <input class="btn btn-success" name="submit" type="submit" value="update" />
                                </form>
                            </td>

                            <td><?php echo number_format($value['item_price']*$value['item_qun']);?><span><span class="pl-1">৳</span></td>

                            <td class="trash text-center"><a onclick="javascript: return confirm('Are You Sure!');" class="text-danger text-center" href="?action=remove&id=<?php echo $value['item_id'];?>"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php
                             $total = $total + $value['item_price'] * $value['item_qun'];   
                            }
                        ?>          
                    </tbody>
                </table>
                <div class="clear-fix">
                <a href="index.php" class="btn float-left mb-5 text-white"><i class="fa fa-shopping-cart"></i>Add More Item </a>
                    <div class="float-right">
                        <table class="table tbl-border">
                            <tr>
                                <th>Cart Subtotal :</th>
                                <th><span><?php echo number_format($total);?></span><span class="pl-1">৳</span></th>
                            </tr>
                            <tr>
                                <th>Shipping Charge :</th>
                                <th><span>
                                <?php
                                   if($check->num_rows>5){
                                    $shipping = 0;
                                    echo 'free';
                                   } else{
                                    $shipping = 40;
                                    echo $shipping."<span class='pl-1'>৳</span>";
                                   }
                                ?>
                                </span></th>
                            </tr>
                            <!-- <tr>
                                <th><input type="text" class="dis" placeholder="Have Any Coupon Code ?"></th>
                                <th><button class="btn" type="submit">Apply</button></th>
                            </tr> -->
                            <tr>
                                <th>Grand Total :</th>
                                <th><span><?php
                                    $Grand = $total+$shipping;
                                    echo number_format($Grand);
                                ?></span><span class="pl-1">৳</span></th>
                            </tr>
                            <?php
                                }else{
                                    ?>
                                        <tr>
                                        <a href="index.php" class="btn float-left mb-5 text-white"><i class="fa fa-shopping-cart"></i>Add Item</a>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </table>
                        <?php
                            if(!empty($_SESSION['cart'])){
                                ?>
                                <a class="btn btn-primary f-right" href="payment.php"><i class="fas fa-check-circle"></i>Checkout</a>
                                <?php
                            }
                        ?>  
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <!-- cart section here -->
    <?php
        include 'page_footer.php';
    }
    ?>