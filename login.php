<?php require_once 'php-includes/login.inc.php'; ?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <?php
        include 'head.html';
    ?>
</head>

<body>
    <?php
        include 'nav.html';
    ?>
    <main>
        <section>
            <article class="login">
                <form action="login.php" class="login-form" method="post">
                    <fieldset>
                        <label for="email">E-mailadres: </label>
                        <input type="text" name="email" id="email" required>
                    </fieldset>
                    <fieldset>
                        <label for="username">Wachtwoord: </label>
                        <input type="password" name="password" id="password" required>
                    </fieldset>
                    <input type="submit" value="Log In">
                </form>
                <p>Nog geen account? <br><a href="signup.php">Meld u hier aan.</a></p>
                <p id="login-message"></p>
            </article>
        </section>
    </main>
    <?php
        include 'footer.html';
    ?>
</body>

</html>