<?php
    session_start();
    include "../Flash_data.php";
    include '../Main.php';
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $status = $obj->order_unshift($id);
        if($status == true){
            Flass_data::order_unshiftt("ORDER UNSHIFT SUCCESSFULLY!");
            header("location:order_complete.php");
        }
    }














?>