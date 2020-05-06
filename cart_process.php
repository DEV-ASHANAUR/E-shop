<?php
    session_start();
    include "Flash_data.php";
    include 'Main.php';
    $obj = new Main();
    if(isset($_SESSION['user'])){
        if(isset($_POST['addcart'])){
            if(isset($_SESSION['cart'])){
                $item_array_id = array_column($_SESSION['cart'],'item_id');
                if(!in_array($_GET['id'],$item_array_id)){
                    $count = count($_SESSION['cart']);
                    $item_array = array(
                        'item_id' => $_GET['id'],
                        'item_name' => $_POST['hidden_name'],
                        'item_image' => $_POST['image'],
                        'item_price' => $_POST['hidden_price'],
                        'item_qun' => $_POST['quantity']
                    );
                    $_SESSION['cart'][$count] = $item_array;
                    header("location:cart.php");
                }else{
                    header("location:cart.php");
                }
            }else{
                $item_array = array(
                    'item_id' => $_GET['id'],
                    'item_name' => $_POST['hidden_name'],
                    'item_image' => $_POST['image'],
                    'item_price' => $_POST['hidden_price'],
                    'item_qun' => $_POST['quantity']
                );
                $_SESSION['cart'][0] = $item_array;
                header("location:cart.php");
            }
        }
        // for wishlist
        if(isset($_POST['wishlist'])){
            $user_id = $_POST['w_userid'];
            $product_id = $_POST['w_product_id'];
            $data = $obj->searchwishlist($user_id,$product_id);
            if($data->num_rows>0){
                Flass_data::wishlist_overflow('Item already have Please Check!');
                header('location:wishlist.php');
            }else{
                $status = $obj->addwishlist($user_id,$product_id);
                if($status == true){
                    Flass_data::wishlist_add('Item Added Successfully!');
                    header('location:wishlist.php');
                } 
            }
        }
    }else{
        header("location:sign_in.php");
    }
    
















?>