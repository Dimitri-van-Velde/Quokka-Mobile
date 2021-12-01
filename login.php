<?php 
    session_start();
    require_once 'php-includes/login.inc.php'; 
?>

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
        include 'nav.php';
    ?>
    <main>
        <section>
            <article>
                <?php 
                    if(isset($_SESSION["userid"])) {
                ?>
                    <form action="php-includes/login.inc.php" class="login-form" method="post">
                        <fieldset class="login-info">
                            <h2>U bent al ingelogd!</h2>
                            <p>Ga <a href="account.php">hier</a> naar uw account.</p>
                        </fieldset>
                    </form>
                <?php
                    } else {
                ?>                            
                    <form action="php-includes/login.inc.php" class="login-form" method="post">
                        <fieldset class="login-info">
                            <h2>Log In</h2>
                            <fieldset>
                                <input type="email" name="email" id="email" tabindex="1" autofocus placeholder="E-mailadres"> 
                            </fieldset>
                            <fieldset>
                                <input type="password" name="password" id="password" tabindex="2" placeholder="Wachtwoord">
                            </fieldset>
                            <input type="submit" name="submit" value="Log In">
                            <p>Nog geen account? <br><a href="signup.php">Meld u hier aan.</a></p>
                        </fieldset>
                    </form>
                <?php
                    }
                ?>
            </article>
        </section>
    </main>
    <?php
        include 'footer.html';
    ?>
</body>

</html>