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
                <form action="php-includes/login.inc.php" class="login-form" method="post">
                    <fieldset>
                        <label for="username">Gebruikersnaam: </label>
                        <input type="text" name="username" id="username">
                    </fieldset>
                    <fieldset>
                        <label for="username">Wachtwoord: </label>
                        <input type="password" name="password" id="password">
                    </fieldset>
                    <input type="submit" value="Log In">
                </form>
                <p>Nog geen account? <br><a href="signup.php">Meld u hier aan.</a></p>
            </article>
        </section>
    </main>
    <?php
        include 'footer.html';
    ?>
</body>

</html>