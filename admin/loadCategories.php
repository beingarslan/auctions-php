<?php
include '../db.php';

$i = 0;
$sql = "SELECT * from categories";
$run_query = mysqli_query($db, $sql);
if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {    

        $i++;
        $id = explode(",", $row1['id']);
        $name = explode(",", $row1['name']);
        $description = explode(",", $row1['description']);
        $created_at = explode(",", $row1['created_at']);
        // $erg = explode(",", $row1['erg']);
        // $cyls = explode(",", $row1['cyls']);
        // $lbs_wl_per = explode(",", $row1['lbs_wl_per']);

        echo '
                <td>' . $id[0] . '</td>
                <td> ' . $name[0] . '</td>
                <td><div> ' . $description[0] . '</div></td>
                <td><div> ' . $created_at[0] . '</div></td>
                <td>
                <a href="editCategory.php?id=' . $row1['id'] . '" class="btn btn-datatable btn-icon btn-transparent-dark me-2"title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a>
                <a onclick="deleteCategory(' . $row1['id'] . ')"  href="#" class="btn btn-datatable btn-icon btn-transparent-dark" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
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

