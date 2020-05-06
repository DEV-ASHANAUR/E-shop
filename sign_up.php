        <?php
            include 'page_header.php';
            $div_data = $obj->show_div();
            

        ?>
        <?php
            if(isset($_SESSION['msg']['in'])){
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
        
        <section class="login-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-5 col-md-8 col-sm-9 col-9 mx-auto mt-5 mb-5">
                        <div class=" sign-up-area text-center mb-20 ">
                            <span>Join E-Shop</span>
                            <h2>Sign in to E-Shop</h2>
                        </div>
                        <div class="form-box p-4">
                            <form action="cus_insert.php" method="post">
                                <div class="form-group">
                                    <label for="name">Full name<span class="text-danger pl-2">*</span></label>
                                    <input type="text" required="" name="name" class="form-control text" id="name" placeholder="jamesJalil">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email<span class="text-danger pl-2">*</span></label>
                                    <input type="email" name="email" required="" class="form-control" id="email" placeholder="Ex:jhon@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="pass1">Password<span class="text-danger pl-2">*</span></label>
                                    <input type="password" name="pass1" required="" class="form-control" id="pass1" placeholder="Ex:*********">
                                </div>
                                <div class="form-group">
                                    <label for="pass2">Re-Password<span class="text-danger pl-2">*</span></label>
                                    <input type="password" name="pass2" required="" class="form-control" id="pass2" placeholder="Ex:*********">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile<span class="text-danger pl-2">*</span></label>
                                    <input type="number" required="" name="mobile" class="form-control" id="mobile" placeholder="Ex : 01866936562">
                                </div>
                                <div class="form-group">
                                    <label for="Email address">Division<span class="text-danger pl-2">*</span></label>
                                    <select name="division" id="division" required="" class="form-control">
                                        <option value="">Select Your Division</option>
                                        <?php
                                            if($div_data->num_rows>0){
                                                while($row = $div_data->fetch_object()){
                                                    ?>
                                                        <option value="<?php echo $row->id;?>"><?php echo $row->div_name;?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Email address">District<span class="text-danger pl-2">*</span></label>
                                    <select name="district" required="" id="district" class="form-control">
                                        <option value="">Select Your Division first</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Address">Address<span class="text-danger pl-2">*</span></label>
                                    <input type="text" required="" name="address" class="form-control text" id="Address" name="password" placeholder="Ex: House# 123, Street# 123, ABC Road">
                                </div>
                                <button type="submit" name="submit" class="form-control btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--login page stop-->
        <div class="last-footer text-center">
            <span>&copy;2019 All Rights Reserve By E-Shop</span>
        </div>
		<!-- JS here -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <!-- <script src="js/depanded.js"></script> -->
        <script>
            $('#division').on('change',function(){
                var divisiontName = $(this).val();
                //alert(divisiontName);
                if(divisiontName){
                    $.ajax({
                        type:'POST',
                        url:'fetch.php',
                        data:'division='+divisiontName,
                    
                        success:function(html){
                            $('#district').html(html);
                            console.log(html);
                        }
                    });
                }else{
                    $('#district').html('<option value="">Select Division first</option>');
                }
            });
        </script>
    </body>
</html>