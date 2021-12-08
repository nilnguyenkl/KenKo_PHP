<?php
    require 'connection.php';

    $id_cource = $_POST['id_cource'];
    $email = $_POST['email'];
    
    if($con){
        $query = "delete from participant where id_cource = $id_cource and email = '$email'";
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