<?php
    require 'connection.php';

    $id_cource = $_POST['id_cource'];
    $content = $_POST['content'];
    $date_notification = date("Y-m-d");

    if($con){
        $query = "insert into notification (id_cource, date_notification, content) values ('$id_cource', '$date_notification', '$content')";
        $result = mysqli_query($con, $query);
        
        if ($result){
            
            $result_code = 1;
            $status_code = "ok";

            echo json_encode(
                array(
                    'result_code'=>$result_code,
                    'status_code'=>$status_code
                )
            );

        }else{
            
            $result_code = 1;
            $status_code = "failed";

            echo json_encode(
                array(
                    'result_code'=>$result_code,
                    'status_code'=>$status_code
                )
            );    
        }

    }else{
        $result_code = 0;
        
        echo json_encode(
            array(
                'result_code'=>$result_code
            ),
            JSON_FORCE_OBJECT
        );
    }

?>