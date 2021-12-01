<?php

class Dbh {

    // Variables
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    // Connect function
    public function connect() {
        // Set Variable information
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "quokka_mobile";
        $this->charset = "utf8mb4";

        // Error Try-Catch
        try {

            // Define DSN
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;

            // Define PDO
            $pdo = new PDO($dsn, $this->username, $this->password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;

        } catch (PDOException $e) {
            print "Connection failed: ".$e->getMessage();
            die();
        }
    }

}

?>