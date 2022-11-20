<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
        <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.php">Auction site </a>
        <!-- Navbar Items-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Products <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li> -->
    </ul>
   
  </div>
        <ul class="navbar-nav align-items-center ms-auto">
            <!-- Documentation Dropdown-->
            <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->

            <?php
            if (isset($_SESSION['loggedinuseremail'])) {
            ?>
                <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="public/assets/img/illustrations/profiles/profile-1.png" /></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="public/assets/img/illustrations/profiles/profile-1.png" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name"><?php if (isset($_SESSION['loggedinuseremail'])) {
                                                                            echo $_SESSION['loggedinusername'];
                                                                        } ?></div>
                                <div class="dropdown-user-details-email"><?php if (isset($_SESSION['loggedinuseremail'])) {
                                                                                echo $_SESSION['loggedinuseremail'];
                                                                            } ?></div>

                            </div>
                        </h6>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="addUserWalkEvent.php">
                            <div class="dropdown-item-icon"><i data-feather="plus-circle"></i></div>
                            Add Walk Event

                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="allUserWalkEvents.php">
                            <div class="dropdown-item-icon"><i data-feather="layers"></i></div>
                            All Walk Events

                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="userProfile.php?id=<?php echo $_SESSION['loggedinuserid'] ?> ">
                            <div class="dropdown-item-icon"><i data-feather="user"></i></div>
                            Profile

                        </a>
                        <?php if (isset($_SESSION['loggedinuserrole'])) {
                            if ($_SESSION['loggedinuserrole'] == "Admin") {

                        ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="admin/dashboard.php">
                                    <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                                    Go to admin
                                </a>
                        <?php }
                        } ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </a>
                    </div>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="public/assets/img/illustrations/profiles/profile-1.png" /></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="public/assets/img/illustrations/profiles/profile-1.png" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">Guest</div>
                                <div class="dropdown-user-details-email">Guest</div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.php">
                            <div class="dropdown-item-icon"><i data-feather="user"></i></div>
                            Login
                        </a>
                        <a class="dropdown-item" href="register.php">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Register
                        </a>
                    </div>
                </li>
            <?php
            }
            ?>
            <!-- <nav>
			<ul> -->
				
			<!-- </ul>
		</nav> -->

        </ul>
    </nav>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');

        * {
            padding: 0px;
            margin: 0px
        }

        .icon {
            cursor: pointer;
            margin-right: 50px;
            line-height: 60px
        }

        .icon span {
            background: #f00;
            padding: 7px;
            border-radius: 50%;
            color: #fff;
            vertical-align: top;
            margin-left: -25px
        }

        .icon img {
            display: inline-block;
            width: 20px;
            margin-top: 4px
        }

        .icon:hover {
            opacity: .7
        }

        .logo {
            flex: 1;
            margin-left: 50px;
            color: #eee;
            font-size: 20px;
            font-family: monospace
        }

        .notifications {
            width: 300px;
            height: 0px;
            opacity: 0;
            position: absolute;
            top: 63px;
            right: 62px;
            border-radius: 5px 0px 5px 5px;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
        }

        .notifications h2 {
            font-size: 14px;
            padding: 10px;
            border-bottom: 1px solid #eee;
            color: #999
        }

        .notifications h2 span {
            color: #f00
        }

        .notifications-item {
            display: flex;
            border-bottom: 1px solid #eee;
            padding: 6px 9px;
            margin-bottom: 0px;
            cursor: pointer
        }

        .notifications-item:hover {
            background-color: #eee
        }

        .notifications-item img {
            display: block;
            width: 50px;
            height: 50px;
            margin-right: 9px;
            border-radius: 50%;
            margin-top: 2px
        }

        .notifications-item .text h4 {
            color: #777;
            font-size: 16px;
            margin-top: 3px
        }

        .notifications-item .text p {
            color: #aaa;
            font-size: 12px
        }
    </style>

    <script>
        $(document).ready(function() {




            var down = false;

            $('#bell').click(function(e) {

                var color = $(this).text();
                if (down) {

                    $('#box').css('height', '0px');
                    $('#box').css('opacity', '0');
                    down = false;
                } else {

                    $('#box').css('height', 'auto');
                    $('#box').css('opacity', '1');
                    down = true;

                }

            });

        });
    </script>