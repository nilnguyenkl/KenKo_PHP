<?php
    require 'connection.php';

    $encodedImage = $_POST['EN_IMAGE'];
    $imageTitle = $_POST['email'];

    $imageLocation = "upload/$imageTitle.jpg";

    $sqlQuery = "insert into images (email, location) values ('$imageTitle', '$imageLocation')";
    
    if(mysqli_query($con, $sqlQuery)){

        file_put_contents($imageLocation, base64_decode($encodedImage));
        
        $result["status"] = TRUE;
        $result["remarks"] = "Image Uploaded Successfull";

    }else{
        
        $result["status"] = FALSE;
        $result["remarks"] = "Image Uploading Failure Successfull";
    
    }

    mysqli_close($con);
    print(json_encode($result));

?>