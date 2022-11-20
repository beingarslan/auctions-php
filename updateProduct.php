<?php
include './db.php';

if (isset($_POST['inputName'])) {
    $inputName = $_POST['inputName'];
    $inputDescription = $_POST['inputDescription'];
    $inputPrice = $_POST['inputPrice'];
    $inputCategory = $_POST['inputCategory'];
    $id = $_POST['id'];

    $query = "UPDATE `products` SET `name` = '$inputName',`description` = '$inputDescription',`price` = '$inputPrice',`category_id` = '$inputCategory',`updated_at` = '" . date('Y-m-d H:i:s') . "' WHERE `id` = $id";

    if (mysqli_query($db, $sql)) {
        echo "Product updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
}



?>