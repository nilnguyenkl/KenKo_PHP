<?php
    require 'connection.php';
    
    $email = $_POST['email'];
    $status = $_POST['status'];

    $datenow = date("Y-m-d");

    if ($con){

        // $query = "select c.id_cource, startday, stopday from cource c join cource_infor ci on ci.id_cource = c.id_cource";
        
        // $result = mysqli_query($con, $query);
        // while ($row = mysqli_fetch_assoc($result)){
            
        //     $id = $row['id_cource'];
            
        //     $startday = $row['startday'];
        //     $stopday = $row['stopday'];

        //     if($datenow >= $startday){
        //         if ($datenow <= $stopday){
        //             // Open
        //             $update = "UPDATE cource SET status = 'open' WHERE id_cource = $id";
        //         }else{
        //             // Finish
        //             $update = "UPDATE cource SET status = 'finish' WHERE id_cource = $id";
        //         } 
        //     }else{
        //         // Prepare
        //         $update = "UPDATE cource SET status = 'prepare' WHERE id_cource = $id";
        //     }

        //     mysqli_query($con, $update);
        // }

        $query = "select id_cource, name_cource from cource where status = '$status' and email = '$email' order by id_cource desc";
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