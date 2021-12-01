<?php

if(isset($_POST["submit"])) {

    // Variables
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Instantiate LoginContr class
    include "../php-includes/dbh.inc.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    $login = new LoginContr($email, $password);

    // Running error handlers and user login
    $login->loginUser();

    // Going back to page
    header("Location: ../account.php");

}

?>