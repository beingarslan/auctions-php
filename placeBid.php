
<?php
include "db.php";
?>

<!-- set bid -->

<?php
// echo( $_POST['id']);
if (isset($_POST['id'])) {
	// get auction
	$query = "SELECT * FROM auctions WHERE product_id = " . $_POST['id'];
	$auctionResult = mysqli_query($db, $query);
	$auction = mysqli_fetch_assoc($auctionResult);
	// if bid is higher than current bid
	if ($_POST['price'] > $auction['price']) {
		// update auction
		$query = "UPDATE auctions SET price = " . $_POST['price'] . " WHERE product_id = " . $_POST['id'];
		mysqli_query($db, $query);	
		header("Location: productDetail.php?id=".$_POST['id']);
	}
	else{

		echo "Bid must be higher than current bid";
		header("Location: productDetail.php?id=".$_POST['id']);
	}


}

