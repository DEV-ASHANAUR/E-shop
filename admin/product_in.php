<?php
    session_start();
    include "../Flash_data.php";
    include '../Main.php';
    $obj = new Main();

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $catagory = $_POST['catagory'];
        $condition = $_POST['condition'];
        $section = $_POST['section'];
        $brand = $_POST['brand'];
        $price= $_POST['price'];
        $dis = $_POST['dis'];
        $stock = $_POST['stock'];
        $details = addslashes($_POST['details']);
        
        if(!empty($_FILES['file']["name"])){
            $file = $_FILES['file'];
            //  echo "<pre>";
            //  print_r($file);
            // echo "</pre>";
            $filename = $_FILES["file"]["name"];
            $filetmp = $_FILES["file"]["tmp_name"];
            $filetype = $_FILES["file"]["type"];
            $filesize = $_FILES["file"]["size"];
            $fileerror = $_FILES["file"]["error"];

            $fileext = explode('.', $filename);
            //print_r($fileext);
            $fileactualext = strtolower(end($fileext));
            //print_r($fileactualext);
            $allowed = array('jpg', 'jpeg','png');
            if(in_array($fileactualext,$allowed)){
                if($fileerror === 0){
                    if($filesize < 10000000){
                        $filenamenew = uniqid('',true).".".$fileactualext;
                        $filedestination = "../uploads/".$filenamenew;
                        if(move_uploaded_file($filetmp,$filedestination)){
                            $status = $obj->insert_product($name,$filenamenew,$catagory,$brand,$price,$dis,$stock,$section,$condition,$details);
                            Flass_data::insert_pro('Successfully Added!');
                            header("location:add_product.php");
                        }
                        // move_uploaded_file($filetmp,$filedestination);
                        // header("location:index.php?successfull");
                    }else{
                        Flass_data::insert_pro_error("Your Photo is Too Big!");
                        header("location:add_product.php");
                    }
                }else{
                    Flass_data::insert_pro_error("There was an error uploading your file!");
                    header("location:add_product.php");
                }
            }else{
                Flass_data::insert_pro_error("You can't upload files of this type!");
                header("location:add_product.php");
            }
        }else{
            
            Flass_data::insert_pro_error('Please Select an Image!');
            header("location:add_product.php");
        }
 
    }


?>