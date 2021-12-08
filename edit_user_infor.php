<?php
    require 'connection.php';

    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    if ($con){
        
        $query = "update users_infor set firstname = '$firstname', lastname = '$lastname', address = '$address', phone = '$phone' where email = '$email'";
        $result = mysqli_query($con, $query);
        
        if ($result){
            
            $status = "ok";
            $result_code = 1;
                           
            echo json_encode(
                array(
                    'status'=>$status,
                    'result_code'=>$result_code
                )
            );
            
        }
    }
?>