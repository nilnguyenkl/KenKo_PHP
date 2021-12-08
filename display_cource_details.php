<?php
    require 'connection.php';
    
    $id_cource = $_POST['id_cource'];

    if ($con){
        
        $query = "  select status, name_cource, startday, stopday, starttime, stoptime, daysofweek, address, descript_cource, price, member 
                    from cource c join cource_infor ci on c.id_cource = ci.id_cource where c.id_cource = $id_cource";
        $result = mysqli_query($con, $query);
    
        $data = mysqli_fetch_assoc($result);
        $emparray = $data;
      
        echo json_encode($emparray);

    }

?>
