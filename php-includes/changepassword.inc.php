<?php
session_start();

// Check if submit button was clicked
if(isset($_POST["submit"])) {

    // Variables
    $uid = $_SESSION["userid"];
    $currentpassword = $_SESSION["currentpassword"];
    $password = $_POST["password"];
    $newpassword = $_POST["newpassword"];
    $newpasswordrepeat = $_POST["newpasswordrepeat"];

    // Include database connection and changeinfo classes
    include "../php-includes/dbh.inc.php";
    include "../classes/changepassword.classes.php";
    include "../classes/changepassword-contr.classes.php";

    // Create ChangepasswordContr instance
    $changeinfo = new ChangepasswordContr($uid, $currentpassword, $password, $newpassword, $newpasswordrepeat);

    // Running error handlers and signing user up
    $changeinfo->doPasswordChange();

    // Sending user to login page
    session_unset();
    session_destroy();
    header("Location: ../login.php?wachtwoordchange=success");

}

?>