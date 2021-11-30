<?php

include_once 'dbh.inc.php';

$dbh = new Dbh;

  if(isset(
      $_POST["email"],
      $_POST["password"]
  )) {
    
      // Connect to database
      $dsn = $dbh->connect();

      // Get email input
      $email = $_POST["email"];

      // Create Query
      $query = "
      SELECT * FROM `users` WHERE `email` = \"$email\"
      ";

      // Send and get results
      $result = $dsn->query($query);
      $user = $result->fetchAll();

      // Check if inputs are right
      if(empty($user)) { 
        // Wrong email address

        // Echo to screen
        echo "<script>window.onload = function() {document.getElementById(\"login-message\").innerHTML =
          \"Dit e-mailadres bestaat niet in onze database!\";}</script>";
      } else {

        if(password_verify($_POST['password'], $user[0]["password"])) { 
          //Correct login

          $firstname = $user[0]["firstname"];

          //header("Location: account.php");
          echo "<script>window.onload = function() {document.getElementById(\"login-message\").innerHTML =
            \"Het inloggen was succesvol! Welkom $firstname!\";}</script>";
        } else {
          //Wrong password

          echo "<script>window.onload = function() {document.getElementById(\"login-message\").innerHTML =
            \"Verkeerd wachtwoord!\";}</script>";
        }
      } 
      
  }
?>