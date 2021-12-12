<?php

// Create SignupContr class
class SignupContr extends Signup
{

    // Create variables
    private $email;
    private $password;
    private $passwordRepeat;
    private $pronoun;
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
        $email,
        $password,
        $passwordRepeat,
        $pronoun,
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
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->pronoun = $pronoun;
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

    // Create signupUser function
    public function signupUser()
    {

        // Check if input was empty
        if ($this->emptyInput() == false) {
            header("Location: ../signup.php?error=emptyinput");
            exit();
        }

        // Check if email is invalid
        if ($this->invalidEmail() == true) {
            header("Location: ../signup.php?error=email");
            exit();
        }

        // Check if the passwords match
        if ($this->passwordMatch() == false) {
            header("Location: ../signup.php?error=passwordmatch");
            exit();
        }

        // Check if the email address is taken
        if ($this->emailTaken() == false) {
            header("Location: ../signup.php?error=emailtaken");
            exit();
        }

        // Call setUser function
        $this->setUser(
            $this->email,
            $this->password,
            $this->pronoun,
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
            empty($this->email) || empty($this->password) || empty($this->passwordRepeat) || empty($this->pronoun) || empty($this->firstName) ||
            empty($this->lastName) || empty($this->postalCode) || empty($this->houseNumber) || empty($this->phoneNumber) || empty($this->streetName) || empty($this->cityName)
        ) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // Create invalidEmail function
    private function invalidEmail()
    {
        
        // Check if email address is valid
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    // Create passwordMatch function
    private function passwordMatch()
    {
        
        // Check if the passwords match
        if ($this->password !== $this->passwordRepeat) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // Create emailTaken function
    private function emailTaken()
    {
        
        // Check if the email exists in the database already
        if (!$this->checkEmail($this->email)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}
