<?php
    session_start();
    if(!isset($_SESSION["userid"])) {
        header("Location: login.php?redirect=account");
    }
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <?php
        include 'head.html';
    ?>
</head>

<body>
    <?php
        include 'nav.php';
    ?>
    <main>
        <section>
            <?php 
                if(isset($_SESSION["userid"])) {
            ?>
                <?php 
                    echo "<center>";
                    echo "<h2>Welkom " . $_SESSION["firstname"] . "!</h2>";
                    echo $_SESSION["email"] . "<br>";
                    echo $_SESSION["created_at"] . "<br>";
                    echo $_SESSION["pronoun"] . "<br>";
                    echo $_SESSION["firstname"] . "<br>";
                    echo $_SESSION["preposition"] . "<br>";
                    echo $_SESSION["lastname"] . "<br>";
                    echo $_SESSION["postalcode"] . "<br>";
                    echo $_SESSION["housenumber"] . "<br>";
                    echo $_SESSION["phonenumber"] . "<br>";
                    echo $_SESSION["birthdate"] . "<br>";
                    echo "<br><b>";
                ?>
                <a href="php-includes/logout.inc.php">Log Out</a>
            <?php
                echo "</b></center>";
                }
            ?>
        </section>
    </main>
    <?php
        include 'footer.html';
    ?>
</body>

</html>