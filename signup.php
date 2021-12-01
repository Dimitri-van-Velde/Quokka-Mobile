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
        <section class="signup-container">
            <article class="signup-article">
                <form action="php-includes/signup.inc.php" class="signup-form" method="post">
                    <fieldset class="signup-inlog">
                        <h2>Inloggegevens</h2>
                        <fieldset><input type="email" name="email" id="email" placeholder="E-mailadres" tabindex="1"
                        autofocus></fieldset>
                        <fieldset><input type="password" name="password" id="password" placeholder="Wachtwoord (minimaal 8 karakters)"
                                pattern=".{8,}" tabindex="2"></fieldset>
                        <fieldset><input type="password" name="passwordrepeat" id="passwordrepeat"
                                placeholder="Herhaal Wachtwoord" pattern=".{8,}" tabindex="3"></fieldset>
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
                        <fieldset><input type="text" name="firstname" id="firstname" placeholder="Voornaam" tabindex="5"></fieldset>
                        <fieldset><input type="text" name="preposition" id="preposition" placeholder="Tussenvoegsel" tabindex="6">
                        </fieldset>
                        <fieldset><input type="text" name="lastname" id="lastname" placeholder="Achternaam" tabindex="7"></fieldset>
                        <fieldset><input type="text" name="postalcode" id="postalcode" pattern="[0-9]{4}[A-Z]{2}"
                                placeholder="Postcode" tabindex="8"></fieldset>
                        <fieldset><input type="number" name="housenumber" id="housenumber" maxlength="5"
                                placeholder="Huisnummer" tabindex="9"></fieldset>
                        <fieldset><input type="number" name="phonenumber" id="phonenumber" maxlength="10"
                                placeholder="Telefoonnummer" tabindex="10"></fieldset>
                        <fieldset><label for="birthdate">Geboortedatum: </label></fieldset>
                        <fieldset><input type="date" name="birthdate" id="birthdate" placeholder="Geboortedatum" tabindex="11">
                        </fieldset>
                        <input type="submit" name="submit" value="Sign Up">
                    </fieldset>
                </form>
            </article>
        </section>
    </main>
    <?php
        include 'footer.html';
    ?>
</body>

</html>