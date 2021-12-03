<?php
require_once '../php-includes/dbh.inc.php';

class Login extends Dbh {

    protected function getUser($email, $password) {
        $stmt = $this->connect()->prepare("SELECT password FROM users WHERE email = ?");

        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("Location: ../login.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            var_dump($stmt);
            header("Location: ../login.php?error=usernotfound");
            exit();
        }

        $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashedPassword[0]["password"]);

        if($checkPassword == false) {
            $stmt = null;
            header("Location: ../login.php?error=wrongpassword");
            exit();
        } elseif($checkPassword == true) {
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");

            if(!$stmt->execute(array($email))) {
                $stmt = null;
                header("Location: ../login.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("Location: ../login.php?error=usernotfound");
                exit();
            }
            
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

            $stmt = null;
        }
    }
}

?>