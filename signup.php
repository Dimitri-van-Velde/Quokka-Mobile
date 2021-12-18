<?php
session_start();
require_once 'php-includes/signup.inc.php';
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
            <article class="signup-article">
                <?php
                if (isset($_SESSION["userid"])) {
                ?>
                    <form action="php-includes/signup.inc.php" class="signup-form" method="post">
                        <fieldset class="signup-inlog">
                            <h2>U bent al ingelogd!</h2>
                            <p><a href="php-includes/logout.inc.php">Log Uit</a> om een account aan te kunnen maken.</p>
                        </fieldset>
                    </form>
                <?php
                } else {
                ?>
                    <form action="php-includes/signup.inc.php" class="signup-form" method="post">
                        <fieldset class="signup-inlog">
                            <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "emptyinput") {
                            ?>
                                    <span class="login-error-message"><img src="images/error.svg" alt="Error Icon">
                                        <p>Vul alle verplichte velden
                                            in om aan te kunnen melden!</p>
                                    </span>
                                <?php
                                } elseif ($_GET["error"] == "stmtfailed") {
                                ?>
                                    <span class="login-error-message"><img src="images/error.svg" alt="Error Icon">
                                        <p>Er was een fout
                                            in verbinden met de database! Neem A.U.B. <a href="contactform.php">contact</a> op met
                                            ons
                                            op!</p>
                                    </span>
                                <?php
                                } elseif ($_GET["error"] == "email") {
                                ?>
                                    <span class="login-error-message"><img src="images/error.svg" alt="Error Icon">
                                        <p>Incorrecte E-mail ingevult! Probeer het nog eens.</p>
                                    </span>
                                <?php
                                } elseif ($_GET["error"] == "passwordmatch") {
                                ?>
                                    <span class="login-error-message"><img src="images/error.svg" alt="Error Icon">
                                        <p>De wachtwoorden die u heeft ingetypt komt niet over met elkaar! Probeer het nog eens.</p>
                                    </span>
                                <?php
                                } elseif ($_GET["error"] == "emailtaken") {
                                ?>
                                    <span class="login-error-message"><img src="images/error.svg" alt="Error Icon">
                                        <p>Er bestaat al een account met het ingevulde E-mailadres!</p>
                                    </span>
                            <?php
                                }
                            }
                            ?>
                            <h2>Inloggegevens</h2>
                            <fieldset><input type="email" name="email" id="email" placeholder="E-mailadres" tabindex="1" autofocus maxlength="255"></fieldset>
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
                                <input type="password" name="password" id="password" placeholder="Wachtwoord (minimaal 8 karakters)" pattern=".{8,}" tabindex="2" maxlength="20">
                            </fieldset>
                            <fieldset>
                                <article class="showhide" id="showhide1" onclick="showPassword1()"> <svg version="1.1" viewBox="0 0 37.519 37.519">
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
                                <input type="password" name="passwordrepeat" id="passwordrepeat" placeholder="Herhaal Wachtwoord" pattern=".{8,3}" tabindex="3" maxlength="20">
                            </fieldset>
                        </fieldset>

                        <fieldset class="signup-pers">
                            <h2>Persoonlijke Gegevens</h2>
                            <fieldset class="aanhef">
                                <label for="pronoun">Aanhef: </label>
                                <label>
                                    <input type="radio" name="pronoun" id="man" value="man" tabindex="4"> Man
                                </label>
                                <label>
                                    <input type="radio" name="pronoun" id="vrouw" value="vrouw"> Vrouw
                                </label>
                                <label>
                                    <input type="radio" name="pronoun" id="overig" value="overig"> Overig
                                </label>
                            </fieldset>
                            <fieldset><input type="text" name="firstname" id="firstname" placeholder="Voornaam" tabindex="5" maxlength="50"></fieldset>
                            <fieldset><input type="text" name="preposition" id="preposition" placeholder="Tussenvoegsel" tabindex="6" maxlength="50">
                            </fieldset>
                            <fieldset><input type="text" name="lastname" id="lastname" placeholder="Achternaam" tabindex="7" maxlength="50"></fieldset>
                            <fieldset><input type="text" name="streetname" id="streetname" maxlength="50" placeholder="Straatnaam" tabindex="8"></fieldset>
                            <fieldset><input type="number" name="housenumber" id="housenumber" maxlength="5" placeholder="Huisnummer" tabindex="9"></fieldset>
                            <fieldset><input type="text" name="postalcode" id="postalcode" pattern="[0-9]{4}[A-Z]{2}" placeholder="Postcode" tabindex="10"></fieldset>
                            <fieldset><input type="text" name="cityname" id="cityname" maxlength="50" placeholder="Plaatsnaam" tabindex="11"></fieldset>
                            <fieldset><input type="number" name="phonenumber" id="phonenumber" maxlength="10" placeholder="Telefoonnummer" tabindex="12"></fieldset>
                            <fieldset><label for="birthdate">Geboortedatum: </label></fieldset>
                            <fieldset><input type="date" name="birthdate" id="birthdate" placeholder="Geboortedatum" tabindex="13">
                            </fieldset>
                            <input type="submit" name="submit" value="Sign Up">
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

                function showPassword1() {
                    var field = document.getElementById("passwordrepeat");
                    var showhide = document.getElementById("showhide1");

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