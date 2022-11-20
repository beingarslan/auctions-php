<?php
	include '../db.php';
	if (isset($_POST['Del_id'])) {
		echo('DEL_id');
	$query = "DELETE FROM `products`  WHERE `id` = ".$_POST['Del_id']."";
	// delete auction where product_id = $_POST['Del_id']
	$query = "DELETE FROM `auctions`  WHERE `product_id` = ".$_POST['Del_id']."";
		if ($db->query($query)) {
	  echo "Successfully Deleted";		}
	}
		
	?>