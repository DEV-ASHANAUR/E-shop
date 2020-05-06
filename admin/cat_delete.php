<?php
    session_start();
    include "../Flash_data.php";
    include '../Main.php';
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo $id;
        $status = $obj->cat_detete($id);
        if($status == true){
            Flass_data::delete_cat("Catagory has been deleted.!");
            header("location:list_catagory.php");
        }
    }


?>