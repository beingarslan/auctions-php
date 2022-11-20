<?php
include '../db.php';



if(isset ($_POST['inputFullName']) ){

    $query = "UPDATE `users` SET `full_name` = '".$_POST['inputFullName']."',`email` = '".$_POST['inputEmailAddress']."',`password` = '".$_POST['inputPassword']."',role='".$_POST['inputRole']."',status='".$_POST['inputActiveStatus']."' WHERE `id` = ".$_POST['inputId']."";
       if (mysqli_query($db, $query)) {
      
        echo "Record updated successfully";
    }
  
} else {

    echo "Error updating record: " . mysqli_error($db);
}



?>