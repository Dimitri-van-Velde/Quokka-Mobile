<?php

// Include database connection
require_once '../php-includes/dbh.inc.php';

// Create Changepassword class
class Changepassword extends Dbh
{

    // Create changePassword function
    protected function changePassword($uid, $newPassword)
    {
        $stmt = $this->connect()->prepare("UPDATE `users` SET password = ?
        WHERE iduser = ?");

        // Hash password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // If the statement failed, give an error
        if (!$stmt->execute(array($hashedPassword, $uid))) {
            $stmt = null;
            header("Location: ../account/wachtwoord-aanpassen.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}
