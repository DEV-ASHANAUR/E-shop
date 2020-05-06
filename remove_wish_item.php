<?php
    session_start();
    include 'Main.php';
    include "Flash_data.php";
    $obj = new Main();
    //get item id
    if(isset($_GET['id'])){
        echo $wish_id = $_GET['id'];
        $status = $obj->remove_wish_item($wish_id);
        if($status == true){
            Flass_data::wish_item_remove("Item Remove Successfully!");
            header('location:wishlist.php');
        }
    }








?>