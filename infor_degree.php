<?php
    require 'connection.php';

    $email = $_POST['email'];

    if ($con){
        $query = "select * from degree where email = '$email'";
        $result = mysqli_query($con, $query);
        if ($result){
            if(mysqli_num_rows($result) > 0){
                $data = mysqli_fetch_assoc($result);
            
                $specialize = $data['specialize'];
                $place_of_issue = $data['place_of_issue'];
                $date_of_issue = $data['date_of_issue'];
                $workplace = $data['workplace'];

                $status = "ok";
                $result_code = 1;
                            
                echo json_encode(
                    array(
                        'status'=>$status,
                        'result_code'=>$result_code,
                        'specialize'=>$specialize,
                        'place_of_issue'=>$place_of_issue,
                        'date_of_issue'=>$date_of_issue,
                        'workplace'=>$workplace
                    )
                );
            }else{
                $data = mysqli_fetch_assoc($result);
            
                $specialize = $data['specialize'];
                $place_of_issue = $data['place_of_issue'];
                $date_of_issue = $data['date_of_issue'];
                $workplace = $data['workplace'];

                $status = "ok";
                $result_code = 0;
                            
                echo json_encode(
                    array(
                        'status'=>$status,
                        'result_code'=>$result_code,
                        'specialize'=>$specialize,
                        'place_of_issue'=>$place_of_issue,
                        'date_of_issue'=>$date_of_issue,
                        'workplace'=>$workplace
                    )
                );
            }
        }
    }
?>