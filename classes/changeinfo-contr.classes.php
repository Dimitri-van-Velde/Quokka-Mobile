<?php

// Create ChangeinfoContr class
class ChangeinfoContr extends Changeinfo
{

    // Create variables
    private $uid;
    private $currentPassword;
    private $password;
    private $firstName;
    private $preposition;
    private $lastName;
    private $postalCode;
    private $houseNumber;
    private $phoneNumber;
    private $birthdate;
    private $streetName;
    private $cityName;

    // Construct variables
    public function __construct(
        $uid,
        $currentPassword,
        $password,
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
        $this->uid = $uid;
        $this->currentPassword = $currentPassword;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->preposition = $preposition;
        $this->lastName = $lastName;
        $this->postalCode = $postalCode;
        $this->houseNumber = $houseNumber;
        $this->phoneNumber = $phoneNumber;
        $this->birthdate = $birthdate;
        $this->streetName = $streetName;
        $this->cityName = $cityName;
    }

    // Create doInfoChange function
    public function doInfoChange()
    {

        // Check if input was empty
        if ($this->emptyInput() == false) {
            header("Location: ../account/gegevens-aanpassen.php?error=emptyinput");
            exit();
        }

        // Check if the new password matches the old one
        if ($this->currentPasswordMatch() == false) {
            header("Location: ../account/gegevens-aanpassen.php?error=wrongpassword");
            exit();
        }

        // Call setUser function
        $this->changeInfo(
            $this->uid,
            $this->firstName,
            $this->preposition,
            $this->lastName,
            $this->postalCode,
            $this->houseNumber,
            $this->phoneNumber,
            $this->birthdate,
            $this->streetName,
            $this->cityName
        );
    }

    // Create emptyInput function
    private function emptyInput()
    {

        // Check if an input is empty
        if (
            empty($this->firstName) || empty($this->lastName) || empty($this->postalCode) || empty($this->houseNumber) ||
            empty($this->phoneNumber) || empty($this->streetName) || empty($this->cityName) || empty($this->password)
        ) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // Create currentPasswordCheck function
    private function currentPasswordMatch()
    {
        
        // Check if the new password matches the old one
        if (password_verify($this->password, $this->currentPassword) == false) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}
