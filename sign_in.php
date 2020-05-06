    <?php
        include 'page_header.php'; 
          
    ?>
      <!--login page start-->
       <section class="login-area">
            <div class="container">
                <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-8 col-sm-9 col-9 mx-auto mt-5 mb-5">
                            <div class=" sign-area text-center mb-20 mt-20">
                                <h2>Sign in to E-Shop</h2>
                                <?php
                                    if(isset($_SESSION['msg']['in'])){
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
                                <?php
                                    if(isset($_SESSION['msg']['pass_erro'])){
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
                            </div>
                            <div class="card p-4">
                                <form method="post" action="auth.php">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="email" required="" class="form-control" id="username" name="username" placeholder="jhon@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" required="" class="form-control" id="password" name="password" placeholder="********">
                                    </div>
                                    <div class="form-group form-check">
                                        <!-- <input type="checkbox"  class="form-check-input" id="rem" name="rem">
                                        <label class="form-check-label" for="rem">Remember me for 30 days!</label> -->
                                        <?php
                                            if(isset($_GET['id'])){
                                                $id = $_GET['id'];
                                                ?>
                                                    <input type="hidden" name="p_id" value="<?php echo $id;?>">
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <button type="submit" name="submit" class="form-control btn btn-primary">Login</button>
                                </form>
                            </div>
                            <div class="login-footer card p-3 mt-4 text-center">
                                <p>Now to E-Shop? <a href="sign_up.php">Create an account</a> </p>
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
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.nice-number.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
        <script src="js/main.js"></script>
        <script>
    </script>
    </body>
</html>