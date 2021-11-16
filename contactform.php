<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactformulier</title>
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
            <article class="form-container">
                <form class="contact" action="verwerk.php" method="post">
                    <h2>Vragen?</h2>
                    <h3>We helpen U graag!</h3>
                    <fieldset>
                        <input placeholder="Voornaam" name="voornaam" type="text" tabindex="1" required autofocus>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Achternaam" name="achternaam" type="text" tabindex="2" required>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Uw Email Adres" name="email" type="email" tabindex="3" required>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Uw Telefoon Nummer" name="tel" type="tel" pattern="[0-9]{10}" tabindex="4" required>
                    </fieldset>
                    <fieldset>
                        <textarea placeholder="Typ Uw vraag hier...." tabindex="5" required></textarea>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit">Submit</button>
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