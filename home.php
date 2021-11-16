<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php
        include 'head.html';
    ?>
</head>

<body>
    <?php
        include 'nav.html';
    ?>

    <main class="home-container">
        <section class="home-text-container">
            <article>
                <h2>Welkom bij Stout Heiger!</h2>
                <p class="subtitle">Wij verkopen al sinds 1998 de mooiste en best geprijste
                    steigerhouten meubels in Zuid-Holland en omstreken. We hopen dat U hier alles kan vinden wat Uw hart
                    begeert. Hieronder een kleine catalogus van wat wij onder andere verkopen.</p>
            </article>
        </section>
        <section>
            <article class="carousel-container">
                <ul class="carousel">
                    <li class="slide" id="stoelen">
                        <a href="stoelen.php">
                            <img src="images/stoel.jpg" alt="Stoelen">
                            <p>Stoelen</p>
                        </a>
                    </li>
                    <li class="slide" id="kasten">
                        <a href="kasten.php">
                            <img src="images/kast.jpg" alt="Kast">
                            <p>Kasten</p>
                        </a>
                    </li>
                </ul>
            </article>
            <article class="home-gallery-container">
                <ul>
                    <li class="tile">
                        <a href="stoelen.php">
                            <img src="images/stoel.jpg" alt="Stoelen">
                            <p>Stoelen</p>
                        </a>
                    </li>
                    <li class="tile">
                        <a href="kasten.php">
                            <img src="images/kast.jpg" alt="Kast">
                            <p>Kasten</p>
                        </a>
                    </li>
                </ul>
            </article>
        </section>
    </main>
    <?php
        include 'footer.html';
    ?>
</body>

</html>