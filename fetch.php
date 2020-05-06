<?php
    include 'Main.php';
    $obj = new Main();
    //fetch upzila by district id
    if(!empty($_POST['division'])){
        $division = $_POST['division'];
        echo $division;
        $value = $obj->district($division);

        if($value->num_rows>0){
            while($roww = $value->fetch_assoc()){
                echo '<option value="'.$roww['id'].'">'.$roww['dis_name'].'</option>';
            }
        }else{
            echo '<option value="">Upzila not available</option>';
        }
    }


?>