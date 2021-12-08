<?php
    require 'connection.php';
    
    $id_cource = $_POST['id_cource'];

    if ($con){
        
        $query = "  select *from notification WHERE id_cource = $id_cource order by id_notification desc";
        
        $result = mysqli_query($con, $query);

        if ($result){
    
            while ($data = mysqli_fetch_assoc($result)){
                $emparray[] = $data;
            }
            
            echo json_encode($emparray);
        }
    }

?>