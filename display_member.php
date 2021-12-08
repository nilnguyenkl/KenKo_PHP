<?php
    require 'connection.php';
    
    $id_cource = $_POST['id_cource'];

    if ($con){
        
        $query = "  select firstname, lastname, ci.email, phone, address 
                    from users_infor ci join participant pc on ci.email = pc.email WHERE id_cource = $id_cource";
        
        $result = mysqli_query($con, $query);

        if ($result){
    
            while ($data = mysqli_fetch_assoc($result)){
                $email = $data['email'];
                $img = "select *from images where email = '$email'";
                $rsImg = mysqli_query($con, $img);
                if($dataImg = mysqli_fetch_assoc($rsImg)){
                    $data += ["status_img" => "ok"];
                }else{
                    $data += ["status_img" => "nook"];
                }
                $emparray[] = $data;
            }
            
            echo json_encode($emparray);
        }
    }

?>