
<?php
 include 'db.php';
 include 'head.php';
 include 'header.php';
 // include 'admin/sidebar.php';
 // if($_SESSION['loggedinuserrole']=="User") {
 //     header('Location: ../index.php');
 //     die();
 // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
<style>
    body {
        background-image: url("public/images/hero_image2.jpg");
    }
</style>
</head>


<body>

<div class="d-flex flex-column h-100">

<main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center mt-5">
                            <div class="col-lg-7">
                                <!-- Basic registration form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="fw-light my-4">Account Info</h3></div>
                                    <div class="card-body">
                                        <!-- Registration form-->
                                        <form>
                                            <!-- Form Row-->
                                            <?php
                                            $query = "SELECT * FROM users WHERE id = '".$_SESSION['loggedinuserid']."'"; 
                                            $result = mysqli_query($db, $query);
                                            while($row = mysqli_fetch_assoc($result)) {

                                            ?>
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <!-- Form Group (first name)-->
                                                    <!-- hidden id -->
                                                    <input type="hidden" id="id" value="<?php echo $row['id']; ?>">
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputFullName">Full Name</label>
                                                        <input class="form-control" id="inputFullName" type="text" placeholder="Enter first name" value="<?php echo $row['name']?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" value="<?php echo $row['email']?>" readonly />
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
                                                        <input class="form-control" id="inputPassword" type="text" placeholder="Enter password" value="<?php echo $row['password']?>"/>
                                                    </div>
                                                </div>
                                         \
                                       
                                            </div>
                              
                                            <?php } ?>
                                            <!-- Form Group (create account submit)-->
                                            <a style="float: right;" class="btn btn-primary btn-block" href="#" onclick="UpdateAccount();">Update Account</a>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
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
 function UpdateAccount() {

var inputFullName = document.getElementById("inputFullName").value;
var inputPaymentMethod = document.getElementById("inputPaymentMethod").value;
var inputEmailAddress = document.getElementById("inputEmailAddress").value;
var inputPassword = document.getElementById('inputPassword').value;
var inputPhoneNumber = document.getElementById('inputPhoneNumber').value;
var ConsentToGetEmails = document.getElementById('ConsentToGetEmails').value;
var id = document.getElementById('id').value;
if(ConsentToGetEmails == "on"){
    ConsentToGetEmails = "Yes";
}
else{
    ConsentToGetEmails = "No";
}


if (inputFullName == "" || inputFullName == "0"|| inputEmailAddress == "" ||inputPassword == "" || inputPhoneNumber == "") {
    alert("Please fill all the fields");
    return;
}
$.ajax({
   type: 'POST',
   url: 'registerUser.php',
   data: {
    inputFullName: inputFullName,
    inputPaymentMethod: inputPaymentMethod,
      inputEmailAddress: inputEmailAddress,
      inputPassword: inputPassword,
      inputPhoneNumber: inputPhoneNumber,
      ConsentToGetEmails: ConsentToGetEmails,
        id: id,
        action: "update"
     
   },
   success: function(res) {
       console.log(res);
       if(res=="Email Already exists, try another one"){
        alert(res);
        location.reload();

       }else if(res=="Successfully Updated"){
           alert(res);
          window.location.replace('index.php');

       }else{
      alert("Something went wrong please try again")

       }
   }
});

}

</script>