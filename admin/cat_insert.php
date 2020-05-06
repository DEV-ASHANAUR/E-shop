<?php
    session_start();
    include "../Flash_data.php";
    include '../Main.php';
    $obj = new Main();

    if(isset($_POST['submit'])){
        $icon = $_POST['icon'];
        $name = $_POST['name'];
        $status = $obj->cat_insert($icon,$name);
        if($status == true){
            Flass_data::insert_cat("Added Successfully!");
            header("location:add_catagory.php");
        }
    }











?>