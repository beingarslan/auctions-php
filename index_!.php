<?php

include "db.php";
include "head.php";


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
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="ibuy.css" /> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login</title>
    <style>
        body {
            background-image: url("public/images/hero_image2.jpg");
        }
    </style>
    <?php

    include 'header.php';
    ?>
</head>


<body>

    <div class="d-flex flex-column h-100">


        <main>
            <!-- //show all products -->
            <?php
            $query = "SELECT * FROM products";
            $result = mysqli_query($db, $query);
            ?>
            //show all categories
            <?php
            $query = "SELECT * FROM categories";
            $result = mysqli_query($db, $query);
            ?>

            <div class="container">
                <div class="row pt-5 mt-5">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Categories</h4>
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
                                            <a href="index.php?category_id=<?php echo $row['id']; ?>">
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
                    <!-- <div class="col-md-9">
                        <div >
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
                                <div class="col-md-12  ">
                                    <div class="card">
                                        <img src="https://i.imgur.com/QpjAiHq.jpg" class="card-img-top " alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title
                                            "><?php echo $row['name']; ?></h5>
                                            <p class="card-text
                                            "><?php echo $row['description']; ?></p>
                                            <a href="product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div> -->
                    <div class="d-flex justify-content-center row col-md-9 ">
                        <div>
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
                                <div class="row p-2 bg-white border rounded  mb-3 shadow">
                                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="https://i.imgur.com/QpjAiHq.jpg"></div>
                                    <div class="col-md-6 mt-1">
                                        <h5><?php echo $row['name']; ?></h5>
                                        <div class="d-flex flex-row">
                                            <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                                        </div>
                                        <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span class="dot"></span><span>Light weight</span><span class="dot"></span><span>Best finish<br></span></div>
                                        <div class="mt-1 mb-1 spec-1"><span class="badge badge-pill btn-dark"><?php echo getCategoryName($row['category_id']); ?></span></div>
                                        <p class="text-justify text-truncate para mb-0"><?php echo $row['description']; ?><br><br></p>
                                    </div>
                                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                        <div class="d-flex flex-row align-items-center">
                                            <h4 class="mr-1">$<?php echo $row['price']; ?></h4>
                                        </div>
                                        <h6 class="text-success">Free shipping</h6>
                                        <!-- <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" type="button">Details</button><a href="addToAuction.php?id=' . $row1['id'] . '"  class="btn btn-outline-primary btn-sm mt-2" type="button">Add to Auction</a></div> -->
                                    <div class="d-flex flex-column mt-4">
                                     
                                        <a href="productDetail.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm" type="button">Details</a>
                                        <a href="addToAuction.php?id=<?php echo $row['id']; ?>"  class="btn btn-outline-primary btn-sm mt-2" type="button">Add to Auction</a>
                                    </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
       
        </main> -->
        <?php include 'footer.php'; ?>
    </div>

</body>

</html>
<script>
      

        function addToAuction(id) {
            $.ajax({
                url: "addToAuction.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    alert(data);
                    window.location.reload();
                    console.log(res)
                }
            });
        }
        
    </script>