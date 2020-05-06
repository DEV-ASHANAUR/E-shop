<?php 
  session_start();
  include "../Flash_data.php";
  include '../Main.php';
  $obj = new Main();
  $order_not = $obj->show_order();

?>

<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/sweetalert2.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  <script src="assets/js/sweetalert2.js"></script>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <span class="badge headerBadge1">
                6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">John
                      Deo</span>
                    <span class="time messege-text">Please check your mail !!</span>
                    <span class="time">2 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Request for leave
                      application</span>
                    <span class="time">5 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                      Ryan</span> <span class="time messege-text">Your payment invoice is
                      generated.</span> <span class="time">12 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                      Smith</span> <span class="time messege-text">hii John, I have upload
                      doc
                      related to task.</span> <span class="time">30
                      Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                      Joshi</span> <span class="time messege-text">Please do as specify.
                      Let me
                      know if you have any query.</span> <span class="time">1
                      Days Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Client Requirements</span>
                    <span class="time">2 Days Ago</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          
          <li class="dropdown dropdown-list-toggle">
            <a href="order_remain.php" class="nav-link nav-link-lg"><i data-feather="bell" class="bell"></i>
            <?php
                if($order_not->num_rows>0){
                  $count = $order_not->num_rows;
                  
                  ?> 
              <span class="badge" style="position: absolute;top: 4px;right: 0px;font-weight: 300;padding: 3px 6px;background: #6677ef;border-radius: 10px;">
                  <?php echo $count;?>
            </span> 
            <?php
                }
              ?>
            </a>
          </li>
          
          
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>
              <!-- <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a>  -->
              <!-- <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a>  -->
              <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">E-shop</span>
            </a>
          </div>

          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class='dropdown <?php if($page == "index")
            {echo "active";}
              ?>'>
              <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class='dropdown <?php if($page == "customer")
            {echo "active";}
              ?>'>
              <a href="customer.php" class="nav-link"><i data-feather="user"></i><span>Customer</span></a>
            </li>
            <li class='dropdown <?php if($page == "catagory")
            {echo "active";}
              ?>'>
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="menu"></i><span>Category</span></a>
              <ul class="dropdown-menu">
                <li class='<?php if($subpage == "catagory_add")
            {echo "active";}
              ?>'><a class="nav-link" href="add_catagory.php">Category Add</a></li>
                <li class='<?php if($subpage == "catagory_list")
            {echo "active";}
              ?>'><a class="nav-link" href="list_catagory.php">Category list</a></li>
              </ul>
            </li>

            <li class='dropdown <?php if($page == "product")
            {echo "active";}
              ?>'>
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="shopping-cart"></i><span>Product</span></a>
              <ul class="dropdown-menu">
                <li class='<?php if($subpage == "product_add")
            {echo "active";}
              ?>'><a class="nav-link" href="add_product.php">Product Add</a></li>
                <li class='<?php if($subpage == "product_list")
            {echo "active";}
              ?>'><a class="nav-link" href="list_product.php">Product list</a></li>
              </ul>
            </li>

            <li class='dropdown <?php if($page == "order")
            {echo "active";}
              ?>'>
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="book"></i><span>Order</span></a>
              <ul class="dropdown-menu">
                <li class='<?php if($subpage == "order_ramain")
            {echo "active";}
              ?>'><a class="nav-link" href="order_remain.php">Order remain</a></li>
                <li class='<?php if($subpage == "order_complete")
            {echo "active";}
              ?>'><a class="nav-link" href="order_complete.php">Order complete</a></li>
              </ul>
            </li>

            <li class='dropdown <?php if($page == "offer")
            {echo "active";}
              ?>'>
              <a href="add_offer.php" class="nav-link"><i data-feather="gift"></i><span>Mega Offer</span></a>
            </li>

            <li class='dropdown <?php if($page == "coupon")
            {echo "active";}
              ?>'>
              <a href="coupon.php" class="nav-link"><i data-feather="gift"></i><span>Coupon</span></a>
            </li>

            
          </ul>
        </aside>
      </div>