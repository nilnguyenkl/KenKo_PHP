<?php
    require 'connection.php';

    $id_cource = $_POST['id_cource'];
    $name_cource = $_POST['name_cource'];
    $descript_cource = $_POST['descript_cource'];
    $status = $_POST['status'];

    $startday = $_POST['startday'];
    $stopday = $_POST['stopday'];
    $starttime = $_POST['starttime'];
    $stoptime = $_POST['stoptime'];
    $daysofweek = $_POST['daysofweek'];
    $member = $_POST['member'];
    $price = $_POST['price'];
    $address = $_POST['address'];

    if ($con){
        
        $query1 = "update cource set name_cource = '$name_cource', descript_cource = '$descript_cource', status = '$status' where id_cource = $id_cource";
        $result1 = mysqli_query($con, $query1);

        $query2 = "update cource_infor set startday = '$startday', stopday = '$stopday', starttime = '$starttime', stoptime = '$stoptime', daysofweek = '$daysofweek', member = '$member', price = '$price', address = '$address' where id_cource = $id_cource";
        $result2 = mysqli_query($con, $query2);
        
        if ($result1 == True && $result2 == True){
            
            $status_code = "ok";
            $result_code = 1;
                           
            echo json_encode(
                array(
                    'status_code'=>$status_code,
                    'result_code'=>$result_code
                )
            );    
        }
    }
?>