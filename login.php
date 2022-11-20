<?php
include "db.php";
// include 'header.php';
include 'head.php';
?>

<?php
//sign in
if (isset($_POST['loginAttempt'])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($db, $_POST['inputEmailAddress']);
        $password = mysqli_real_escape_string($db, $_POST['inputPassword']);

        $sql = "SELECT * FROM users WHERE  email = '$email' AND password = '$password'";

        $result = mysqli_query($db, $sql);

        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) {

            if ($row['status'] != "Active") {
                echo "<script>
                setTimeout(function() {
                    alert('You are not active, please contact admin');
                    location.href = 'index.php';

                }, 1000);
                </script>";

                exit();
            }
            $userrole =  $row['role'];
            $_SESSION['loggedinusername'] = $row['name'];
            $_SESSION['loggedinuseremail'] = $email;
            $_SESSION['loggedinuserid'] = $row['id'];
            $_SESSION['loggedinuserrole'] = $userrole;



            header("location: admin/dashboard.php");

            //unset($_SESSION['error_accour']);
        } else {
            echo "<script>
                setTimeout(function() {
                    alert('Wrong email or password');
                    location.href = 'index.php';

                }, 1000);
                </script>";

            exit();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-image: url("public/images/hero_image2.jpg");
        }
    </style>
</head>


<body>

    <div class="d-flex flex-column h-100">

        <main>
            <div class="container-xl px-4" style="margin-top: 50px;">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <!-- Basic login form-->
                        <div class="card shadow-lg border-0 rounded-lg" style="margin-top: 100px;">
                            <div class="card-header justify-content-center">
                                <h3 class="fw-light my-4">Login</h3>
                            </div>
                            <div class="card-body">
                                <!-- Login form-->
                                <form method="post">
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control" name="inputEmailAddress" type="email" placeholder="Enter email address" />
                                    </div>
                                    <!-- Form Group (password)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control" name="inputPassword" type="password" placeholder="Enter password" />
                                    </div>
                                    <div style="float: right;" class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <input class="btn btn-primary" value="Login" type="submit" name="loginAttempt" />
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include 'footer.php';
        ?>
    </div>





</body>

</html>
<script>
    function registerUser() {

        var inputFullName = document.getElementById("inputFullName").value;
        var inputEmailAddress = document.getElementById("inputEmailAddress").value;
        var inputPassword = document.getElementById('inputPassword').value;



        if (inputFullName == "" || inputFullName == "0" || inputEmailAddress == "" || inputPassword == "") {
            alert("Please fill all the fields");
            return;
        }
        $.ajax({
            type: 'POST',
            url: 'registerUser.php',
            data: {
                inputFullName: inputFullName,
                inputEmailAddress: inputEmailAddress,
                inputPassword: inputPassword,
                action: "registerUser"

            },
            success: function(res) {
                console.log(res);
                if (res == "Email Already exists, try another one") {
                    alert(res);
                    location.reload();

                } else if (res == "Successfully Registered") {
                    alert(res);
                    window.location.replace('index.php');

                } else {
                    alert("Something went wrong please try again")

                }
            }
        });

    }
</script>