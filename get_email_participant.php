<?php
    require 'connection.php';

    $id_cource = $_POST['id_cource'];

    if ($con){
        
        $query = "SELECT email from participant where id_cource = $id_cource";
        $result = mysqli_query($con, $query);
        
        if ($result){
            $temp = "";
            while ($data = mysqli_fetch_assoc($result)){
                $temp = $temp . $data['email'] . ', ';
            }
            
            $query1 = "SELECT name_cource from cource where id_cource = $id_cource";
            $result1 = mysqli_query($con, $query1);
            if ($result1){
                $data1 = mysqli_fetch_assoc($result1);

                $email_group = rtrim($temp, ", ");
                $status_code = "ok";
                $result_code = 1;
                $name_cource = $data1['name_cource'];

                echo json_encode(
                    array(
                        'status_code'=>$status_code,
                        'result_code'=>$result_code,
                        'email_group'=>$email_group,
                        "name_cource"=>$name_cource
                    )
                );
            }else{
                $email_group = rtrim($temp, ", ");
                $status_code = "ok";
                $result_code = 0;
                $name_cource = $data1['name_cource'];

                echo json_encode(
                    array(
                        'status_code'=>$status_code,
                        'result_code'=>$result_code,
                        'email_group'=>$email_group
                    )
                );
            }
                
        }else{
            $status_code = "fail";
            echo json_encode(
                array(
                    'status_code'=>$status_code
                )
            );
        }
    }
?>