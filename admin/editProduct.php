<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';
if($_SESSION['loggedinuserrole']=="User") {
    header('Location: ../index.php');
    die();
}
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>

            <!-- Main page content-->
            <div class="container-xl px-12 mt-12">
                <!-- Account page navigation-->


                <div style="justify-content: center;margin-top: 20px" class="row">

                    <div class="col-xl-10">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Add Auction</div>
                            <div class="card-body">
                                <form>
                                    <?php

                                    $sql = "SELECT * from products  where id='" . $_GET['id'] . "' ";
                                    $query = mysqli_query($db, $sql);

                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($query)) {
                                    ?>
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (name)-->
                                                <div class="col-md-6">
                                                    <input type="hidden" name="id" id="id" value="<?= $_GET['id'] ?>">
                                                    <label class="small mb-1" for="inputName">Name</label>
                                                    <input class="form-control" id="inputName" type="text" placeholder="Enter Product name" value="<?php echo $row1['name']; ?>" />
                                                </div>
                                                <!-- Form Group (description)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputDescription">Description</label>
                                                    <input class="form-control" id="inputDescription" type="text" placeholder="Enter Product Description" value="<?php echo $row1['description']; ?>" />
                                                </div>
                                                <!-- From Group (price) -->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPrice">Price</label>
                                                    <input class="form-control" id="inputPrice" type="text" placeholder="Enter Product Price" value="<?php echo $row1['price']; ?>" />
                                                </div>
                                                <!-- From Group (category) -->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputCategory">Category</label>
                                                    <select class="form-control" id="inputCategory">
                                                        <option value="0">Select Category</option>
                                                        <?php
                                                        $sql = "SELECT * from categories";
                                                        $query = mysqli_query($db, $sql);
                                                        if (mysqli_num_rows($query) > 0) {
                                                            while ($row = mysqli_fetch_assoc($query)) {
                                                        ?>
                                                                <option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $row1['category_id']) {
                                                                                                                echo "selected";
                                                                                                            } ?>><?php echo $row['name']; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                            </div>
                                           
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
        include '../admin/footer.php';
        ?>
    </div>

</div>

<script>
    function updateProduct() {

        var inputName = document.getElementById("inputName").value;
        var inputDescription = document.getElementById("inputDescription").value;
        var inputPrice = document.getElementById("inputPrice").value;
        var  inputCategory= document.getElementById("inputCategory").value;
        var id = document.getElementById('id').value;


        if (inputName == "" || inputDescription == ""||inputPrice == null || inputCategory == null) {
            alert("Please fill all the fields");
            return;
        }
        $.ajax({
            type: 'POST',
            url: 'updateProduct.php',
            data: {
                inputName: inputName,
                inputDescription: inputDescription,
                inputPrice: inputPrice,
                inputCategory: inputCategory,
                id: id,

            },
            success: function(res) {
                alert(res);
             
                window.location.replace('allProducts.php');            
                console.log(res)
            }
        });

    }
</script>