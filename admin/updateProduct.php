<?php
include '../db.php';



if(isset ($_POST['inputName']) ){

    $query = "UPDATE `products` SET `name` = '".$_POST['inputName']."',`description` = '".$_POST['inputDescription']."',`price` = '".$_POST['inputPrice']."',`category_id` = '".$_POST['inputCategory']."',`updated_at` = '".date('Y-m-d H:i:s')."' WHERE `id` = ".$_POST['id']."";
       if (mysqli_query($db, $query)) {
      
        echo "Product updated successfully";
    }
  
} else {

    echo "Error updating record: " . mysqli_error($db);
}



?>