<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
              
                    <!-- Sidenav Menu Heading (Core)-->
                    <div class="sidenav-menu-heading">Core</div>
                    <!-- Sidenav Accordion (Dashboard)-->
                    <?php

                    if ($_SESSION['loggedinuserrole'] == 'Admin') {

                    ?>
                        <a class="nav-link collapsed" href="dashboard.php">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Dashboard
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Users
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                <a class="nav-link" href="allUsers.php">
                                    All Users
                                    <span class="badge bg-primary-soft text-primary ms-auto">Updated</span>
                                </a>
                                <a class="nav-link" href="addUser.php">Add Users</a>
                            </nav>
                        </div>
                        


                        <!-- Sidenav Accordion (Applications)-->

                        <!-- Sidenav Accordion (Flows)-->
                        <!-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseFlows" aria-expanded="false" aria-controls="collapseFlows">
                            <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                            Records
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseFlows" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="addRecord.php">Add Record</a>
                                <a class="nav-link" href="allRecords.php">All Records</a>
                            </nav>
                        </div> -->
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseFlows1" aria-expanded="false" aria-controls="collapseFlows1">
                            <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                            Ctegories
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseFlows1" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="addCategory.php">Add Category</a>
                                <a class="nav-link" href="allCategories.php">All Categories</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseFlows2" aria-expanded="false" aria-controls="collapseFlows2">
                            <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                            Products
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseFlows2" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="addProduct.php">Add Product</a>
                                <a class="nav-link" href="allProducts.php">All Products</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseFlows3" aria-expanded="false" aria-controls="collapseFlows3">
                            <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                            Auctions
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseFlows3" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="addAuction.php">Add Auctions</a>
                                <a class="nav-link" href="allAuctions.php">All Auctions</a>
                            </nav>
                        </div>


            
      
                    <?php
                    } 
                    ?>

                </div>
            </div>
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title"><?php if (isset($_SESSION['loggedinuseremail'])) {
                                                            echo $_SESSION['loggedinusername'];
                                                        } ?></div>
                </div>
            </div>
        </nav>
    </div>
</div>