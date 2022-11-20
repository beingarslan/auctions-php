
<!-- check session -->
<?php
session_start();
if (!isset($_SESSION['loggedinuseremail'])) {
    // check user role 
    if ($_SESSION['loggedinuserrole'] == "Admin") {
        // destrioy all session
        session_destroy();
        // redirect to login page
        header("Location: index.php");
    }    
}
?>