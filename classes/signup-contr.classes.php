<?php

// Create SignupContr class
class SignupContr extends Signup {

    // Create variables
    private $email;
    private $password;
    private $passwordrepeat;
    private $pronoun;
    private $firstname;
    private $preposition;
    private $lastname;
    private $postalcode;
    private $housenumber;
    private $phonenumber;
    private $birthdate;

    // Construct variables
    public function __construct($email, $password, $passwordrepeat, $pronoun, $firstname, $preposition, $lastname, $postalcode, $housenumber, $phonenumber, $birthdate) {
        $this->email = $email;
        $this->password = $password;
        $this->passwordrepeat = $passwordrepeat;
        $this->pronoun = $pronoun;
        $this->firstname = $firstname;
        $this->preposition = $preposition;
        $this->lastname = $lastname;
        $this->postalcode = $postalcode;
        $this->housenumber = $housenumber;
        $this->phonenumber = $phonenumber;
        $this->birthdate = $birthdate;
    }

    // Create signupUser function
    public function signupUser() {

        // Check if input was empty
        if($this->emptyInput() == false) {
            header("Location: ../signup.php?error=emptyinput");
            exit();
        }

        // Check if email is invalid
        if($this->invalidEmail() == true) {
            header("Location: ../signup.php?error=email");
            exit();
        }

        // Check if the passwords match
        if($this->passwordMatch() == false) {
            header("Location: ../signup.php?error=passwordmatch");
            exit();
        }

        // Check if the email address is taken
        if($this->emailTaken() == false) {
            header("Location: ../signup.php?error=emailtaken");
            exit();
        }

        // Call setUser function
        $this->setUser($this->email, $this->password, $this->pronoun, $this->firstname, $this->preposition, 
        $this->lastname, $this->postalcode, $this->housenumber, $this->phonenumber, $this->birthdate);
    }

    // Create emptyInput function
    private function emptyInput()  {
        $result;

        // Check if an input is empty
        if(empty($this->email) || empty($this->password) || empty($this->passwordrepeat) || empty($this->pronoun) || empty($this->firstname) ||
        empty($this->lastname) || empty($this->postalcode) || empty($this->housenumber) || empty($this->phonenumber)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // Create invalidEmail function
    private function invalidEmail() {
        $result;

        // Check if email address is valid
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    // Create passwordMatch function
    private function passwordMatch() {
        $result;

        // Check if the passwords match
        if($this->password !== $this->passwordrepeat) {
            $result = false;
        } else{
            $result = true;
        }

        return $result;
    }

    // Create emailTaken function
    private function emailTaken() {
        $result;

        // Check if the email exists in the database already
        if(!$this->checkEmail($this->email)) {
            $result = false;
        } else{
            $result = true;
        }

        return $result;
    }

}

?>