<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';

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
                            <div class="card-header">Add New User </div>
                            <div class="card-body">
                                <form>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-12">
                                            <label class="small mb-1" for="inputFirstName">Full name</label>
                                            <input class="form-control" id="inputFullName" type="text" placeholder="Enter your ful name" />
                                        </div>
                                        <!-- Form Group (last name)-->
                                  
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-12">
                                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" />
                                        </div>
                                        <!-- Form Group (location)-->
                                        
                                    </div>
                                    <!-- Form Group (email address)-->

                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLocation">Password</label>
                                            <input class="form-control" id="inputPassword" type="text" placeholder="Enter your password" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputBirthday">User Role</label>
                                            <select class="form-control" id="inputRole">
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                    <button onclick="addUser();" class="btn btn-primary" type="button">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <button class="btn btn-primary mb-3" id="toastBasicTrigger">Toast Demo</button> -->

            <!-- Toast container -->
            <div style="position: absolute; top: 3rem; right: 1rem;background: #585252;
">
                <!-- Toast -->
                <div class="toast" id="toastBasic" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                    <div class="toast-header" style="    justify-content: end;">
                        <i data-feather="bell"></i>
                        <!-- <strong class="mr-auto">Toast with Autohide</strong> -->
                        <!-- <small class="text-muted ml-2">just now</small> -->
                        <button style="float: right;" class="ml-2 mb-1 btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>
                    </div>
                    <div class="toast-body">User Email Already Exists,Please Try Another one.</div>
                </div>
            </div>
            <div style="position: absolute; top: 3rem; right: 1rem;background: #585252;
">
                <!-- Toast -->
                <div class="toast" id="toastRegistered" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                    <div class="toast-header" style="justify-content: end;">
                        <i data-feather="bell"></i>
                        <!-- <strong class="mr-auto">Toast with Autohide</strong> -->
                        <!-- <small class="text-muted ml-2">just now</small> -->
                        <button style="float: right;" class="ml-2 mb-1 btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>
                    </div>
                    <div class="toast-body">User Successfully Registered</div>
                </div>
            </div>
        </main>
        <?php
        include '../admin/footer.php';
        ?>
    </div>

</div>

<script>
    function addUser() {

        var inputFullName = document.getElementById("inputFullName").value;
        var inputEmailAddress = document.getElementById("inputEmailAddress").value;
        var inputPassword = document.getElementById('inputPassword').value;
        var inputRole = document.getElementById('inputRole').value;



        if (inputFullName == "" ||  inputEmailAddress == "" || inputPassword == "" || inputRole == ""  ) {
            alert("Please fill all the fields");
            return;
        }
        $.ajax({
            type: 'POST',
            url: 'saveUser.php',
            data: {
                inputFullName: inputFullName,
                inputEmailAddress: inputEmailAddress,
                inputPassword: inputPassword,
                inputRole: inputRole

            },
            success: function(res) {
                alert(res);
                if (res == "User Already exists") {
                    $('#toastBasic').toast('show');

                } else if (res == "Successfully Registered!") {
                    $('#toastRegistered').toast('show');
                    setTimeout(function() {
                        window.location.href = "allUsers.php";
                    }, 2000);
                } else {
                    alert("Error");
                }
                // $("#toastBasic").toast("show");

                ///window.location.replace('allUsers.php');
                console.log(res)
            }
        });

    }
</script>