<?php
include "db.php";
include "sessions.php";
?>


<!-- // get all products  -->
<?php
$query = "SELECT * FROM products";
$result = mysqli_query($db, $query);
?>
<!-- // get all categories -->
<?php
$query = "SELECT * FROM categories";
$result = mysqli_query($db, $query);
?>

<?php
function getCategoryName($id)
{
	global $db;
	$query = "SELECT * FROM categories WHERE id = $id";
	$result = mysqli_query($db, $query);
	$category = mysqli_fetch_assoc($result);
	return $category['name'];
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>ibuy Auctions</title>
	<link rel="stylesheet" href="ibuy.css" />
</head>

<body>
	<header>
		<h1><span class="i">i</span><span class="b">b</span><span class="u">u</span><span class="y">y</span></h1>

		<form action="#">
			<input type="text" name="search" placeholder="Search for anything" />
			<input type="submit" name="submit" value="Search" />
		</form>
	</header>

	<nav>
		<!-- //show all products -->
		<?php
		$query = "SELECT * FROM products";
		$result = mysqli_query($db, $query);
		?>
		<!-- //show all categories -->
		<?php
		$query = "SELECT * FROM categories";
		$result = mysqli_query($db, $query);
		?>
		<ul>
			<!-- display categories -->

			<?php
			while ($row = mysqli_fetch_assoc(
				$result
			)) {
			?>
				<li><a class="categoryLink" href="home.php?category_id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
			<?php
			}
			?>




		</ul>
	</nav>
	<img src="banners/1.jpg" alt="Banner" />

	<main>

		<!-- Product Listing -->
		<div class="col-md-3">
			<div class="card">
				<div class="card-header">
					<h3>Products</h3>
				</div>
				<div class="card-body">
					<ul class="list-group
                                list-group-flush">
						<?php
						while ($row = mysqli_fetch_assoc(
							$result
						)) {
						?>
							<li class="list-group
                                        -item">
								<a href="home.php?category_id=<?php echo $row['id']; ?>">
									<?php echo $row['name']; ?>
								</a>
							</li>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
		</div>


		<ul class="productList">
			<?php
			if (isset($_GET['category_id'])) {
				$query = "SELECT * FROM products WHERE category_id = " . $_GET['category_id'];
			} else {
				$query = "SELECT * FROM products";
			}
			$result = mysqli_query($db, $query);
			while ($row = mysqli_fetch_assoc(
				$result
			)) {
			?>
				<li>
					<img src="product.png" alt="product name">
					<article>
						<h2><?php echo $row['name'] ?></h2>
						<h3><?php echo getCategoryName($row["category_id"]) ?></h3>
						<p><?php echo $row['description'] ?></p>
						<!-- if is_auction -->
						<?php if ($row['is_auction']) { ?>
							<!-- get auction -->
							<?php
							$query = "SELECT * FROM auctions WHERE product_id = " . $row['id'];
							$auctionResult = mysqli_query($db, $query);
							$auction = mysqli_fetch_assoc($auctionResult);
							?>
							<!-- if auction is active -->
							<p class="price">Current bid: £<?php echo $auction['price'] ?></p>
							<p class="time">Ends in: <?php echo $auction['end_time'] ?></p>
						<?php
							// if auction is not active
						} else {
						?>
							<p class="price">Price: £<?php echo $row['price'] ?></p>
						<?php
						}
						?>
						<!-- check if my product -->
						<?php if ($row['user_id'] == $_SESSION['user_id']) { ?>
							<!-- create auction -->
							<?php if (!$row['is_auction']) { ?>
								<a href="create_auction.php?product_id=<?php echo $row['id']; ?>">Create Auction</a>
							<?php } ?>
							<a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
							<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
						<?php } ?>
						<a href="productDetail.php?id=<?php echo $row['id'] ?>" class="more auctionLink">More &gt;&gt;</a>
					</article>
				</li>
			<?php
			}
			?>
		</ul>



		<footer>
			&copy; ibuy 2019
		</footer>
	</main>
</body>

</html>