<?php

class SignupContr extends Signup {

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

    public function signupUser() {

        if($this->emptyInput() == false) {
            header("Location: ../signup.php?error=emptyinput");
            exit();
        }

        if($this->invalidEmail() == true) {
            header("Location: ../signup.php?error=email");
            exit();
        }

        if($this->passwordMatch() == false) {
            header("Location: ../signup.php?error=passwordmatch");
            exit();
        }

        if($this->emailTaken() == false) {
            header("Location: ../signup.php?error=emailtaken");
            exit();
        }

        $this->setUser($this->email, $this->password, $this->pronoun, $this->firstname, $this->preposition, 
        $this->lastname, $this->postalcode, $this->housenumber, $this->phonenumber, $this->birthdate);
    }

    private function emptyInput()  {
        $result;

        if(empty($this->email) || empty($this->password) || empty($this->passwordrepeat) || empty($this->pronoun) || empty($this->firstname) ||
        empty($this->lastname) || empty($this->postalcode) || empty($this->housenumber) || empty($this->phonenumber)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidEmail() {
        $result;

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    private function passwordMatch() {
        $result;

        if($this->password !== $this->passwordrepeat) {
            $result = false;
        } else{
            $result = true;
        }

        return $result;
    }

    private function emailTaken() {
        $result;

        if(!$this->checkEmail($this->email)) {
            $result = false;
        } else{
            $result = true;
        }

        return $result;
    }

}

?>