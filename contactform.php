<?php
    session_start();
?>

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
        include 'nav.php';
    ?>
    <main>
        <section>
            <article class="form-container">
                <?php 
                    if(isset($_SESSION["userid"])) {
                ?>
                <form class="contact" action="php-includes/contact.inc.php" method="post">
                    <?php
                        if(isset($_GET["error"])) {
                            if($_GET["error"] == "none") {
                    ?>
                        <span class="login-check-message"><img src="images/check.svg" alt="Check Icon">
                            <p>Het formulier is succesvol verzonden. We hopen zo spoedig mogelijk te antwoorden.</p>
                        </span>
                    <?php
                            }
                        }
                    ?>
                    <h2>Vragen?</h2>
                    <h3>We helpen U graag!</h3>
                    <fieldset>
                        <input placeholder="Voornaam" name="voornaam" id="voornaam" type="text" tabindex="1" required
                            autofocus value="<?php echo $_SESSION["firstname"]; ?>">
                    </fieldset>
                    <fieldset>
                        <input placeholder="Achternaam" name="achternaam" id="achternaam" type="text" tabindex="2"
                            required value="<?php 
                            if($_SESSION["preposition"] != "") {
                                echo $_SESSION["preposition"] . " " . $_SESSION["lastname"];
                            } else {
                                echo $_SESSION["lastname"];
                            }
                        ?>">
                    </fieldset>
                    <fieldset>
                        <input placeholder="Uw Emailadres" name="email" id="email" type="email" tabindex="3" required
                            value="<?php echo $_SESSION["email"]; ?>">
                    </fieldset>
                    <fieldset>
                        <input placeholder="Uw Telefoonnummer" name="tel" id="tel" type="tel" pattern="[0-9]{10}"
                            tabindex="4" required value="<?php echo $_SESSION["phonenumber"]; ?>">
                    </fieldset>
                    <fieldset>
                        <h3 class="beoordeling-h3">Beoordeling: </h3>
                        <span class="star-rating star-5">
                            <input type="radio" name="rating" value="1"><i></i>
                            <input type="radio" name="rating" value="2"><i></i>
                            <input type="radio" name="rating" value="3"><i></i>
                            <input type="radio" name="rating" value="4"><i></i>
                            <input type="radio" name="rating" value="5"><i></i>
                        </span>
                    </fieldset>
                    <fieldset>
                        <select name="soort" id="soort" onchange="getOption(this)" tabindex="6" required>
                            <option value="empty" disabled selected>Kies uw onderwerp</option>
                            <option value="vraag">Vraag</option>
                            <option value="mening">Mening</option>
                            <option value="bug">Bug/Fout</option>
                        </select>
                    </fieldset>
                    <fieldset id="vraag">
                        <textarea placeholder="Typ uw vraag hier...." tabindex="7" name="vraag"></textarea>
                    </fieldset>
                    <fieldset id="mening">
                        <textarea placeholder="Typ uw mening hier...." tabindex="7" name="mening"></textarea>
                    </fieldset>
                    <fieldset id="bug_page">
                        <select name="bug_page" tabindex="7">
                            <option value="empty" disabled selected>Locatie Bug/Fout</option>
                            <option value="home">Home</option>
                            <option value="bedrijf">Quokka Mobile</option>
                            <option value="personeel">Personeel</option>
                            <option value="producten">Producten</option>
                            <option value="producten">Product Pagina</option>
                            <option value="contact">Contact</option>
                            <option value="contactform">Contact Formulier</option>
                            <option value="contactform">Log In</option>
                            <option value="contactform">Sign Up</option>
                            <option value="contactform">Account</option>
                        </select>
                    </fieldset>
                    <fieldset id="bug">
                        <textarea placeholder="Beschrijf de fout hier...." tabindex="8" name="bug"></textarea>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit">Submit</button>
                    </fieldset>
                </form>
                <?php
                    } else {
                ?>
                <form class="contact" action="php-includes/contact.inc.php" method="post">
                    <h2>Vragen?</h2>
                    <h3>We helpen U graag!</h3>
                    <fieldset>
                        <input placeholder="Voornaam" name="voornaam" id="voornaam" type="text" tabindex="1" required
                            autofocus>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Achternaam" name="achternaam" id="achternaam" type="text" tabindex="2"
                            required>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Uw Emailadres" name="email" id="email" type="email" tabindex="3" required>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Uw Telefoonnummer" name="tel" id="tel" type="tel" pattern="[0-9]{10}"
                            tabindex="4" required>
                    </fieldset>
                    <fieldset>
                        <h3 class="beoordeling-h3">Beoordeling: </h3>
                        <span class="star-rating star-5">
                            <input type="radio" name="rating" value="1"><i></i>
                            <input type="radio" name="rating" value="2"><i></i>
                            <input type="radio" name="rating" value="3"><i></i>
                            <input type="radio" name="rating" value="4"><i></i>
                            <input type="radio" name="rating" value="5"><i></i>
                        </span>
                    </fieldset>
                    <fieldset>
                        <select name="soort" id="soort" onchange="getOption(this)" tabindex="6" required>
                            <option value="empty" disabled selected>Kies uw onderwerp</option>
                            <option value="vraag">Vraag</option>
                            <option value="mening">Mening</option>
                            <option value="bug">Bug/Fout</option>
                        </select>
                    </fieldset>
                    <fieldset id="vraag">
                        <textarea placeholder="Typ uw vraag hier...." tabindex="7" name="vraag"></textarea>
                    </fieldset>
                    <fieldset id="mening">
                        <textarea placeholder="Typ uw mening hier...." tabindex="7" name="mening"></textarea>
                    </fieldset>
                    <fieldset id="bug_page">
                        <select name="bug_page" tabindex="7">
                            <option value="empty" disabled selected>Locatie Bug/Fout</option>
                            <option value="home">Home</option>
                            <option value="bedrijf">Quokka Mobile</option>
                            <option value="personeel">Personeel</option>
                            <option value="producten">Producten</option>
                            <option value="producten">Product Pagina</option>
                            <option value="contact">Contact</option>
                            <option value="contactform">Contact Formulier</option>
                            <option value="contactform">Log In</option>
                            <option value="contactform">Sign Up</option>
                            <option value="contactform">Account</option>
                        </select>
                    </fieldset>
                    <fieldset id="bug">
                        <textarea placeholder="Beschrijf de fout hier...." tabindex="8" name="bug"></textarea>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit">Submit</button>
                    </fieldset>
                </form>
                <?php
                    }
                ?>

                <script>
                // Get which select option is picked
                function getOption(selectObject) {
                    var value = selectObject.value;

                    // Check which option is picked
                    if (value == "vraag") {
                        // Show element
                        document.getElementById("vraag").style.display = "block";

                        // Hide other elements
                        document.getElementById("mening").style.display = "none";
                        document.getElementById("bug").style.display = "none";
                        document.getElementById("bug_page").style.display = "none";
                    } else if (value == "mening") {
                        // Show element
                        document.getElementById("mening").style.display = "block";

                        // Hide other elements
                        document.getElementById("vraag").style.display = "none";
                        document.getElementById("bug").style.display = "none";
                        document.getElementById("bug_page").style.display = "none";
                    } else if (value == "bug") {
                        // Show elements
                        document.getElementById("bug").style.display = "block";
                        document.getElementById("bug_page").style.display = "block";

                        // Hide other elements
                        document.getElementById("mening").style.display = "none";
                        document.getElementById("vraag").style.display = "none";
                    } else {
                        // Hide other elements
                        document.getElementById("vraag").style.display = "none";
                        document.getElementById("mening").style.display = "none";
                        document.getElementById("bug").style.display = "none";
                        document.getElementById("bug_page").style.display = "none";
                    };
                }
                </script>

            </article>
        </section>
    </main>
    <?php
        include 'footer.html';
    ?>
</body>

</html>