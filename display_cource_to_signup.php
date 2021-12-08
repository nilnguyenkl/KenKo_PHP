<?php
    require 'connection.php';
    
    $id_cource = $_POST['id_cource'];

    if ($con){
        
        $query = "  select c.email, firstname, lastname, name_cource, startday, stopday, starttime, stoptime, daysofweek, ci.address, descript_cource, price, member 
                    from cource c join cource_infor ci on c.id_cource = ci.id_cource
                    join users_infor ui on ui.email = c.email where c.id_cource = $id_cource";
        $result = mysqli_query($con, $query);

        $count = "select count(*) as number from participant where id_cource = $id_cource";
        $result1 = mysqli_query($con, $count);
        $countData = mysqli_fetch_assoc($result1);
        $participant = $countData['number'];
    
        $data = mysqli_fetch_assoc($result);
        
        $emparray = $data;

        $emparray += ["participant" => $participant];
      
        echo json_encode($emparray);

    }

?>
