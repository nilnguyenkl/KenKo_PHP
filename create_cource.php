<?php
    require 'connection.php';

    $email = $_POST['email'];
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

        mysqli_begin_transaction($con);

        try {
            mysqli_autocommit($con,FALSE);
        
            $query1 = "insert into cource (email, name_cource, descript_cource, status) values ('$email', '$name_cource', '$descript_cource', '$status')";
            mysqli_query($con, $query1);
            
            $idCource = mysqli_insert_id($con);

            $query2="insert into cource_infor (
                id_cource, startday, stopday, starttime, stoptime, daysofweek, member, price, address
            ) values (
                '$idCource', '$startday', '$stopday', '$starttime', '$stoptime', '$daysofweek', '$member', '$price', '$address'
            )";
            mysqli_query($con, $query2);

            mysqli_commit($con);
            mysqli_autocommit($con,TRUE);

            $status_code = "ok";
            $result_code = 1;

            echo json_encode(
                array(
                    'status_code'=>$status_code,
                    'result_code'=>$result_code
                    )
                );
        
        } catch (mysqli_sql_exception $exception) {
            mysqli_rollback($mysqli);
            throw $exception;
        }
    }
?>