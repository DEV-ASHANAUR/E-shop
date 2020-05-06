<?php
    session_start();
    include "../Flash_data.php";
    include '../Main.php';
    $obj = new Main();
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $discount = $_POST['discount'];
        $code = $_POST['code'];
        $expired = $_POST['expired'];
        $status = $_POST['status'];

        $obj->update_coupon($title,$discount,$code,$expired,$status);
        Flass_data::coupon_sus('Successfully updated!');
        header("location:coupon.php");
    }

?>