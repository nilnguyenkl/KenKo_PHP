<?php
    require 'connection.php';

    $email = $_POST['email'];
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $cnfnewpassword = $_POST['cnfnewpassword'];


    if ($con){
        
        $check = "select password from users where email = '$email'";
        $resultCheck = mysqli_query($con, $check);
        
        if (mysqli_num_rows($resultCheck) > 0){
            
            $dataCheck = mysqli_fetch_assoc($resultCheck);
            $password = $dataCheck['password'];

            if (password_verify($oldpassword, $password)){

                if ($newpassword == $cnfnewpassword){
                    
                    $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
                    $update = "update users set password = '$newpassword' where email = '$email'";
                    $result = mysqli_query($con, $update);
                    
                    if ($result){
                        
                        $status = "ok";
                        $result_code = 1;
                        $password_stt = 1;               
                        
                        echo json_encode(
                            array(
                                'status'=>$status,
                                'result_code'=>$result_code,
                                'password_stt'=>$password_stt
                            )
                        );

                    }else {
                        
                        $status = "ok";
                        $result_code = 1;
                        $password_stt = 0;               
                        
                        echo json_encode(
                            array(
                                'status'=>$status,
                                'result_code'=>$result_code,
                                'password_stt'=>$password_stt)
                            );
                    }

                }else{

                    $status = "ok";
                    $result_code = 1;
                    $password_stt = 2;               
                    
                    echo json_encode(
                        array(
                            'status'=>$status,
                            'result_code'=>$result_code,
                            'password_stt'=>$password_stt
                        )
                    );
                }

            }else{

                $status = "ok";
                $result_code = 1;
                $password_stt = 3;               
                
                echo json_encode(
                    array(
                        'status'=>$status,
                        'result_code'=>$result_code,
                        'password_stt'=>$password_stt
                    )
                );
            }
        }
    }
?>