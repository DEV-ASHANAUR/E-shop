<?php
    session_start();
    //include "../Flash_data.php";
    include '../Main.php';
    $obj = new Main();
    $data = $obj->fetch_sell_per_month();

    if($data->num_rows>0){
        while($row = $data->fetch_assoc()){
            $output[] = array(
                'month' =>$row['month'],
                'total' =>$row['total']
            );
        //    echo $row['month'];
        //    echo $row['total'];
        }
        echo json_encode($output);
    }

?>