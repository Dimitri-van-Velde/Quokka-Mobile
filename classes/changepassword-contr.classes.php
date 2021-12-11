<?php

// Create ChangepasswordContr class
class ChangepasswordContr extends Changepassword {

    // Create variables
    private $uid;
    private $currentpassword;
    private $password;
    private $newpassword;
    private $newpasswordrepeat;

    // Construct variables
    public function __construct($uid, $currentpassword, $password, $newpassword, $newpasswordrepeat) {
        $this->uid = $uid;
        $this->currentpassword = $currentpassword;
        $this->password = $password;
        $this->newpassword = $newpassword;
        $this->newpasswordrepeat = $newpasswordrepeat;
    }

    // Create doPasswordChange function
    public function doPasswordChange() {

        // Error handlers
        // Check if input was empty
        if($this->emptyInput() == false) {
            header("Location: ../account/wachtwoord-aanpassen.php?error=emptyinput");
            exit();
        }

        // Check if the new passwords match
        if($this->passwordMatch() == false) {
            header("Location: ../account/wachtwoord-aanpassen.php?error=passwordmatch");
            exit();
        }

        // Check if the new password matches the old one
        if($this->newPasswordMatchOld() == true) {
            header("Location: ../account/wachtwoord-aanpassen.php?error=oldmatchnew");
            exit();
        }

        // Check if the new password matches the old one
        if($this->currentPasswordMatch() == false) {
            header("Location: ../account/wachtwoord-aanpassen.php?error=wrongpassword");
            exit();
        }

        // Call changePassword function
        $this->changePassword($this->uid, $this->newpassword);
    }

    // Create emptyInput function
    private function emptyInput()  {
        $result;

        // Check if an input is empty
        if(empty($this->password) || empty($this->newpassword) || empty($this->newpasswordrepeat)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // Create passwordMatch function
    private function passwordMatch() {
        $result;

        // Check if the passwords match
        if($this->newpassword !== $this->newpasswordrepeat) {
            $result = false;
        } else{
            $result = true;
        }

        return $result;
    }

    // Create newPasswordMatchOld function
    private function newPasswordMatchOld() {
        $result;

        // Check if the new password matches the old one
        if(password_verify($this->newpassword, $this->currentpassword) == false) {
            $result = false;
        } else{
            $result = true;
        }

        return $result;
    }

    // Create currentPasswordCheck function
    private function currentPasswordMatch() {
        $result;

        // Check if the new password matches the old one
        if(password_verify($this->password, $this->currentpassword) == false) {
            $result = false;
        } else{
            $result = true;
        }

        return $result;
    }
}

?>