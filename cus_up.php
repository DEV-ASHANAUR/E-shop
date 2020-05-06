<?php
    session_start();
    include "Flash_data.php";
    include 'Main.php';
    $obj = new Main();

    if(isset($_POST['submit'])){
        $id = $_POST['hid'];
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $division = $_POST['division'];
        $district = $_POST['district'];
        $address = addslashes($_POST['address']);
        $status = $obj->customer_update($id,$name,$mobile,$division,$district,$address);
        if($status == true){
            Flass_data::cus_up("For Confirmed Your address! please Click Place Order Button!");
            header("location:payment.php");
        }else{
            Flass_data::cus_up_error("Something Went Rong!");
            header("location:payment.php");
        }
        
    }