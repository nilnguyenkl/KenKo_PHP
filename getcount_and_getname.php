<?php
    require 'connection.php';

    $email = $_POST['email'];
    $object = $_POST['object'];

    if ($con){
        if ($object == "student"){
            $query = "select count(*) as sum, ui.email, firstname, lastname from users_infor ui join participant p on p.email = ui.email where p.email = '$email'";
        }
        if ($object == "teacher"){
            $query = "select count(*) as sum, ui.email, firstname, lastname from users_infor ui join cource c on c.email = ui.email where c.email = '$email'";
        }

        $result = mysqli_query($con, $query);
        
        if($result){

            $data = mysqli_fetch_assoc($result);
            $emparray = $data;

            $img = "select *from images where email = '$email'";
            $rsImg = mysqli_query($con, $img);
            if($dataImg = mysqli_fetch_assoc($rsImg)){
                $emparray += ["status_img" => "ok"];
            }else{
                $emparray += ["status_img" => "nook"];
            }
            echo json_encode($emparray);
        
        }
    }
?>