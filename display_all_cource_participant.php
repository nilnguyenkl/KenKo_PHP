<?php
    require 'connection.php';
    
    $email = $_POST['email']; // Doi tuong Tham gia
    $status = $_POST['status'];

    if ($con){

        $query = "select c.id_cource, name_cource, descript_cource, firstname, lastname, phone 
                    from participant pt join cource c
                    on pt.id_cource = c.id_cource
                    join users_infor ui on ui.email = c.email
                    where status = '$status' and pt.email = '$email' 
                    order by c.id_cource desc";
                    
        $result = mysqli_query($con, $query);
        
        $emparray = [];

        if ($result){
            
            while ($data = mysqli_fetch_assoc($result)){
                $emparray[] = $data;
            }

            echo json_encode($emparray);
        }
    }

?>