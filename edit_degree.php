<?php
    require 'connection.php';

    $email = $_POST['email'];
    $specialize = $_POST['specialize'];
    $place_of_issue = $_POST['place_of_issue'];
    $date_of_issue = $_POST['date_of_issue'];
    $workplace = $_POST['workplace'];

    if ($con){
        
        $check = "select email from degree where email = '$email'";
        $resultCheck = mysqli_query($con, $check);
        
        if (mysqli_num_rows($resultCheck) > 0){
            
            $query = "update degree set specialize = '$specialize', place_of_issue = '$place_of_issue', date_of_issue = '$date_of_issue', workplace = '$workplace' where email = '$email'";
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
            
            $query = "insert into degree (email, specialize, place_of_issue, date_of_issue, workplace) 
                        values ('$email', '$specialize', '$place_of_issue', '$date_of_issue', '$workplace')";
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
        }
    }
?>