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
            <article class="login-article">
                <?php
                if (isset($_SESSION["userid"])) {
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
                            <?php
                            if (isset($_GET["signup"])) {
                                if ($_GET["signup"] == "success") {
                            ?>
                                    <span class="login-check-message"><img src="images/check.svg" alt="Check Icon">
                                        <p>Uw account is aangemaakt! U kunt hier onder inloggen.</p>
                                    </span>
                            <?php
                                }
                            }
                            ?>
                            <?php
                            if (isset($_GET["wachtwoordchange"])) {
                                if ($_GET["wachtwoordchange"] == "success") {
                            ?>
                                    <span class="login-check-message"><img src="images/check.svg" alt="Check Icon">
                                        <p>Uw wachtwoord is succesvol aangepast! U kunt hier onder met uw nieuwe wachtwoord inloggen.</p>
                                    </span>
                            <?php
                                }
                            }
                            ?>
                            <?php
                            if (isset($_GET["infochange"])) {
                                if ($_GET["infochange"] == "success") {
                            ?>
                                    <span class="login-check-message"><img src="images/check.svg" alt="Check Icon">
                                        <p>Uw informatie is succesvol aangepast! Log hieronder in om de veranderingen te zien.</p>
                                    </span>
                            <?php
                                }
                            }
                            ?>
                            <?php
                            if (isset($_GET["redirect"])) {
                                if ($_GET["redirect"] == "account") {
                            ?>
                                    <span class="login-info-message"><img src="images/info.svg" alt="Info Icon">
                                        <p>Om uw account te
                                            zien moet u eerst inloggen!</p>
                                    </span>
                            <?php
                                }
                            }
                            ?>
                            <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "emptyinput") {
                            ?>
                                    <span class="login-error-message"><img src="images/error.svg" alt="Error Icon">
                                        <p>Vul alle velden
                                            in om in te kunnen loggen!</p>
                                    </span>
                                <?php
                                } elseif ($_GET["error"] == "stmtfailed") {
                                ?>
                                    <span class="login-error-message"><img src="images/error.svg" alt="Error Icon">
                                        <p>Er was een fout
                                            in verbinden met de database! Neem A.U.B. <a href="contactform.php">contact</a> op met ons
                                            op!</p>
                                    </span>
                                <?php
                                } elseif ($_GET["error"] == "usernotfound") {
                                ?>
                                    <span class="login-error-message"><img src="images/error.svg" alt="Error Icon">
                                        <p>Er was geen
                                            account gevonden met dit email adres! Probeer het nog een keer of maak <a href="signup.php">hier</a> een account aan.</p>
                                    </span>
                                <?php
                                } elseif ($_GET["error"] == "wrongpassword") {
                                ?>
                                    <span class="login-error-message"><img src="images/error.svg" alt="Error Icon">
                                        <p>Het wachtwoord dat u heeft ingetypt klopt niet! Probeer het nog eens.</p>
                                    </span>
                            <?php
                                }
                            }
                            ?>
                            <h2>Log In</h2>
                            <fieldset>
                                <?php
                                if (isset($_SESSION["signupemail"])) {
                                    $email = $_SESSION["signupemail"];
                                } else {
                                    $email = "";
                                }
                                echo "<input type=\"email\" name=\"email\" id=\"email\" tabindex=\"1\" autofocus
                                placeholder=\"E-mailadres\" value=\"$email\">";
                                session_unset();
                                session_destroy();
                                ?>
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