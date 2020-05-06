<?php
    session_start();
    include "../Flash_data.php";
    include '../Main.php';
    $obj = new Main();

    if(isset($_POST['submit'])){
        $id = $_POST['hid'];
        $icon = $_POST['icon'];
        $name = $_POST['name'];
        $status = $obj->cat_up($id,$icon,$name);
        if($status == true){
            Flass_data::update_cat("Updated Successfully!");
            header("location:edit_cat.php?id=".$id);
        }
    }


?>