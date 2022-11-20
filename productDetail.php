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
<!-- get category name from id -->
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
<!-- get user name from id -->
<?php
function getUserName($id)
{
	global $db;
	$query = "SELECT * FROM users WHERE id = $id";
	$result = mysqli_query($db, $query);
	$user = mysqli_fetch_assoc($result);
	return $user['name'];
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
		<h1 ><span class="i">i</span><span class="b">b</span><span class="u">u</span><span class="y">y</span></h1>

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
				<li><a class="categoryLink" href="index.php?category_id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
			<?php
			}
			?>




		</ul>
	</nav>
	<img src="banners/1.jpg" alt="Banner" />

	<main>
			<!-- Product Detail -->
		<h1 id="productDetail">Product Page</h1>
		<!-- get product -->
		<?php
		$query = "SELECT * FROM products WHERE id = " . $_GET['id'];
		$result =
			mysqli_query($db, $query);
		$product = mysqli_fetch_assoc($result);

		
		?>
		
			

		
		<!-- display product details -->

		<article class="product" >

			<img src="product.png" alt="product name">
			<section class="details">
				<h2><?php echo $product['name']?></h2>
				<h3><?php echo getCategoryName($product['category_id'])?></h3>
				<!-- show auction if auction has product -->
				<?php
				$query = "SELECT * FROM auctions WHERE product_id = " . $product['id'];
				$result = mysqli_query($db, $query);
				$auction = mysqli_fetch_assoc($result);
				?>
				<!--check if auction  -->
				<?php if ($auction) { ?>
					<p>Auction created by <a href="#"><?php echo getUserName($auction['user_id'])?></a></p>
				<p class="price">Current bid:<?php echo $auction['price']?></p>
				<time>Time left: 8 hours 3 minutes</time>
				<!-- place bid -->
				<form action="placeBid.php" method="post">
					<input type="hidden" name="id" value="<?php echo $product['id']?>">
					<input type="hidden" name="auction_id" value="<?php echo $auction['id']?>">
					<input type="hidden" name="product_id" value="<?php echo $product['id']?>">
					<input type="number" name="price" placeholder="Enter your bid">
					<input type="submit" name="submit" value="Place Bid">
				</form>


				<!-- <form class="bid">
					<input type="text" name="bid" placeholder="Enter bid amount" />
					<input type="submit" value="Place bid" />
			
				
				</form>  -->
				<?php }
				// else no products
				else { ?>
				<!-- heading with text color red -->
				<h2 style="color:red">No auction for this product</h2>
				<?php } ?>


			
			</section>
			<section class="description">
				<p>
					<?php echo $product['description']?>
				</p>

			</section>

			<section class="reviews">
				<h2>Reviews of User.Name </h2>
				<ul>
					<li><strong>Ali said </strong> great ibuyer! Product as advertised and delivery was quick <em>29/09/2019</em></li>
					<li><strong>Dave said </strong> disappointing, product was slightly damaged and arrived slowly.<em>22/07/2019</em></li>
					<li><strong>Susan said </strong> great value but the delivery was slow <em>22/07/2019</em></li>

				</ul>

				<form>
					<label>Add your review</label> <textarea name="reviewtext"></textarea>

					<input type="submit" name="submit" value="Add Review" />
				</form>
			</section>
		</article>

		<!-- <hr />
		<h1>Sample Form</h1>

		<form action="#">
			<label>Text box</label> <input type="text" />
			<label>Another Text box</label> <input type="text" />
			<input type="checkbox" /> <label>Checkbox</label>
			<input type="radio" /> <label>Radio</label>
			<input type="submit" value="Submit" />

		</form> -->





		<footer>
			&copy; ibuy 2019
		</footer>
	</main>
</body>

</html>