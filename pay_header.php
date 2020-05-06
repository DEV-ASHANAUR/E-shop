<?php
    session_start();
    include "Flash_data.php";
    include 'Main.php';
    $obj = new Main();
    $cat_data = $obj->show_cat();
    

?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Site Title Here</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">

    <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/default.css">
    <link href="css/jquery.nice-number.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/sweetalert2.js"></script>
</head>

<body>
    <!--top bar-->
    <div class="top-bar p-0">
        <div class="container-fluid topp">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 d-none d-sm-none top-left-header d-md-none d-lg-block">
                    <h4>Electronics Online Store</h4>
                </div>
                <div
                    class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-12 d-flex justify-content-md-center justify-content-sm-center justify-content-xl-end justify-content-lg-end col-sm-8">
                    <div class="top-right-header">
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li><a href="#">about</a></li>
                            <li><a href="#">blog</a></li>
                            <li><a href="#">contact</a></li>
                            <li><a href="#">help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--header area start-->
    <header class="header-area sticky-top">
        <div class="container-fluid">
            <div class="row m-0">
                <div class="col-lg-3 col-md-6 col-sm-4 col-xs-6 d-flex">
                    <div class="logo">
                        <a href="index.php"><img src="img/logo.png" alt=""> <span>E-Shop</span></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 d-none d-md-block text-right">
                    <div class="main-box">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul class="">
                                    <li>
                                        <a href="#"><i class="fa fa-bars"></i>
                                            shop by category
                                        </a>
                                        <ul class="sub-menu text-left">
                                        <?php 
                                            if($cat_data->num_rows>0){
                                                while($row = $cat_data->fetch_object()){
                                                    ?>
                                                    <li><a href="#"><?php echo $row->cat_name;?></a></li>
                                                    <?php
                                                 }
                                              }
                                          ?>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- <div class="mobile-menu"></div> -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-4 col-xs-12">
                    <div class="search-box">
                        <form action="search.php" method="post" class="form-inline">
                            <div class="input-group" style="width: 100%">
                                <input type="text" required="" name="search" style="background-color: #fff;" class="form-control input-item"
                                    aria-label="Dollar amount (with dot and two decimal places)">
                                <div class="input-group-append">
                                    <button type="submit" name="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-4 d-md-block icon" style="padding: 0; margin: 0;">
                    <div class="last-menu">
                        <ul>
                            <li><a data-toggle="tooltip" data-placement="top" title="My WishList" href="wishlist.php"><i class="fa fa-heartbeat"></i>
                            <?php
                                    if(isset($_SESSION['user'])){
                                        ?>
                                        <sup><span class="badge badge-warning">
                                        <?php
                                        $user_id = $_SESSION['user'];
                                        $data = $obj->mywishlist($user_id);
                                        echo $count = $data->num_rows;
                                        ?>
                                        </span></sup>
                                        <?php
                                    }
                                ?>
                                </a></li>
                            </a></li>
                            <li><a data-toggle="tooltip" data-placement="right" title="My Cart" href="cart.php"><i class="fa fa-shopping-cart"></i><sup><span class="badge badge-warning"><?php 
                                    if(isset($_SESSION['cart'])){
                                        echo count($_SESSION['cart']);
                                    }
                                ?></span></sup></a></li>
                                            
                            <?php
                                if($obj->index()==true){
                                ?>
                                    <li><a data-toggle="tooltip" data-placement="top" title="Log out" href="logout.php"><i class="fas fa-power-off"></i></a></li>
                                <?php
                                }else{
                                    ?>
                                    <li><a data-toggle="tooltip" data-placement="right" title="Log In" href="sign_in.php"><i class="fa fa-user"></i></a></li>
                                <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
        if(isset($_SESSION['msg']['cus_up_sus'])){
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
        if(isset($_SESSION['msg']['cupon_not_match'])){
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
    <?php
        if(isset($_SESSION['msg']['cupon_exp'])){
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
    <?php
        if(isset($_SESSION['msg']['cupon_not_found'])){
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