<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
if($_SESSION['loggedinuserrole']=="User") {
    header('Location: ../index.php');
    die();
}
?>
<?php

if (isset($_SESSION['role']) == 'Admin') {
    header("location: admin/dashboard.php");
} elseif (isset($_SESSION['role']) == 'User') {
    header("location: ../index.php");
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
                                    <div class="page-header-icon"><i data-feather="activity"></i></div>
                                    Dashboard
                                </h1>
                            </div>
                            <div class="col-12 col-xl-auto mt-4">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            
        </main>
        <?php
        include '../admin/footer.php';
        ?>
    </div>

</div>