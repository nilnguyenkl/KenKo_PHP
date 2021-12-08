<?php 
    require 'connection.php';

    $email = $_POST['email'];

    if ($con){
        
        $query = "select * from users_infor where email = '$email'";
        $result = mysqli_query($con, $query);
        
        if ($result){
            
            $data = mysqli_fetch_assoc($result);
            
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $address = $data['address'];
            $phone = $data['phone'];

            $status = "ok";
            $result_code = 1;
                           
            echo json_encode(
                array(
                    'status'=>$status,
                    'result_code'=>$result_code,
                    'firstname'=>$firstname,
                    'lastname'=>$lastname,
                    'address'=>$address,
                    'phone'=>$phone
                )
            );
        }
    }

?>