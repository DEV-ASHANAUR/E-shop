<?php
    include 'page_header.php';
    if(!isset($_SESSION['user'])){
        
        echo "<script>
                window.location='http://localhost/E-shop/sign_in.php';
            </script>";
        
    }else{
    $user_id = $_SESSION['user'];
    //fetch all list data
    $data = $obj->mywishlist($user_id);
    ?>
    <!-- //item remove message -->
    <?php
        if(isset($_SESSION['msg']['wish_item_rem'])){
            ?>
                <script type="text/javascript">
                    Swal.fire(
                        'Removed!',
                        '<?php echo Flass_data::show_error();?>',
                        'success'
                        );
                </script>
            <?php
        }
    ?>
    <!-- //item add message -->
    <?php
        if(isset($_SESSION['msg']['wish_add'])){
            ?>
                <script type="text/javascript">
                    Swal.fire(
                        'Added!',
                        '<?php echo Flass_data::show_error();?>',
                        'success'
                        );
                </script>
            <?php
        }
    ?>
    <!-- overflow message -->
    <?php
        if(isset($_SESSION['msg']['wish_alreaady'])){
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
    <!-- background photo start-->
    <div class="bac">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="category text-center">
                            <h2>My Wishlist</h2>
                            <span>E-Shop</span><i class="fas fa-arrow-right"></i><span>Wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="feature-box mt-40 mb-30">
                <h2 class="g_font">My Wishlist</h2>
            </div>
            <?php 
                if($data->num_rows>0){
                    $si = 1;
            ?>
            <div class="mt-3 ml-3">
                <table class="table border wishlist">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th class='text-center'>Quich View</th>
                            <th class='text-center'>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = $data->fetch_object()){

                        ?>
                        <tr>
                            <td><?php echo $si;?></td>
                            <td><?php echo $row->product_name;?></td>
                            <td>
                                <img src="<?php echo 'uploads/'.$row->product_image;?>" class="img-fluid rounded" width="50px" height="50px" alt="">
                            </td>
                            <td><?php echo number_format($row->product_price,2);?><span class="pl-1">৳</span></td>

                            <td class="quick text-center"><a title="View" class="text-danger text-center" href="details.php?wish=yes&id=<?php echo $row->id;?>"><i class="fas fa-eye"></i></a></td>

                            <td class="trash text-center"><a title="Remove" onclick="javascript: return confirm('Are You Sure!');" class="text-danger text-center" href="remove_wish_item.php?id=<?php echo $row->wishlist_id;?>"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                            <?php $si++;}?>
                    </tbody>
                </table>
            </div>
            <div class="Additem">
               <a href="index.php" class="btn btn-primary m-auto">Add More Item</a>
            </div>
            <?php
   
                }else{   
            ?>
            <div class="Additem">
                <span>Your Wishlist Is Empty</span>
               <a href="index.php" class="btn btn-primary m-auto">Add Item</a>
            </div>
            <?php }?>
        </div>
        <!-- background photo end-->
        <?php
          include 'page_footer.php';
        } 
        ?>