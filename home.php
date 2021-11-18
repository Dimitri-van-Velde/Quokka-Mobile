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
                <h2>Welkom bij Quokka Mobile!</h2>
                <p class="subtitle">Wij verkopen al sinds 1998 de best geprijsde
                    mobiele telefoons in Zuid-Holland en omstreken. We hopen dat u hier alles kan vinden wat uw hart
                    begeert. Hieronder een kleine catalogus van wat wij onder andere verkopen.</p>
            </article>
        </section>
        <section>
            <article class="carousel-container">
                <ul class="carousel">
                    <li class="slide" id="samsung">
                        <a href="samsung.php">
                            <video src="videos/samsung.mp4" alt="Samsung Telefoons" autoplay muted loop></video>
                            <p>Samsungs</p>
                        </a>
                    </li>
                    <li class="slide" id="iphone">
                        <a href="iphone.php">
                            <video src="videos/iphone.mp4" alt="iPhone Telefoons" autoplay muted loop></video>
                            <p>iPhones</p>
                        </a>
                    </li>
                </ul>
            </article>
            <article class="home-gallery-container">
                <ul>
                    <li class="tile">
                        <a href="samsung.php">
                            <video src="videos/samsung.mp4" alt="Samsung Telefoons" autoplay muted loop></video>
                            <p>Samsungs</p>
                        </a>
                    </li>
                    <li class="tile">
                        <a href="iphone.php">
                            <video src="videos/iphone.mp4" alt="iPhone Telefoons" autoplay muted loop></video>
                            <p>iPhones</p>
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