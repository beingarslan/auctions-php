<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';

if ($_SESSION['loggedinuserrole'] == "User") {
    header('Location: ../index.php');
    die();
}
$data = $_POST;
if (isset($_POST['save'])) {
    // $Pieces = $_POST['Pieces'];
    // $HM = $_POST['HM'];
    // $Desc = $_POST['Desc'];
    // $Type = $_POST['Type'];
    // $ERG = $_POST['ERG'];
    // $CLS = $_POST['CLS'];
    // $WGT = $_POST['WGT'];
    // $NMFC = $_POST['NMFC'];
    // $NETWGT = $_POST['NETWGT'];
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];


    // $Pieces = implode(",", $Pieces);
    // $HM = implode(",", $HM);
    // $Desc = implode(",", $Desc);
    // $Type = implode(",", $Type);
    // $ERG = implode(",", $ERG);
    // $CLS = implode(",", $CLS);
    // $WGT = implode(",", $WGT);
    // $NMFC = implode(",", $NMFC);
    // $NETWGT = implode(",", $NETWGT);
    $Name = implode(",", $Name);
    $Description = implode(",", $Description);




    $query = "INSERT INTO `categories` (`name`,`description`) 
  VALUES ('$Name', '$Description')";
    if (mysqli_query($db, $query)) {
        header("Location: allCategories.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($db);
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert Item.</p>";
    }
} ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <!-- Main page content-->
            <div class="container-xl px-12 mt-12">
                <!-- Account page navigation-->


                <div style="margin-top: 20px" class="row">

                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">Add New Category</div>
                            <div class="card-body">
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">

                                    <table class="table table-bordered" id="dynamicTable">
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="Name[]" placeholder="Name" class="form-control" /></td>
                                            <td><input type="text" name="Description[]" placeholder="Description" class="form-control" /></td>
                                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                        </tr>
                                    </table>




                                    <!-- Save changes button-->
                                    <div class="text-center col-sm-12 mt-5">
                                        <button style="text-align:center;  width: 15%;" class="btn btn-primary" name="save" type="submit">Save</button>
                                    </div>

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



<style>
    .form-check.form-check-solid {
        float: left;
        margin-right: 15px;
    }
</style>
<script type="text/javascript">
    var i = 0;

    $("#add").click(function() {

        ++i;

        $("#dynamicTable").append(`<tr>
        <td><input type="text" name="Name[]" placeholder="Name" class="form-control" /></td>  
        <td><input type="text" name="Description[]" placeholder="Description" class="form-control" /></td>  
        <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
        </tr>`);
    });

    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>