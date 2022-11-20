<?php


include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';
if ($_SESSION['loggedinuserrole'] == "User") {
    header('Location: ../index.php');
    die();
}

if (isset($_POST['update'])) {

   //  Name of Walk: e.g. Watcombe to Sheldon
    // Date: e.g. 23/02/2022
    // Start time: e.g. 10.30am
    // End time: e.g. 15.30pm
    // Meeting point: e.g. Watcombe Car Park
    // Distance in kilometres: e.g. 9
    // Name of leader: e.g. Helen Smith
    // Comments: e.g. Grade A walk with steep hills
    // Status: e.g. Proposed, Approved or Rejected. 
    $id = $_POST['id'];
    $walk_event_name = $_POST['walk_event_name'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $meeting_point = $_POST['meeting_point'];
    $distance = $_POST['distance'];
    $leader_name = $_POST['leader_name'];
    $comments = $_POST['comments'];
    $status = $_POST['status'];

    $updateQuery = "UPDATE walk_events SET walk_event_name = '$walk_event_name', date = '$date', start_time = '$start_time', end_time = '$end_time', meeting_point = '$meeting_point', distance = '$distance', leader_name = '$leader_name', comments = '$comments', status = '$status' WHERE id = $id";

        if (mysqli_query($db, $updateQuery)) {

            header("Location: allWalkEvents.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }

?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>

            <div class="container-xl px-12 mt-12">

                <div style="justify-content: center;margin-top: 20px" class="row">

                    <div class="col-xl-10">
                        <div class="card mb-4">
                            <div class="card-header">Edit Product Details</div>
                            <div class="card-body">
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                                    <?php
                                //  Name of Walk: e.g. Watcombe to Sheldon
                                    // Date: e.g. 23/02/2022
                                    // Start time: e.g. 10.30am
                                    // End time: e.g. 15.30pm
                                    // Meeting point: e.g. Watcombe Car Park
                                    // Distance in kilometres: e.g. 9
                                    // Name of leader: e.g. Helen Smith
                                    // Comments: e.g. Grade A walk with steep hills
                                    // Status: e.g. Proposed, Approved or Rejected. 
                                    $sql = "SELECT * from walk_events  where id='" . $_GET['id'] . "' ";
                                    $query = mysqli_query($db, $sql);

                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($query)) {
                                    ?>
                                            <div class="row gx-3 mb-3">
                                            <input required type="hidden" name="id" id="id" value="<?= $_GET['id'] ?>">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Name of Walk">Name of Walk</label>
                                                        <input required type="text" class="form-control" id="inputProductName" name="walk_event_name" value="<?= $row1['walk_event_name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Date">Date</label>
                                                        <input required type="date" class="form-control" id="inputProductName" name="date" value="<?= $row1['date'] ?>" placeholder="<?= $row1['date'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Start time">Start time</label>
                                                        <input required type="time" class="form-control" id="inputProductName" name="start_time" value="<?= $row1['start_time'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="End time">End time</label>
                                                        <input required type="time" class="form-control" id="inputProductName" name="end_time" value="<?= $row1['end_time'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Meeting point">Meeting point</label>
                                                        <input required type="text" class="form-control" id="inputProductName" name="meeting_point" value="<?= $row1['meeting_point'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Distance in kilometres">Distance in kilometres</label>
                                                        <input required type="text" class="form-control" id="inputProductName" name="distance" value="<?= $row1['distance'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Name of leader">Name of leader</label>
                                                        <input required type="text" class="form-control" id="inputProductName" name="leader_name" value="<?= $row1['leader_name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Comments">Comments</label>
                                                        <input required type="text" class="form-control" id="inputProductName" name="comments" value="<?= $row1['comments'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Status">Status</label>
                                                        <!-- status: e.g. Proposed, Approved or Rejected-->
                                                        <select required class="form-control" id="inputProductName" name="status">
                                                         <?php if ($row1['status'] == 'Proposed') : ?>
                                                            <option value="Proposed" selected>Proposed</option>
                                                            <option value="Approved">Approved</option>
                                                            <option value="Rejected">Rejected</option>
                                                        <?php elseif ($row1['status'] == 'Approved') : ?>
                                                            <option value="Proposed">Proposed</option>
                                                            <option value="Approved" selected>Approved</option>
                                                            <option value="Rejected">Rejected</option>
                                                        <?php elseif($row1['status'] == 'Rejected') : ?>
                                                            <option value="Proposed">Proposed</option>
                                                            <option value="Approved">Approved</option>
                                                            <option value="Rejected" selected>Rejected</option>
                                                        <?php else: ?>
                                                            <option value="Proposed">Proposed</option>
                                                            <option value="Approved">Approved</option>
                                                            <option value="Rejected">Rejected</option>
                                                        <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                  <!-- Save changes button-->
                            <input class="btn btn-primary mt-4" name="update" type="submit" value="Save changes">
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
</div>
</main>

</div>

