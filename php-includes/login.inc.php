<?php

// Check if submit button was clicked
if (isset($_POST["submit"])) {

    // Variables
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Include database connection and login classes
    include "../php-includes/dbh.inc.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    // Create LoginContr instance
    $login = new LoginContr($email, $password);

    // Running error handlers logging in user
    $login->loginUser();

    // Sending user to account page
    header("Location: ../account.php");
}
