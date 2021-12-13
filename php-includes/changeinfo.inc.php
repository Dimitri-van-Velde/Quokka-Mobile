<?php
session_start();

// Check if submit button was clicked
if (isset($_POST["submit"])) {

    // Variables
    $uid = $_SESSION["userid"];
    $currentPassword = $_SESSION["currentpassword"];
    $password = $_POST["password"];
    $firstName = $_POST["firstname"];
    $preposition = $_POST["preposition"];
    if ($preposition != "") {
        $preposition = $preposition;
    } else {
        $preposition = null;
    }
    $lastName = $_POST["lastname"];
    $postalCode = $_POST["postalcode"];
    $houseNumber = $_POST["housenumber"];
    $phoneNumber = $_POST["phonenumber"];
    $birthdate = $_POST["birthdate"];
    if ($birthdate != "") {
        $birthdate = $birthdate;
    } else {
        $birthdate = null;
    }
    $streetName = $_POST["streetname"];
    $cityName = strtoupper($_POST["cityname"]);

    // Include database connection and changeinfo classes
    include "../php-includes/dbh.inc.php";
    include "../classes/changeinfo.classes.php";
    include "../classes/changeinfo-contr.classes.php";

    // Create ChangeinfoContr instance
    $changeinfo = new ChangeinfoContr(
        $uid,
        $currentPassword,
        $password,
        $firstName,
        $preposition,
        $lastName,
        $postalCode,
        $houseNumber,
        $phoneNumber,
        $birthdate,
        $streetName,
        $cityName
    );

    // Running error handlers and signing user up
    $changeinfo->doInfoChange();

    // Sending user to gegevens page
    session_unset();
    session_destroy();
    header("Location: ../login.php?infochange=success");
}
