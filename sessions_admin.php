
<!-- check session -->
<?php
session_start();
if (!isset($_SESSION['loggedinuseremail'])) {
    // check user role 
    if ($_SESSION['loggedinuserrole'] == "User") {
        // destrioy all session
        session_destroy();
        // redirect to login page
        header("Location: home.php");
    }    
}
?>