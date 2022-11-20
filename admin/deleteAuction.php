<?php
	include '../db.php';
	if (isset($_POST['Del_id'])) {
		echo('DEL_id');
	$query = "DELETE FROM `auctions`  WHERE `id` = ".$_POST['Del_id']."";
		if ($db->query($query)) {
      echo "Successfully Deleted";		}
	}
?>