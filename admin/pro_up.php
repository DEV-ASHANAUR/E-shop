<?php
    session_start();
    include "../Flash_data.php";
    include '../Main.php';
    $obj = new Main();
    
    if(isset($_POST['submit'])){
        $id = $_POST['hid'];
        $name = $_POST['name'];
        $img = $_POST['picture'];
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
                            if(isset($img)){
                                unlink('../uploads/'.$img);
                            }
                            $status = $obj->pro_update($id,$name,$filenamenew,$catagory,$brand,$price,$dis,$stock,$section,$condition,$details);
                            Flass_data::update_pro('Successfully updated!');
                            header("location:edit_product.php?id=".$id);
                        }
                        // move_uploaded_file($filetmp,$filedestination);
                        // header("location:index.php?successfull");
                    }else{
                        Flass_data::update_error("Your Photo is Too Big!");
                        header("location:edit_product.php?id=".$id);
                    }
                }else{
                    Flass_data::update_error("There was an error uploading your file!");
                    header("location:edit_product.php?id=".$id);
                }
            }else{
                Flass_data::update_error("You can't upload files of this type!");
                header("location:edit_product.php?id=".$id);
            }
        }else{
            $obj->pro_update($id,$name,$img,$catagory,$brand,$price,$dis,$stock,$section,$condition,$details);
            Flass_data::update_pro('Successfully updated!');
            header("location:edit_product.php?id=".$id);
        }
 
    }




?>