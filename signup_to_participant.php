<?php
    require 'connection.php';
    
    $id_cource = $_POST['id_cource'];
    $email = $_POST['email'];

    if ($con){
        $check = "select *from participant where id_cource = $id_cource and email = '$email'";
        $resultCheck = mysqli_query($con, $check);
        if (mysqli_num_rows($resultCheck) > 0){
            $status_code = "kok";
            $result_code = 1;
            echo json_encode(
                array(
                    'status_code'=>$status_code,
                    'result_code'=>$result_code
                )
            );
        }else{
            $query = "INSERT INTO participant(id_cource, email) VALUES ($id_cource, '$email')";
            $result = mysqli_query($con, $query);
            
            if($result){
                $status_code = "ok";
                $result_code = 1;
            }else{
                $status_code = "fail";
                $result_code = 1;
            }
            echo json_encode(
                array(
                    'status_code'=>$status_code,
                    'result_code'=>$result_code
                )
            );
        }
    }else{

        $status_code = "fail";
        $result_code = 0;

        echo json_encode(
            array(
                'status_code'=>$status_code,
                'result_code'=>$result_code
            )
        );
    }
?>
