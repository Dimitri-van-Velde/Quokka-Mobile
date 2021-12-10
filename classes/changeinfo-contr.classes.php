<?php

// Create ChangeinfoContr class
class ChangeinfoContr extends Changeinfo {

    // Create variables
    private $uid;
    private $firstname;
    private $preposition;
    private $lastname;
    private $postalcode;
    private $housenumber;
    private $phonenumber;
    private $birthdate;
    private $streetname;
    private $cityname;

    // Construct variables
    public function __construct($uid, $firstname, $preposition, $lastname, $postalcode, 
    $housenumber, $phonenumber, $birthdate, $streetname, $cityname) {
        $this->uid = $uid;
        $this->firstname = $firstname;
        $this->preposition = $preposition;
        $this->lastname = $lastname;
        $this->postalcode = $postalcode;
        $this->housenumber = $housenumber;
        $this->phonenumber = $phonenumber;
        $this->birthdate = $birthdate;
        $this->streetname = $streetname;
        $this->cityname = $cityname;
    }

    // Create doInfoChange function
    public function doInfoChange() {

        // Check if input was empty
        if($this->emptyInput() == false) {
            header("Location: ../account/gegevens-aanpassen.php?error=emptyinput");
            exit();
        }

        // Call setUser function
        $this->changeInfo($this->uid, $this->firstname, $this->preposition, $this->lastname, $this->postalcode, 
        $this->housenumber, $this->phonenumber, $this->birthdate, $this->streetname, $this->cityname);
    }

    // Create emptyInput function
    private function emptyInput()  {
        $result;

        // Check if an input is empty
        if(empty($this->firstname) || empty($this->lastname) || empty($this->postalcode) || empty($this->housenumber) || 
        empty($this->phonenumber) || empty($this->streetname) || empty($this->cityname)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}

?>