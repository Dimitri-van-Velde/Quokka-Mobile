<?php

// Create LoginContr class
class LoginContr extends Login {

    // Create variables
    private $email;
    private $password;

    // Construct variables
    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    // Create loginUser function
    public function loginUser() {

        // If there was no input, give an error
        if($this->emptyInput() == false) {
            header("Location: ../login.php?error=emptyinput");
            exit();
        }

        // Call getUser function
        $this->getUser($this->email, $this->password);
    }

    // Create emptyInput function
    private function emptyInput()  {
        $result;

        // Check if there was no input
        if(empty($this->email) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}

?>