<?php
    session_start();
    include "../Flash_data.php";
    include '../Main.php';
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $status = $obj->order_delete($id);
        if($status == true){
            Flass_data::order_cancle("ORDER CANCEL SUCCESSFULLY!");
            header("location:order_remain.php");
        }
    }














?>