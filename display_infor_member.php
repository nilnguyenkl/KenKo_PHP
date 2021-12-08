<?php
    require 'connection.php';

    $email = $_POST['email'];

    if ($con){
        
        $query = "select *from users_infor where email = '$email'";
        $result = mysqli_query($con, $query);
    
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

?>
