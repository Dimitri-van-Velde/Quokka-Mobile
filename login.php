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
                                } elseif ($_GET["redirect"] == "product") {
                                ?>
                                    <span class="login-info-message"><img src="images/info.svg" alt="Info Icon">
                                        <p>Om producten toe te voegen aan uw winkelwagen moet u eerst ingloggen!</p>
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
                                <article class="showhide" id="showhide" onclick="showPassword()"> <svg version="1.1" viewBox="0 0 37.519 37.519">
                                        <g>
                                            <path d="M37.087,17.705c-0.334-0.338-8.284-8.276-18.327-8.276S0.766,17.367,0.433,17.705c-0.577,0.584-0.577,1.523,0,2.107
                                                c0.333,0.34,8.284,8.277,18.327,8.277s17.993-7.938,18.327-8.275C37.662,19.23,37.662,18.29,37.087,17.705z M18.76,25.089
                                                c-6.721,0-12.604-4.291-15.022-6.332c2.411-2.04,8.281-6.328,15.022-6.328c6.72,0,12.604,4.292,15.021,6.332
                                                C31.369,20.802,25.501,25.089,18.76,25.089z M18.76,13.009c3.176,0,5.75,2.574,5.75,5.75c0,3.175-2.574,5.75-5.75,5.75
                                                c-3.177,0-5.75-2.574-5.75-5.75C13.01,15.584,15.583,13.009,18.76,13.009z" />
                                        </g>
                                    </svg>
                                    Zie Wachtwoord
                                </article>
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
            <script>
                function showPassword() {
                    var field = document.getElementById("password");
                    var showhide = document.getElementById("showhide");

                    if (field.type === "password") {
                        field.type = "text";
                        showhide.innerHTML = "<svg viewBox=\"0 0 37.519 37.519\" version=\"1.1\">" +
                            "<g>" +
                            "<g id=\"svg_3\"/>" +
                            "<g id=\"svg_4\"/>" +
                            "<g id=\"svg_5\"/>" +
                            "<g id=\"svg_6\"/>" +
                            "<g id=\"svg_7\"/>" +
                            "<g id=\"svg_8\"/>" +
                            "<g id=\"svg_9\"/>" +
                            "<g id=\"svg_10\"/>" +
                            "<g id=\"svg_11\"/>" +
                            "<g id=\"svg_12\"/>" +
                            "<g id=\"svg_13\"/>" +
                            "<g id=\"svg_14\"/>" +
                            "<g id=\"svg_15\"/>" +
                            "<g id=\"svg_16\"/>" +
                            "<g id=\"svg_17\"/>" +
                            "<path id=\"svg_2\" d=\"m37.087,17.705c-0.334,-0.338 -8.284,-8.276 -18.327,-8.276s-17.994,7.938 -18.327,8.276c-0.577,0.584 -0.577,1.523 0,2.107c0.333,0.34 8.284,8.277 18.327,8.277s17.993,-7.938 18.327,-8.275c0.575,-0.584 0.575,-1.524 0,-2.109zm-18.327,7.384c-6.721,0 -12.604,-4.291 -15.022,-6.332c2.411,-2.04 8.281,-6.328 15.022,-6.328c6.72,0 12.604,4.292 15.021,6.332c-2.412,2.041 -8.28,6.328 -15.021,6.328zm0,-12.08c3.176,0 5.75,2.574 5.75,5.75c0,3.175 -2.574,5.75 -5.75,5.75c-3.177,0 -5.75,-2.574 -5.75,-5.75c0,-3.175 2.573,-5.75 5.75,-5.75z\"/>" +
                            "</g>" +
                            "<line filter=\"url(#svg_20_blur)\" stroke-width=\"3\" stroke-linecap=\"undefined\" stroke-linejoin=\"undefined\" id=\"svg_20\" y2=\"35.01543\" x2=\"2\" y1=\"3\" x1=\"34.87325\" stroke=\"red\" fill=\"currentColor\"/>" +
                            "<line stroke-width=\"3\" stroke-linecap=\"undefined\" stroke-linejoin=\"undefined\" id=\"svg_23\" y2=\"32\" x2=\"4.82585\" y1=\"4.58888\" x1=\"32.97751\" stroke=\"red\" fill=\"currentColor\"/>" +
                            "</g>" +
                            "</svg>" +
                            "Verberg Wachtwoord";
                    } else {
                        field.type = "password";
                        showhide.innerHTML = "<svg version=\"1.1\" viewBox=\"0 0 37.519 37.519\">" +
                            "<g>" +
                            "<path d=\"M37.087,17.705c-0.334-0.338-8.284-8.276-18.327-8.276S0.766,17.367,0.433,17.705c-0.577,0.584-0.577,1.523,0,2.107" +
                            "c0.333,0.34,8.284,8.277,18.327,8.277s17.993-7.938,18.327-8.275C37.662,19.23,37.662,18.29,37.087,17.705z M18.76,25.089" +
                            "c-6.721,0-12.604-4.291-15.022-6.332c2.411-2.04,8.281-6.328,15.022-6.328c6.72,0,12.604,4.292,15.021,6.332" +
                            "C31.369,20.802,25.501,25.089,18.76,25.089z M18.76,13.009c3.176,0,5.75,2.574,5.75,5.75c0,3.175-2.574,5.75-5.75,5.75" +
                            "c-3.177,0-5.75-2.574-5.75-5.75C13.01,15.584,15.583,13.009,18.76,13.009z\" />" +
                            "</g>" +
                            "</svg>" +
                            "Zie Wachtwoord";
                    }
                }
            </script>
        </section>
    </main>
    <?php
    include 'footer.html';
    ?>
</body>

</html>