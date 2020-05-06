<?php
    session_start();
    include "Flash_data.php";
    include 'Main.php';
    $obj = new Main();

    if(isset($_POST['submit'])){
        if($_POST['pass1'] == $_POST['pass2']){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = md5($_POST['pass1']);
            $mobile = $_POST['mobile'];
            $division = $_POST['division'];
            $district = $_POST['district'];
            $address = addslashes($_POST['address']);
            $status = $obj->customer_insert($name,$email,$pass,$mobile,$division,$district,$address);
            if($status == true){
                Flass_data::insert_msg("Sign Up Successfully!");
                header("location:sign_in.php");
            }else{
                Flass_data::insert_msg("This Email Already Exist!");
                header("location:sign_up.php");
            }
        }else{
            Flass_data::insert_msg("Do Not Match Two Password!");
            header("location:sign_up.php");
        }
    }

















?>