
    <?php
        include 'pay_header.php';
        
        if(!isset($_SESSION['user'])){
            echo "<script>
            window.location='http://localhost/E-shop/sign_in.php';
            </script>";
        }else{
            $user_idd = $_SESSION['user'];
            $check = $obj->check_ship($user_idd);
            $div_data = $obj->show_div();
            $dis_data = $obj->show_dis();
            $user_id = $_SESSION['user'];
            $cus_data = $obj->show_cus_id($user_id);
            if($cus_data->num_rows>0){
                while($row = $cus_data->fetch_object()){
                    $id = $row->id;
                    $name = $row->name;
                    $email = $row->email;
                    $mobile = $row->mobile;
                    $cus_div = $row->division;
                    $cus_dis = $row->district;
                    $division = $row->div_name;
                    $district = $row->dis_name;
                    $address = $row->address;
        
                }
            }    
        
    ?>
<!-- background photo start-->
    
    <div class="bac">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="category text-center">
                        <h2>Payment Method</h2>
                        <span>E-Shop</span><i class="fas fa-arrow-right"></i><span>Payment</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- background photo end-->
    
    <section>
        <div class="container mb-5">
            <div class="feature-box mt-40 mb-30">
                <h2 class="ml-0">Payment Method</h2>
            </div>
            <div class="tab-head text-center">
                <ul class="nav price-nav " id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active d-flex align-items-center" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-money-bill-alt"></i>Cash On Delivery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                            <i class="fas fa-credit-card"></i>Online Payment
                        </a>  
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row" style="margin-top:3rem;">
                            <!-- cash on delivery confirm shipping address start-->
                            <div class="col-md-6 col-sm-12">
                                <span class="p-headeing">Confirm Your Shipping Address</span>
                                <div class="form-box p-4 text-left">
                                    <form method="post" action="cus_up.php">
                                        <div class="form-group">
                                            <label class='text-left' for="username">Full name<span class="text-danger pl-2">*</span></label>
                                            <input type="text" class="form-control text" id="username" name="name" value="<?php if(isset($name)){echo $name;}?>" placeholder="Ex : Ashanur">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email address">Mobile<span class="text-danger pl-2">*</span></label>
                                            <input type="number"  class="form-control" id="Email address" name="mobile" value="<?php if(isset($mobile)){echo $mobile;}?>" placeholder="Ex : 01866936562">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email address">Division<span class="text-danger pl-2">*</span></label>
                                            <select name="division" id="" class="form-control">
                                                <option value="">Select Your Division</option>
                                                <?php
                                                if($div_data->num_rows>0){
                                                    while($row = $div_data->fetch_object()){
                                                        $id = $row->id;
                                                        ?>
                                                        <option <?php if($id == $cus_div){echo 'selected';}?> value="<?php echo $row->id;?>"><?php echo $row->div_name;?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email address">District<span class="text-danger pl-2">*</span></label>
                                            <select name="district" id="" class="form-control">
                                                <option value="">Select Your District</option>
                                                <?php
                                                    if($dis_data->num_rows>0){
                                                        while($row = $dis_data->fetch_object()){
                                                            $dis_id = $row->id;
                                                            ?>
                                                                <option <?php if($dis_id == $cus_dis){echo 'selected';}?> value="<?php echo $row->id;?>"><?php echo $row->dis_name;?></option>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Address">Address*</label>
                                            <input type="text"  class="form-control text" id="Address" name="address" value="<?php if(isset($address)){echo $address;}?>" placeholder="Ex :  House# 123, Street# 123, ABC Road">
                                        </div>
                                        <input type="hidden" name="hid" value="<?php echo $_SESSION['user'];?>">
                                        <button type="submit" name="submit" class="form-control btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                            <!-- cash on delivery confirm shipping address end-->
                            <!-- cash on delivery order seremony start-->
                            <div class="col-md-6 col-sm-12">
                                <span class="p-headeing">Your Card</span>
                                <div class="form-box">
                                    <div class="shop-header">
                                        <span class="btn">Order Summary</span>
                                    </div>
                                    <div class="shop-body">
                                       <form action="order_process.php" method="post">
                                            <table class="table text-right">
                                                <?php
                                                    if(!empty($_SESSION['cart'])){
                                                        $total = 0;
                                                        foreach($_SESSION['cart'] as $key => $value){
                                                            $total = $total + ($value['item_price']*$value['item_qun']);
                                                            ?>
                                                            <input type="hidden" name="quantity[]" value="<?php echo $value['item_qun'];?>" />


                                                            <input type="hidden" name="p_price[]" value="<?php echo $value['item_price'];?>">

                                                            <input type="hidden" name="idd[]" value="<?php echo $value['item_id'];?>">
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                                <tr> 
                                                    <th>cart subtotal</th>
                                                    <th><?php echo number_format($total);?><span class="pl-1">৳</span></th>
                                                </tr>
                                                <tr>
                                                    <th>Shipping charge</th>
                                                    <?php
                                                        if($check->num_rows>5){
                                                            $shipping = '';
                                                        }else{
                                                            $shipping = 40;
                                                        }
                                                    ?>
                                                    <th><?php if(!empty($shipping)){echo $shipping.'<span class="pl-1">৳</span>';
                                                    ?>
                                                    <input type="hidden" name="shipping" value="<?php echo $shipping;?>">
                                                    <?php
                                                    }else{echo 'free';
                                                        ?>
                                                        <input type="hidden" name="shipping" value="free">
                                                        <?php
                                                    };?></th>

                                                    
                                                </tr>
                                                <tr>
                                                    <th><input type="text" class="form-control" name="cup_code" placeholder="Have a Coupon Code?"></th>
                                                    <th><button name="cupon" type="submit" class="btn btn-modifi">Apply</button></th>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <th>
                                                    <?php
                                                        if(!empty($shipping)){
                                                           $grand = $total+$shipping;
                                                           //check cupon code
                                                           if(isset($_GET['cup']) && $_GET['cup'] == 1){
                                                            $cupon = $obj->check_cupon();
                                                            if($cupon->num_rows>0){
                                                                while($row = $cupon->fetch_object()){
                                                                $data_discount = $row->cup_discount;
                                                                
                                                                //echo '(-'.$remove.") ";   
                                                                }
                                                            }
                                                            $dispoint = $data_discount/100;
                                                            $remove = $dispoint * $grand;
                                                            echo '(-'.$remove.") ";
                                                            echo 'Payable '. number_format($grand - $remove);?><span class="pl-1">৳</span>
                                                            <input type="hidden" name="gtotal" value="<?php echo $grand - $remove;?>">
                                                            <?php
                                                            //if no cupon then
                                                           }else{

                                                            ?>
                                                            <?php echo number_format($grand);?><span class="pl-1">৳</span>
                                                            <input type="hidden" name="gtotal" value="<?php echo $grand;?>">
                                                            <?php
                                                           }
                                                        }else{
                                                            //check cupon code
                                                            if(isset($_GET['cup']) && $_GET['cup'] == 1){
                                                            $cupon = $obj->check_cupon();
                                                            if($cupon->num_rows>0){
                                                                while($row = $cupon->fetch_object()){
                                                                    $data_discount = $row->cup_discount;
                                                                  //echo '(-'.$remove.") ";
                                                                }
                                                            }
                                                            $dispoint = $data_discount/100;
                                                            $remove = $dispoint * $total;
                                                            echo '(-'.$remove.") ";
                                                            ?>
                                                            <?php echo 'Payable '. number_format($total-$remove);?><span class="pl-1">৳</span>
                                                            <input type="hidden" name="gtotal" value="<?php echo $total-$remove;?>">
                                                            <?php
                                                            //if no code
                                                           }else{
                                                           ?>
                                                            <?php echo number_format($total);?><span class="pl-1">৳</span>
                                                            <input type="hidden" name="gtotal" value="<?php echo $total;?>">
                                                            <?php
                                                           }
                                                        }
                                                    ?>
                                                    <?php 
                                                        $generate = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                                                        $order_id = substr(str_shuffle($generate),0,6);
                                                    ?>
                                                    <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user'];?>">
                                                    </th>
                                                </tr>
                                            </table>
                                        
                                    </div>
                                    <div class="shop-footer">
                                        <button type="submit" name="order" class="btn">Place Order</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- cash on delivery order seremony end-->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row mb-4 bg" style="margin-top:3rem;">
                            <!-- online payment confirm start-->
                            <div class="col-md-4 col-sm-12 text-left">
                                <span class="p-headeing">Confirm Your Shipping Address</span>
                                <div class="form-box p-4">
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label for="username">Full name<span class="text-danger pl-2">*</span></label>
                                            <input type="text" class="form-control text" id="username" name="username" placeholder="jamesJalil">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email address">Mobile<span class="text-danger pl-2">*</span></label>
                                            <input type="number"  class="form-control" id="Email address" name="username" placeholder="Ex:01866936562">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email address">Division<span class="text-danger pl-2">*</span></label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Select Your Division</option>
                                                <option value="">Dhaka</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email address">District<span class="text-danger pl-2">*</span></label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Select Your District</option>
                                                <option value="">Dhaka</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Address">Address*</label>
                                            <input type="text"  class="form-control text" id="Address" name="password" placeholder="Ex: House# 123, Street# 123, ABC Road">
                                        </div>
                                        <button type="submit" class="form-control btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                            <!-- online payment confirm end-->
                            <!-- online payment start -->
                            <div class="col-md-4 col-sm-12 text-center">
                                <span class="p-headeing">Payment</span>
                                <div class="checkout_form">
                                    <div class="card_number catt" id="card-container">
                                        <input type="text" class="input" id="card" placeholder="0000 0000 0000 0000"> 
                                        <div id="logo"></div>
                                    </div>
                                    <div class="card_grp">   
                                      <div class="expiry_date catt">
                                        <input type="text" class="expiry_input" data-mask="00"  placeholder="00">
                                        <input type="text" class="expiry_input" data-mask="00" placeholder="00">
                                      </div>
                                      <div class="cvc catt">
                                        <input type="text" class="cvc_input" data-mask="000" placeholder="000">
                                        <div class="cvc_img">
                                            ?
                                           <div class="img">
                                             <img src="https://i.imgur.com/2ameC0C.png" alt="">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="btn">
                                      pay
                                    </div>
                                </div>
                            </div>
                            <!-- online payment end -->
                            <!-- online Order Summary start -->
                            <div class="col-md-4 col-sm-12">
                                <span class="p-headeing">Your Card</span>
                                <div class="form-box">
                                    <div class="shop-header">
                                        <span class="btn">Order Summary</span>
                                    </div>
                                    <div class="shop-body">
                                        <table class="table">
                                            <tr>
                                                <th>cart subtotal</th>
                                                <th>20000<span class="pl-1">৳</span></th>
                                            </tr>
                                            <tr>
                                                <th>Shipping charge</th>
                                                <th>20<span class="pl-1">৳</span></th>
                                            </tr>
                                            <tr>
                                                <th><input type="text" class="form-control cupon-input" name="" placeholder="Have a Coupon Code?"></th>
                                                <th><button type="submit" class="btn btn-modifi2">Apply</button></th>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <th>20,020<span class="pl-1">৳</span></th>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="shop-footer">
                                        <button class="btn">Place Order</button>
                                    </div>
                                </div>
                            </div>
                            <!-- online Order Summary end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
        include 'page_footer.php';
    }
    ?>