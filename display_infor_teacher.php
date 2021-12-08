<?php
    require 'connection.php';

    $email = $_POST['email'];

    if ($con){
        
        $check = "select *from degree where email = '$email'";
        $rsCheck = mysqli_query($con, $check);
        if ($dataCheck = mysqli_fetch_assoc($rsCheck)){
            $query = "select d.email, firstname, lastname, address, phone, specialize, place_of_issue, date_of_issue, workplace
            from users_infor ui join degree d on d.email = ui.email where d.email = '$email'";
            
            $result = mysqli_query($con, $query);
        
            $data = mysqli_fetch_assoc($result);
            $emparray = $data;
            $emparray += ["status_code" => "ok"];
        }else{
            $query = "select email, firstname, lastname, address, phone from users_infor where email = '$email'";
            
            $result = mysqli_query($con, $query);
            
            $data = mysqli_fetch_assoc($result);
            $emparray = $data;
            $emparray += ["status_code" => "nook"];
        }

        $img = "select *from images where email = '$email'";
        $rsImg = mysqli_query($con, $img);
        if($dataImg = mysqli_fetch_assoc($rsImg)){
            $emparray += ["status_img" => "ok"];
        }else{
            $emparray += ["status_img" => "nook"];
        }
        echo json_encode($emparray);
    }

?>
