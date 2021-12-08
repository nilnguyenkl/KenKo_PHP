<?php
    require 'connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($con){
        
        $sql = "select *from users where email = '$email'";
        $result = mysqli_query($con, $sql);
        
        if (mysqli_num_rows($result) > 0){
            
            $rowCheck = mysqli_fetch_assoc($result);
            $dbpassword = $rowCheck['password'];
            
            if (password_verify($password, $dbpassword)){
                
                $checkObject = "select object from users where email = '$email'";
                $resultObject = mysqli_query($con, $checkObject);
                $row = mysqli_fetch_assoc($resultObject);

                $status = "ok";
                $result_code = 1;
                $object = $row['object'];
                
                echo json_encode(
                    array(
                        'status'=>$status,
                        'email'=>$email,
                        'result_code'=>$result_code,
                        'object'=>$object
                    )
                );
            
            }else{
                
                $status = "ok";
                $result_code = 0;
                
                echo json_encode(
                    array(
                        'status'=>$status,
                        'result_code'=>$result_code
                    )
                );
            
            }
         
        }else{
            
            $status = "ok";
            $result_code = 0;
            
            echo json_encode(
                array(
                    'status'=>$status,
                    'result_code'=>$result_code
                )
            );
        }

    }else{
        
        $status = "failed";
        
        echo json_encode(
            array(
                'status'=>$status
            ),
            JSON_FORCE_OBJECT
        );
    
    }
?>

