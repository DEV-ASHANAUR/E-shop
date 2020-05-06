<?php
    session_start();
    include "Flash_data.php";
    include 'Main.php';
    $obj = new Main();

    if(isset($_POST['order'])){
        $order_id = $_POST['order_id'];
        $user_id = $_POST['user_id'];
        $product_id = $_POST['idd'];
        $product_price = $_POST['p_price'];
        $product_quantity = $_POST['quantity'];
        $shipping = $_POST['shipping'];
        $total = $_POST['gtotal'];
        $r = count($product_id);
    

        for($i = 0; $i<$r; $i++){
            $order = $obj->order($order_id,$user_id,$product_id[$i],$product_price[$i],$product_quantity[$i],$shipping,$total);
            if($order == true){
                if(isset($_SESSION['user'])){
                    unset($_SESSION['cart']);
                    Flass_data::order_sus("ORDER COMPLETE OREDER ID :-#".$order_id);
                    header("location:index.php");
                }
            }
        }

    }
    //genaret cupon
    if(isset($_POST['cupon'])){
        $code = $_POST['cup_code'];
        $cupon = $obj->check_cupon();
        if($cupon->num_rows>0){
            while($row = $cupon->fetch_object()){
               $main_code = $row->cup_code;
               $exp = $row->cup_expired;
               $status = $row->cup_status;
            }
        }
        if($status == 1){
            if($code === $main_code){
                $today = strtotime(date('Y/m/d'));
                $expday = strtotime($exp);
                if($today>$expday){
                    //echo "Date Expired";
                    Flass_data::cupon_expired("This Cupon Date is Expired");
                    header("location:payment.php");
                }else{
                    // echo "Not Expired";
                    header("location:payment.php?cup=1");
                }
            }else{
                Flass_data::cupon_not_match("Don not Match! Try Again!");
                header("location:payment.php");        
            }
        }else{
            Flass_data::cupon_not_found("Do Not found!");
            header("location:payment.php");
        }

    }















?>