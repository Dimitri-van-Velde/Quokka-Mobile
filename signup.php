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
                <form action="php-includes/signup.inc.php" class="signup-form" method="post">
                    <h2>Inloggegevens</h2>
                    <fieldset>
                        <input type="email" name="email" id="email" placeholder="E-mailadres" required>
                    </fieldset>
                    <fieldset>
                        <input type="password0" name="password0" id="password0" placeholder="Wachtwoord" required pattern=".{8,}">
                    </fieldset>
                    <fieldset>
                        <input type="password" name="password1" id="password1" placeholder="Herhaal Wachtwoord" required>
                    </fieldset>
                    <h2>Persoonlijke Gegevens</h2>
                    <fieldset class="aanhef">
                        <label for="aanhef">Aanhef: </label>
                        <input type="radio" name="aanhef" id="man" required> Man
                        <input type="radio" name="aanhef" id="vrouw"> Vrouw
                        <input type="radio" name="aanhef" id="overig"> Overig
                    </fieldset>
                    <fieldset>
                        <input type="text" name="voornaam" id="voornaam" placeholder="Voornaam" required>
                    </fieldset>
                    <fieldset>
                        <input type="text" name="tussenvoegsel" id="tussenvoegsel" placeholder="Tussenvoegsel" required>
                    </fieldset>
                    <fieldset>
                        <input type="text" name="achternaam" id="achternaam" placeholder="Achternaam" required>
                    </fieldset>
                    <fieldset>
                        <input type="text" name="postcode" id="postcode" pattern="[0-9]{4}\s[A-Z]{2}" 
                        placeholder="Postcode" required>
                    </fieldset>
                    <fieldset>
                        <input type="number" name="huisnummer" id="huisnummer" maxlength="5" placeholder="Huisnummer" required>
                    </fieldset>
                    <fieldset>
                        <input type="number" name="telefoonnummer" id="telefoonnummer" maxlength="10" 
                        placeholder="Telefoonnummer" required>
                    </fieldset>
                    <fieldset>
                        <input type="text" name="geboortedatum" id="geboortedatum" placeholder="Geboortedatum" 
                        pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-(19[0-9]|20[0-9])[0-9]" required>
                        <p>dd-mm-jjjj</p>
                    </fieldset>
                    <input type="submit" value="Sign Up">
                </form>
            </article>
        </section>
    </main>
    <?php
        include 'footer.html';
    ?>
</body>

</html>