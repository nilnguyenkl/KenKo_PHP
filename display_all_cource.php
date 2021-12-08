<?php
    require 'connection.php';

    $status = $_POST['status'];
    $email = $_POST['email'];

    if ($con){
        
        // $check = "select id_cource from participant where email = '$email'";

        $query = "select id_cource, name_cource, descript_cource, firstname, lastname 
        from cource c join users_infor u on u.email = c.email
        where status='$status' 
        and id_cource not in (select id_cource from participant where email = '$email')
        order by id_cource desc";
        
        $result = mysqli_query($con, $query);
    
        if ($result){
    
            while ($data = mysqli_fetch_assoc($result)){
                $emparray[] = $data;
            }
            echo json_encode($emparray);
        }

    }

?>