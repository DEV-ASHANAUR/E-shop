<?php
    session_start();
    include "../Flash_data.php";
    include '../Main.php';
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo $id;
        $status = $obj->cus_detete($id);
        if($status == true){
            Flass_data::delete_cus("Your file has been deleted.!");
            header("location:customer.php");
        }
    }













?>