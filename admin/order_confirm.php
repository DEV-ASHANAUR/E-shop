<?php
    session_start();
    include "../Flash_data.php";
    include '../Main.php';
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $status = $obj->order_confirmed($id);
        if($status == true){
            Flass_data::order_confirmm("ORDER CONFIRMED SUCCESSFULLY!");
            header("location:order_complete.php");
        }
    }














?>