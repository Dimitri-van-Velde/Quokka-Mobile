<?php
require_once '../php-includes/dbh.inc.php';

class Signup extends Dbh {

    protected function setUser($email, $password, $pronoun, $firstname, $preposition, $lastname, $postalcode, $housenumber, $phonenumber, $birthdate) {
        $stmt = $this->connect()->prepare("INSERT INTO `users` (email, password, pronoun, firstname, preposition, lastname, postalcode, housenumber, phonenumber, birthdate)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($email, $hashedPassword, $pronoun, $firstname, $preposition, $lastname, $postalcode, $housenumber, $phonenumber, $birthdate))) {
            $stmt = null;
            header("Location: ../signup.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkEmail($email) {
        $stmt = $this->connect()->prepare("SELECT email FROM users WHERE email = ?");

        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("Location: ../signup.php?error=stmtfailed");
            exit();
        }

        $resultCheck;

        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}