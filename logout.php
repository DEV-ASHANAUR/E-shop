<?php
    session_start();
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
        header("location:index.php");
    }




?>