<?php
session_start();
?>

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
    include 'nav.php';
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
            <article>
                <ul id="home-ul">

                </ul>
            </article>
            <script>
                homeProducts();

                function homeProducts() {
                    var home = "home";
                    // Create FormData element
                    var form_data = new FormData();
                    form_data.append("home", home);
                    // Open ajax connection to search.inc.php
                    var ajax_request = new XMLHttpRequest();

                    ajax_request.open("POST", "php-includes/home.inc.php");
                    ajax_request.send(form_data);
                    ajax_request.onreadystatechange = function() {
                        // Run code if connection was successful
                        if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                            // Parse the returned JSON
                            var response = JSON.parse(ajax_request.responseText);
                            // Create HTML element
                            html = "";
                            // Check if something was found
                            if (response.length > 0) {
                                // Create li elements
                                for (var count = 0; count < response.length; count++) {
                                    // Variables
                                    var url;
                                    var name = response[count].name;
                                    var price = response[count].price;
                                    var priceWithComma = price.replace(".", ",")
                                    //console.log(name);
                                    // Remove special characters
                                    var cleanName = name.replace(/<\/?[^>]+(>|$)/g, "");
                                    //console.log(cleanName);
                                    // Turn spaces into dashes
                                    var url = cleanName.replace(/\s+/g, '-').toLowerCase();
                                    //console.log(url);
                                    // Append li's
                                    html += "<li>" +
                                        "<a href=\"producten/" + url + ".php\"><img src=\"images/" + url + ".jpg\" alt=\"" + name + "\"></a>" +
                                        "<a href=\"producten/" + url + ".php\">" + name + "</a>" +
                                        "<p>Prijs: €" + priceWithComma + "</p>" +
                                        "</li>";
                                }
                            }
                            // Put li's on screen
                            document.getElementById("home-ul").innerHTML = html;
                        }
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