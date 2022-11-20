<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';
include '../sessions_admin.php';

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
                            <div class="card-header">Edit Category</div>
                            <div class="card-body">
                                <form>
                                    <?php

                                    $sql = "SELECT * from categories  where id='" . $_GET['id'] . "' ";
                                    $query = mysqli_query($db, $sql);

                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($query)) {
                                    ?>
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (name)-->
                                                <div class="col-md-6">
                                                    <input type="hidden" name="id" id="id" value="<?= $_GET['id'] ?>">
                                                    <label class="small mb-1" for="inputName">Name</label>
                                                    <input class="form-control" id="inputName" type="text" placeholder="Enter category name" value="<?php echo $row1['name']; ?>" />
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputDescription">Description</label>
                                                    <input class="form-control" id="inputDescription" type="text" placeholder="Enter category Description" value="<?php echo $row1['description']; ?>" />
                                                </div>
                                            </div>
                                           
                                            <button onclick="updateCategory();" class="btn btn-primary mt-2" type="button">Save changes</button>
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
    function updateCategory() {

        var inputName = document.getElementById("inputName").value;
        var inputDescription = document.getElementById("inputDescription").value;
        var id = document.getElementById('id').value;


        if (inputName == "" || inputDescription == "") {
            alert("Please fill all the fields");
            return;
        }
        $.ajax({
            type: 'POST',
            url: 'updateCategory.php',
            data: {
                inputName: inputName,
                inputDescription: inputDescription,
                id: id,

            },
            success: function(res) {
                alert(res);
             
                window.location.replace('allCategories.php');            
                console.log(res)
            }
        });

    }
</script>