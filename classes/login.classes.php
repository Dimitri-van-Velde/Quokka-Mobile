<?php
// Include database connection
require_once '../php-includes/dbh.inc.php';

// Create Login class
class Login extends Dbh {

    // Create getUser function
    protected function getUser($email, $password) {
        $stmt = $this->connect()->prepare("SELECT password FROM users WHERE email = ?");

        // If the statement failed, give an error
        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("Location: ../login.php?error=stmtfailed");
            exit();
        }

        // If no results were found, give an error
        if($stmt->rowCount() == 0) {
            $stmt = null;
            var_dump($stmt);
            header("Location: ../login.php?error=usernotfound");
            exit();
        }

        // Hash and check password
        $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashedPassword[0]["password"]);

        // If the passwords don't match, give an error
        if($checkPassword == false) {
            $stmt = null;
            header("Location: ../login.php?error=wrongpassword");
            exit();
        } elseif($checkPassword == true) { //If the passwords match, get user info
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");

            // If the statement failed, give an error
            if(!$stmt->execute(array($email))) {
                $stmt = null;
                header("Location: ../login.php?error=stmtfailed");
                exit();
            }

            // If no results were found, give an error
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("Location: ../login.php?error=usernotfound");
                exit();
            }
            
            // Get all the users information
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Start session and set session values
            session_start();
            $_SESSION["userid"] = $user[0]["iduser"];
            $_SESSION["email"] = $user[0]["email"];
            $_SESSION["created_at"] = $user[0]["created_at"];
            $_SESSION["pronoun"] = $user[0]["pronoun"];
            $_SESSION["firstname"] = $user[0]["firstname"];
            $_SESSION["preposition"] = $user[0]["preposition"];
            $_SESSION["lastname"] = $user[0]["lastname"];
            $_SESSION["postalcode"] = $user[0]["postalcode"];
            $_SESSION["housenumber"] = $user[0]["housenumber"];
            $_SESSION["phonenumber"] = $user[0]["phonenumber"];
            $_SESSION["birthdate"] = $user[0]["birthdate"];
            $_SESSION["perms"] = $user[0]["perms"];
            $_SESSION["streetname"] = $user[0]["streetname"];
            $_SESSION["cityname"] = $user[0]["cityname"];
            $_SESSION["currentpassword"] = $user[0]["password"];

            $stmt = null;
        }
    }
}

?>