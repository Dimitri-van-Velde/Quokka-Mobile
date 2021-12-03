<?php
// Include database connection
require_once '../php-includes/dbh.inc.php';

// Create Signup class
class Signup extends Dbh {

    // Create setUser function
    protected function setUser($email, $password, $pronoun, $firstname, $preposition, $lastname, $postalcode, $housenumber, $phonenumber, $birthdate) {
        $stmt = $this->connect()->prepare("INSERT INTO `users` (email, password, pronoun, firstname, preposition, lastname, postalcode, housenumber, phonenumber, birthdate)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // If the statement failed, give an error
        if(!$stmt->execute(array($email, $hashedPassword, $pronoun, $firstname, $preposition, $lastname, $postalcode, $housenumber, $phonenumber, $birthdate))) {
            $stmt = null;
            header("Location: ../signup.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    // Create checkEmail function
    protected function checkEmail($email) {
        $stmt = $this->connect()->prepare("SELECT email FROM users WHERE email = ?");

        // If the statement failed, give an error
        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("Location: ../signup.php?error=stmtfailed");
            exit();
        }

        $resultCheck;

        // If no results were found, give an error
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}

?>