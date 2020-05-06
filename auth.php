<?php
    session_start();
    include "Flash_data.php";
    include 'Main.php';
    $obj = new Main();

    if(isset($_POST['submit'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $p_id = $_POST['p_id'];
        $data = $obj->retrive($user);
        if($data->num_rows>0){
            while($row = $data->fetch_object()){
                $id = $row->id;
                $user_name = $row->name;
                $password = $row->pass;
            }
        }else{
            Flass_data::pass_error("Email Not Fond!");
            header("location:sign_in.php");
        }
        $pass_in = md5($pass);
        if($pass_in === $password){
            $obj->set_session($id);
        }else{
            Flass_data::pass_error("Username Or Password is Incorrect!");
            header("location:sign_in.php");
            
        }
        if($obj->index() == true){

            if(!empty($p_id)){
                Flass_data::pass_suss($user_name." Continue Shopping");
                header("location:details.php?id=".$p_id); 
            }else{
            Flass_data::pass_suss($user_name." Continue Shopping");
            header("location:index.php");
            }
        }
    }






?>