<?php

if(isset($_POST["submit"])) {

    // Variables
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordrepeat = $_POST["passwordrepeat"];

    // Hash Password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $pronoun = $_POST["pronoun"];
    $firstname = $_POST["firstname"];
    $preposition = $_POST["preposition"];
    // if($preposition != "") {
    //     $preposition = $preposition;
    // } else {
    //     $preposition = null;
    // }
    $lastname = $_POST["lastname"];
    $postalcode = $_POST["postalcode"];
    $housenumber = $_POST["housenumber"];
    $phonenumber = $_POST["phonenumber"];
    $birthdate = $_POST["birthdate"];
    // if($birthdate != "") {
    //     $birthdate = $birthdate;
    // } else {
    //     $birthdate = null;
    // }

    // Instantiate SignupContr class
    include "../php-includes/dbh.inc.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";

    $signup = new SignupContr($email, $password, $passwordrepeat, $pronoun, $firstname, $preposition, $lastname, $postalcode, $housenumber, $phonenumber, $birthdate);

    // Running error handlers and user signup
    $signup->signupUser();

    // Going back to page
    header("Location: ../signup.php?error=none");

}

?>