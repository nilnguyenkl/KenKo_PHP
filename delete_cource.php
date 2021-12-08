<?php
    require 'connection.php';

    $id_cource = $_POST['id_cource'];

    if ($con){
        
        $query = "update cource set status = 'deleted' where id_cource = $id_cource";
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