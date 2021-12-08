<?php
    require 'connection.php';

    $id_notification = $_POST['id_notification'];
    
    if($con){
        $query = "delete from notification where id_notification = $id_notification";
        $result = mysqli_query($con, $query);
        if ($result){
            $status_code = "ok";
        }else{
            $status_code = "failed";
        }
        echo json_encode(
            array(
                'status_code'=>$status_code
            )
        );
    }else{
        $status_code = "failed";
        
        echo json_encode(
            array(
                'status_code'=>$status_code
            ),
            JSON_FORCE_OBJECT
        );
    }
?>