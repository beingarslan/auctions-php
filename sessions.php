<!-- check session -->
<?php
session_start();
// echo $_SESSION['loggedinuseremail'];
if (isset($_SESSION['loggedinuseremail'])) {
    // check user role 
    if ($_SESSION['loggedinuserrole'] != "User") {
        // destrioy all session
        session_destroy();

        session_destroy('loggedinuseremail');
        session_destroy('loggedinusername');
        session_destroy('loggedinuserid');
        session_destroy('loggedinuserrole');

        // redirect to login page
        header("Location: index.php");
    }
} else {
    // redirect to login page
    header("Location: index.php");
}
?>