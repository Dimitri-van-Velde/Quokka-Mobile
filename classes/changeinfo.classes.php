<?php

// Include database connection
require_once '../php-includes/dbh.inc.php';

// Create Changeinfo class
class Changeinfo extends Dbh
{

    // Create changeInfo function
    protected function changeInfo(
        $uid,
        $firstName,
        $preposition,
        $lastName,
        $postalCode,
        $houseNumber,
        $phoneNumber,
        $birthdate,
        $streetName,
        $cityName
    ) {
        $stmt = $this->connect()->prepare("UPDATE `users` SET firstname = ?, preposition = ?, lastname = ?, streetname = ?, 
        housenumber = ?, postalcode = ?, cityname = ?, phonenumber = ?, birthdate = ?
        WHERE iduser = ?");

        // If the statement failed, give an error
        if (!$stmt->execute(array(
            $firstName, $preposition, $lastName, $streetName,
            $houseNumber, $postalCode, $cityName, $phoneNumber, $birthdate, $uid
        ))) {
            $stmt = null;
            header("Location: ../account/gegevens-aanpassen.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}
