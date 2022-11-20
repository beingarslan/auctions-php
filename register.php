<?php
include 'header.php';
include 'head.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
<style>
    body {
        background-image: url("public/images/hero_image2.jpg");
    }
</style>
</head>


<body>

<div class="d-flex flex-column h-100">

<main>
                    <div class="container-xl px-4"  style="margin-top: 50px;">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <!-- Basic registration form-->
                                <div class="card shadow-lg border-0 rounded-lg " style="margin-top: 100px;">
                                    <div class="card-header justify-content-center"><h3 class="fw-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <!-- Registration form-->
                                        <form>
                                            <!-- Form Row-->
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <!-- Form Group (first name)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputFullName">Full Name</label>
                                                        <input class="form-control" id="inputFullName" type="text" placeholder="Enter first name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                                </div>
                                            </div>
                                            <!-- Form Group (email address)            -->
                                          
                                            <!-- Form Row    -->
                                            <div class="row gx-3">
                                                <div class="col-md-12">
                                                    <!-- Form Group (password)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control" id="inputPassword" type="password" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                           
                                       
                                            </div>
                                            <div class="row gx-3">
                                          
                                               
                                                </div>
                                       
                                            </div>
                                            <!-- Form Group (create account submit)-->
                                            <a style="float: right;margin-top: 7%;margin-bottom: 50px;" class="btn btn-primary btn-block" href="#" onclick="registerUser();">Create Account</a>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="index.php">Have an account? Go to login</a></div>
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



if (inputFullName == "" || inputFullName == "0"|| inputEmailAddress == "" ||inputPassword == "" ) {
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
      action : "registerUser"
     
   },
   success: function(res) {
       console.log(res);
       if(res=="Email Already exists, try another one"){
        alert(res);
        location.reload();

       }else if(res=="Successfully Registered"){
           alert(res);
          window.location.replace('index.php');

       }else{
      alert("Something went wrong please try again")

       }
   }
});

}

</script>