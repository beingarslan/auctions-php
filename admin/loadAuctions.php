<?php
include '../db.php';

// get category name from category id
function getCategoryName($id)
{
    global $db;
    $query = "SELECT * FROM categories WHERE id = $id";
    $result = mysqli_query($db, $query);
    $category = mysqli_fetch_assoc($result);
    return $category['name'];
}

// get product name from product id
function getProductName($id)
{
    global $db;
    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($db, $query);
    $product = mysqli_fetch_assoc($result);
    return $product['name'];
}

// get user name from user id
function getUserName($id)
{
    global $db;
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    return $user['name'];
}

$i = 0;
$sql = "SELECT * from auctions";
$run_query = mysqli_query($db, $sql);
if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {    

        $i++;
        $id = explode(",", $row1['id']);
        $name = explode(",", $row1['name']);
        $product_id = explode(",", $row1['product_id']);
        $user_id = explode(",", $row1['user_id']);
        $price = explode(",", $row1['price']);
        $start_time = explode(",", $row1['start_time']);
        $end_time = explode(",", $row1['end_time']);
        // $erg = explode(",", $row1['erg']);
        // $cyls = explode(",", $row1['cyls']);
        // $lbs_wl_per = explode(",", $row1['lbs_wl_per']);

        echo '
                <td>' . $id[0] . '</td>
                <td> ' . $name[0] . '</td>
                <td><div> ' . getProductName($product_id[0]) . '</div></td>
                <td><div> ' . getUserName($user_id[0]) . '</div></td>
                <td><div> ' . $price[0] .'</div></td>
                <td><div> ' . $start_time[0] . '</div></td>
                <td><div> ' . $end_time[0] . '</div></td>
                <td>
                <a onclick="deleteAuction(' . $row1['id'] . ')"  href="#" class="btn btn-datatable btn-icon btn-transparent-dark" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                </td>
             </tr>';
    }
}

?>
<script>
    // function deleteCategory(id) {
    //  alert()
    // $.post('deleteCategory.php', {
    //     Del_id: id
    // }, function(res) {
    //     window.location.reload();
    // 	alert("Successfully Deleted"); 
    // });
    // }
</script>

