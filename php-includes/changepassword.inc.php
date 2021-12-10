<?php
session_start();

// Check if submit button was clicked
if(isset($_POST["submit"])) {

    // Variables
    $uid = $_SESSION["userid"];
    $password = $_POST["password"];
    $password = $_POST["newpassword"];
    $password = $_POST["newpasswordrepeat"];

    // Include database connection and changeinfo classes
    include "../php-includes/dbh.inc.php";
    include "../classes/changeinfo.classes.php";
    include "../classes/changeinfo-contr.classes.php";

    // Create ChangeinfoContr instance
    $changeinfo = new ChangeinfoContr($uid, $firstname, $preposition, $lastname, $postalcode, 
    $housenumber, $phonenumber, $birthdate, $streetname, $cityname);

    // Running error handlers and signing user up
    $changeinfo->doInfoChange();

    // Sending user to login page
    session_start();
    header("Location: ../account/gegevens-aanpassen.php?infochange=success");

}

?>