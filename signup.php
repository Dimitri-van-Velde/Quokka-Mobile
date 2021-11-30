<?php require_once 'php-includes/signup.inc.php'; ?>

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
        include 'nav.html';
    ?>
    <main>
        <section>
            <article class="signup">
                <form action="signup.php" class="signup-form" method="post">
                    <h2>Inloggegevens</h2>
                    <fieldset>
                        <input type="email" name="email" id="email" placeholder="E-mailadres" required>
                    </fieldset>
                    <fieldset>
                        <input type="password" name="password0" id="password0" placeholder="Wachtwoord" required pattern=".{3,}">
                    </fieldset>
                    <fieldset>
                        <input type="password" name="password1" id="password1" placeholder="Herhaal Wachtwoord" required>
                    </fieldset>
                    <h2>Persoonlijke Gegevens</h2>
                    <fieldset class="aanhef">
                        <label for="pronoun">Aanhef: </label>
                        <label>
                            <input type="radio" name="pronoun" id="man" value="man" required> Man
                        </label>
                        <label>
                            <input type="radio" name="pronoun" id="vrouw" value="vrouw"> Vrouw
                        </label>
                        <label>
                            <input type="radio" name="pronoun" id="overig" value="overig"> Overig
                        </label>
                    </fieldset>
                    <fieldset>
                        <input type="text" name="firstname" id="firstname" placeholder="Voornaam" required>
                    </fieldset>
                    <fieldset>
                        <input type="text" name="preposition" id="preposition" placeholder="Tussenvoegsel">
                    </fieldset>
                    <fieldset>
                        <input type="text" name="lastname" id="lastname" placeholder="Achternaam" required>
                    </fieldset>
                    <fieldset>
                        <input type="text" name="postalcode" id="postalcode" pattern="[0-9]{4}[A-Z]{2}" 
                        placeholder="Postcode" required>
                    </fieldset>
                    <fieldset>
                        <input type="number" name="housenumber" id="housenumber" maxlength="5" placeholder="Huisnummer" required>
                    </fieldset>
                    <fieldset>
                        <input type="number" name="phonenumber" id="phonenumber" maxlength="10" 
                        placeholder="Telefoonnummer" required>
                    </fieldset>
                    <fieldset>
                        <label for="birthdate">Geboortedatum: </label>
                        <input type="date" name="birthdate" id="birthdate" placeholder="Geboortedatum">
                    </fieldset>
                    <input type="submit" value="Sign Up">
                </form>
                <span id="confirm-message"></span>
            </article>
        </section>
    </main>
    <?php
        include 'footer.html';
    ?>
</body>

</html>