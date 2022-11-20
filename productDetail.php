<?php
include 'db.php';
include 'head.php';
include 'header.php';
//  include 'admin/sidebar.php';
if ($_SESSION['loggedinuserrole'] == "User") {
    header('Location: ../index.php');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            background-image: url("public/images/hero_image2.jpg");
        }
    </style>
</head>


<body>

    <div class="d-flex flex-column h-100">

        <main>


            <div class="container-xl px-12 mt-12">
                <!-- Account page navigation-->


                <div style="justify-content: center;margin-top: 20px" class="row">

                    <div class="col-xl-10">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Product Details</div>
                            <div class="card-body">
                                <form>
                                    <?php

                                    $sql = "SELECT * from products  where id='" . $_GET['id'] . "' ";
                                    $query = mysqli_query($db, $sql);

                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($query)) {
                                    ?>
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <input type="hidden" name="id" id="id" value="<?= $_GET['id'] ?>">
                                                    <label class="small mb-1" for="inputFullName">Product Name</label>
                                                    <input class="form-control" id="inputFullName" type="text" placeholder="Name" value="<?php echo $row1['name']; ?>" />
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPrice">Price</label>
                                                    <input class="form-control" id="inputPrice" type="integer" placeholder="Price" value="<?php echo $row1['price']; ?>" />
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (organization name)-->

                                                <!-- Form Group (location)-->
                                                <div class="col-md-12">
                                                    <label class="small mb-1" for="inputDescription">Description</label>
                                                    <input class="form-control" id="inputDescription" type="text" placeholder="Description" value="<?php echo $row1['description']; ?>" />
                                                </div>
                                            </div>
                                            <!-- Form Group (email address)-->

                                            <!-- Form Row-->
                                            <!-- categories -->
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputCategory">Category</label>
                                                    <select class="form-control" id="inputCategory" name="inputCategory">
                                                        <?php
                                                        $sql = "SELECT * from categories";
                                                        $query = mysqli_query($db, $sql);

                                                        if (mysqli_num_rows($query) > 0) {
                                                            while ($row = mysqli_fetch_assoc($query)) {
                                                        ?>
                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label class="small mb-1" for="inputImage">Image</label>
                                                    <input class="form-control" id="inputImage" type="file" placeholder="Image" value="<?php echo $row1['image']; ?>" />
                                                </div> -->
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <!-- join request -->
                                                <!-- Save changes button-->
                                                <button onclick="updateProduct();" class="btn btn-primary mt-2" type="button">Save changes</button>
                                            </div>

                                    <?php
                                        }
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include 'footer.php';
        ?>
    </div>






</body>

</html>
<script>
    function updateProduct(){
        var id = document.getElementById('id').value;
        var name = document.getElementById('inputFullName').value;
        var price = document.getElementById('inputPrice').value;
        var description = document.getElementById('inputDescription').value;
        var category = document.getElementById('inputCategory').value;
        // var image = document.getElementById('inputImage').value;
        $.ajax({
            url: 'updateProduct.php',
            type: 'POST',
            data: {
                id: id,
                name: name,
                price: price,
                description: description,
                category: category,
                // image: image
            },
            success: function(data) {
                if (data == "success") {
                    alert("Product Updated Successfully");
                    window.location.href = "productList.php";
                } else {
                    alert("Product Not Updated");
                }
            }
        });
    }
 
</script>