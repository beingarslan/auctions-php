<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../sessions_admin.php';

if($_SESSION['loggedinuserrole']=="User") {
    header('Location: ../index.php');
    die();
}
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="filter"></i></div>
                                    All Categories
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">All Categories</div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                     <th>Created At</th>
                                    <!-- <th>Type</th>
                                    <th>ERG</th>
                                    <th>CLS</th>
                                    <th>WGT</th>
                                    <th>UN</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                
                            <tbody id="WalkEventsList">


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
        <?php
        include '../admin/footer.php';
        ?>
    </div>
    <script>
        loadWalkEvent();

        function loadWalkEvent() {
        
            document.getElementById("WalkEventsList").innerHTML = "";
            $.post('loadCategories.php', {
                ID: "List"
            }, function(res) {
              

                document.getElementById("WalkEventsList").innerHTML = res.trim();
            });
        }

        function deleteCategory(id) {


            $.ajax({
                type: 'POST',
                url: 'deleteCategory.php',
                data: {
                    Del_id: id
                },
                success: function(res) {
                    alert(res);
                    window.location.reload();
                    console.log(res)
                }
            });
        }
    </script>