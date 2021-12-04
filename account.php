<?php
    session_start();
    if(!isset($_SESSION["userid"])) {
        header("Location: login.php?redirect=account");
    } else {
        header("Location: account/overzicht.php");
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
            
        </section>
    </main>
    <?php
        include 'footer.html';
    ?>
</body>

</html>