<?php

include_once 'dbh.inc.php';

$dbh = new Dbh;

if (isset(
    $_POST["email"],
    $_POST["password0"],
    $_POST["password1"],
    $_POST["pronoun"],
    $_POST["firstname"],
    $_POST["preposition"],
    $_POST["lastname"],
    $_POST["postalcode"],
    $_POST["housenumber"],
    $_POST["phonenumber"],
    $_POST["birthdate"]
)) {

    // Connect to database
    $dsn = $dbh->connect();

    // Variables
    $email = $_POST["email"];
    $password = $_POST["password0"];

    // Hash Password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $pronoun = $_POST["pronoun"];
    $firstname = $_POST["firstname"];
    $preposition = $_POST["preposition"];
    if($preposition != "") {
        $preposition = $preposition;
    } else {
        $preposition = null;
    }
    $lastname = $_POST["lastname"];
    $postalcode = $_POST["postalcode"];
    $housenumber = $_POST["housenumber"];
    $phonenumber = $_POST["phonenumber"];
    $birthdate = $_POST["birthdate"];
    if($birthdate != "") {
        $birthdate = $birthdate;
    } else {
        $birthdate = null;
    }

    // Query
    $query = "
    INSERT INTO `users` (email, password, pronoun, firstname, preposition, lastname, postalcode, housenumber, phonenumber, birthdate)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ";

    $stmt = $dsn->prepare($query);
    $stmt->execute([$email, $hashedPassword, $pronoun, $firstname, $preposition, $lastname,
     $postalcode, $housenumber, $phonenumber, $birthdate]);

    echo "<script>window.onload = function() {document.getElementById(\"confirm-message\").innerHTML =
         \"Uw account is aangemaakt $firstname!\";}</script>";
}
