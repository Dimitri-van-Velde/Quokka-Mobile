<?php

// Create ChangepasswordContr class
class ChangepasswordContr extends Changepassword
{

    // Create variables
    private $uid;
    private $currentPassword;
    private $password;
    private $newPassword;
    private $newPasswordRepeat;

    // Construct variables
    public function __construct($uid, $currentPassword, $password, $newPassword, $newPasswordRepeat)
    {
        $this->uid = $uid;
        $this->currentPassword = $currentPassword;
        $this->password = $password;
        $this->newPassword = $newPassword;
        $this->newPasswordRepeat = $newPasswordRepeat;
    }

    // Create doPasswordChange function
    public function doPasswordChange()
    {

        // Error handlers
        // Check if input was empty
        if ($this->emptyInput() == false) {
            header("Location: ../account/wachtwoord-aanpassen.php?error=emptyinput");
            exit();
        }

        // Check if the new passwords match
        if ($this->passwordMatch() == false) {
            header("Location: ../account/wachtwoord-aanpassen.php?error=passwordmatch");
            exit();
        }

        // Check if the new password matches the old one
        if ($this->newPasswordMatchOld() == true) {
            header("Location: ../account/wachtwoord-aanpassen.php?error=oldmatchnew");
            exit();
        }

        // Check if the new password matches the old one
        if ($this->currentPasswordMatch() == false) {
            header("Location: ../account/wachtwoord-aanpassen.php?error=wrongpassword");
            exit();
        }

        // Call changePassword function
        $this->changePassword($this->uid, $this->newPassword);
    }

    // Create emptyInput function
    private function emptyInput()
    {
        
        // Check if an input is empty
        if (empty($this->password) || empty($this->newPassword) || empty($this->newPasswordRepeat)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // Create passwordMatch function
    private function passwordMatch()
    {
       
        // Check if the passwords match
        if ($this->newPassword !== $this->newPasswordRepeat) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // Create newPasswordMatchOld function
    private function newPasswordMatchOld()
    {
        
        // Check if the new password matches the old one
        if (password_verify($this->newPassword, $this->currentPassword) == false) {
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
