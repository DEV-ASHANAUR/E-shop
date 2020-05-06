<?php
    session_start();
    include "../Flash_data.php";
    include '../Main.php';
    $obj = new Main();

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $img = $_POST['picture'];
        $discount = $_POST['discount'];
        $status = $_POST['status'];
        
    
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
                            $status = $obj->offer_add($title,$filenamenew,$discount,$status);
                            Flass_data::offer_sus('Successfully updated!');
                            header("location:add_offer.php");
                        }
                        // move_uploaded_file($filetmp,$filedestination);
                        // header("location:index.php?successfull");
                    }else{
                        Flass_data::offer_error("Your Photo is Too Big!");
                        header("location:add_offer.php?");
                    }
                }else{
                    Flass_data::offer_error("There was an error uploading your file!");
                    header("location:add_offer.php");
                }
            }else{
                Flass_data::offer_error("You can't upload files of this type!");
                header("location:add_offer.php");
            }
        }else{
            $obj->offer_add($title,$img,$discount,$status);
            Flass_data::offer_sus('Successfully updated!');
            header("location:add_offer.php");
        }
 
    }













?>