<?php
    session_start();
    include "../Flash_data.php";
    include '../Main.php';
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $unlink_img = $obj->pro_search($id);
            while($row = $unlink_img->fetch_object()){
                $image = $row->product_image;
                //echo $image;
                unlink('../uploads/'.$image);
            }
        //echo $id;
        $status = $obj->pro_detete($id);
        if($status == true){
            Flass_data::delete_pro("Product has been deleted.!");
            header("location:list_product.php");
        }
    }


?>