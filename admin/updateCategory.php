<?php
include '../db.php';



if(isset ($_POST['inputName']) ){

    $query = "UPDATE `categories` SET `name` = '".$_POST['inputName']."',`description` = '".$_POST['inputDescription']."',`updated_at` = '".date('Y-m-d H:i:s')."' WHERE `id` = ".$_POST['id']."";
       if (mysqli_query($db, $query)) {
      
        echo "Category updated successfully";
    }
  
} else {

    echo "Error updating record: " . mysqli_error($db);
}



?>