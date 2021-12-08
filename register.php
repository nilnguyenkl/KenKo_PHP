<?php
 
    require 'connection.php';

    $email = $_POST['email'];
    $object = $_POST['object'];
    $password = $_POST['password'];

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    if ($con){
        
        $sql = "select *from users where email = '$email'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0){
            
            $status = "ok";
            $result_code = 0;
            $email = "";
            
            echo json_encode(
                array(
                    'status'=>$status,
                    'email'=>$email,
                    'result_code'=>$result_code
                )
            );

        }else{
            
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            // insert into users
            $insertUsers = "INSERT INTO users (email,object, password) VALUES ('$email','$object', '$password')";
            $rstUsers = mysqli_query($con,$insertUsers);
            
            // insert into users_infor
            $insertUsersInfor = "INSERT INTO users_infor (email,firstname,lastname, address, phone) VALUES ('$email','$firstname','$lastname', '$address', '$phone')";
            $rstUsersInfor = mysqli_query($con,$insertUsersInfor);

            if ($rstUsers == True && $rstUsersInfor == True){
                
                $status = "ok";
                $result_code = 1;

                echo json_encode(
                    array(
                        'status'=>$status,
                        'result_code'=>$result_code,
                        'email'=>$email
                    )
                );

            }else{
                
                $status = "failed";
                
                echo json_encode(
                    array(
                        'status'=>$status
                    ),
                    JSON_FORCE_OBJECT
                );
            }
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