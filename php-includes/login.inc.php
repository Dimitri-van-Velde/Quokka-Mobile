<?php

include_once 'dbh.inc.php';

$dbh = new Dbh;

  if(isset(
      $_POST["email"],
      $_POST["password"]
  )) {
    
      // Connect to database
      $dsn = $dbh->connect();

      $email = $_POST["email"];

      $query = "
      SELECT * FROM `users` WHERE `email` = \"$email\"
      ";

      //echo $_POST["email"]." <br>";

      $result = $dsn->query($query);

      $user = $result->fetchAll();

      if(empty($user)) {
        echo "<script>window.onload = function() {document.getElementById(\"login-message\").innerHTML =
          \"Dit e-mailadres bestaat niet in onze database!\";}</script>";
      } else {

        foreach($result as $row) {

          //var_dump($row);

          if(password_verify($_POST['password'], $row["password"])) {

            $firstname = $row["firstname"];

            echo "<script>window.onload = function() {document.getElementById(\"login-message\").innerHTML =
              \"Het inloggen was succesvol! Welkom $firstname!\";}</script>";
          } else {
            echo "<script>window.onload = function() {document.getElementById(\"login-message\").innerHTML =
              \"Verkeerd wachtwoord!\";}</script>";
          }
        } 
      }
  }
?>