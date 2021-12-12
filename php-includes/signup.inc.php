<?php

// Check if submit button was clicked
if (isset($_POST["submit"])) {

    // Variables
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordrepeat"];

    // Hash Password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $pronoun = $_POST["pronoun"];
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

    // Include database connection and signup classes
    include "../php-includes/dbh.inc.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";

    // Create SignupContr instance
    $signup = new SignupContr(
        $email,
        $password,
        $passwordRepeat,
        $pronoun,
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
    $signup->signupUser();

    // Sending user to login page
    session_start();
    $_SESSION["signupemail"] = $email;
    header("Location: ../login.php?signup=success");
}
