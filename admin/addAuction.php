<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';

if ($_SESSION['loggedinuserrole'] == "User") {
    header('Location: ../index.php');
    die();
}
//get all categories
$query = "SELECT * FROM categories";
$result = mysqli_query($db, $query);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

//all allProducts
$query = "SELECT * FROM products";
$result = mysqli_query($db, $query);
$allProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);

// get current user name
$query = "SELECT * FROM users WHERE id = " . $_SESSION['loggedinuserid'];
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);


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
    $Product_id = $_POST['Product_id'];
    $user_id= $_POST['user_id'];
    $Price = $_POST['Price'];
    $startTime= $_POST['startTime'];
    $endTime = $_POST['endTime'];
   
   


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
    $Product_id = implode(",", $Product_id);
    $user_id = implode(",", $user_id);
    $Price = implode(",", $Price);
    $startTime = implode(",", $startTime);
    $endTime = implode(",", $endTime);
   



    $query = "INSERT INTO `auctions` (`name`,`product_id`,`user_id`,`price`,`start_time`,`end_time`) 
  VALUES ('$Name','$Product_id', '$user_id','$Price','$startTime','$endTime')";
    if (mysqli_query($db, $query)) {
        header("Location: allAuctions.php");
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
                            <div class="card-header">Add New Product</div>
                            <div class="card-body">
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">

                                    <table class="table table-bordered" id="dynamicTable">
                                        <tr>
                                            <th>User</th>
                                            <th>Name</th>
                                            <th>Product</th>
                                            <th>Bid Price</th>
                                            <th>Start Time </th>
                                            <th>End Time</th>
                                            <th>Action</th>
                                        </tr>
                                        
                                        <tr>
                                         
                                        <td><input type="text" name="user[]" placeholder="User" value="<?php echo $user['name'];?>" class="form-control" readonly/></td>
                                        <input type="text" name="user_id[]" placeholder="User" value="<?php echo $user['id'];?>" class="form-control" hidden/>
                                            <td><input type="text" name="Name[]" placeholder="Name" class="form-control" /></td>
                                            <td>
                                                <select name="Product_id[]" class="form-control">
                                                    <?php foreach ($allProducts as $product) : ?>
                                                        <option value="<?php echo $product['id']; ?>">
                                                            <?php echo $product['name']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td><input type="text" name="Price[]" placeholder="Price" class="form-control" /></td>
                                            <td><input type="datetime-local" name="startTime[]" placeholder="Start Time" class="form-control" /></td>
                                            <td><input type="datetime-local" name="endTime[]" placeholder="End Time" class="form-control" /></td>
                                            <!-- <td><input type="text" name="Desc[]" placeholder="Desc" class="form-control" /></td>  
                                                <td><input type="text" name="Type[]" placeholder="Type" class="form-control" /></td>  
                                                <td><input type="text" name="ERG[]" placeholder="ERG" class="form-control" /></td>  
                                                <td><input type="text" name="NMFC[]" placeholder="NMFC" class="form-control" /></td>  
                                                <td><input type="text" name="CLS[]" placeholder="CLS" class="form-control" /></td>  
                                                <td><input type="text" name="NETWGT[]" placeholder="NET WGT" class="form-control" /></td>
                                                <td><input type="text" name="WGT[]" placeholder="NET WGT" class="form-control" /></td> -->
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

<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>`);
    });

    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>