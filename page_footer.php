        <!--payment area start-->
        <section class="payment-area pb-40 pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <div class="payment-method mt-20">
                            <h3>PAYMENT METHOD</h3>
                            <div class="payment-1">
                                <span><img src="img/payment/Screenshot_8.png" alt=""></span>
                                <span><img src="img/payment/Screenshot_4.png" alt=""></span>
                            </div>
                            <div class="payment-2 mt-20">
                                <span><img src="img/payment/Screenshot_2.png" alt=""></span>
                                <span><img src="img/payment/rocket.jpg" alt=""></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <div class="follow-us mt-20">
                            <h3>FOLLOW US OUR LINK</h3>
                            <a class="follow-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="follow-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="follow-3" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="follow-4" href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <div class="varified-us mt-20">
                            <h3>SIGN UP FOR NEWSLETTER:</h3>
                            <form action="#">
                                <input type="email" class="form-control" placeholder="example@gmail.com">
                                <input type="button" class="btn mt-2" value="JOIN US">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--payment area stop-->

    <!--footer area start -->
        <footer class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-1 pt-30 pb-30">
                            <h3>Company</h3>
                            <ul>
                                <li><a href="#">home</a></li>
                                <li><a href="#">product</a></li>
                                <li><a href="#">customers</a></li>
                                <li><a href="#">pricing</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-1 pt-30 pb-30">
                            <h3>Products</h3>
                            <ul>
                                <li><a href="#">company</a></li>
                                <li><a href="#">jobs</a></li>
                                <li><a href="#">press</a></li>
                                <li><a href="#">blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-3 pt-30 pb-30">
                            <h3>Address</h3>
                            <ul>
                                <li>Eshopcompany@gmail.com</li>
                                <li>Mirpur 10, Spring 200,Dhaka,Bangladesh</li>
                                <li>Mobile:+8801781657887</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-4 pt-30 pb-30">
                            <h3>Instagram</h3>
                            <div class="insta-pic">
                                <a href="#"><img src="img/instagram/download.jpg" alt=""></a>
                                <a href="#"><img src="img/instagram/MbKXuF2uEgsWHX5c6MkCvY-320-80.jpg" alt=""></a>
                                <a href="#"><img src="img/instagram/stock-photo-159533631-1500x1000.jpg" alt=""></a>
                                <a href="#"><img src="img/instagram/Tui-hotel.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="last-footer text-center">
            <span>&copy;2019 All Rights Reserve By E-Shop</span>
        </div>
        <!--footer area stop-->
        <!-- JS here -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.ez-plus.js"></script>
        <script src="js/wow.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js">
        </script>
        <script src="js/spineer.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <script src="js/card-validator.js"></script>
        <script>         
            $(document).ready(function(){
                setTimeout(() => {
                    $('#popupMain').css('display','block');
                }, 5000);
                $('#submit_pop').click(function(){
                    $('#popupMain').css('display','none');
                    <?php
                        $_SESSION['popup'] = "ok";
                    ?>
                });
            });     
        </script>
        <script src="js/main.js"></script>
        
    </body>
</html>