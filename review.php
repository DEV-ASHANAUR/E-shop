<?php
    session_start();
    include "Flash_data.php";
    include 'Main.php';
    $obj = new Main();

    if(isset($_POST['submit'])){
        $user_id = $_POST['uid'];
        $pro_id = $_POST['pro_id'];
        $review = addslashes($_POST['review']);

        $status = $obj->review($user_id,$pro_id,$review);
        if($status == true){
            Flass_data::review("For your Review!");
            header("location:details.php?id=".$pro_id);
            //echo "yes";
        }else{
            echo 'Something went Rong';
        }
    }












?>