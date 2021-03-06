<header>
    <nav>
        <section class="nav-container">
            <article class="logo">
                <img src="images/logo.png" alt="Logo" id="logo">
                <h1>Quokka Mobile</h1>
                <label for="btn" class="icon">
                    <span class="burger">☰</span>
                </label>
            </article>
            <article class="searchbar">
                <form action="producten.php" method="get" autocomplete="off" id="searchbar">
                    <input type="text" name="search" id="search" placeholder="Waar ben je naar op zoek?" onkeyup="javascript:load_data(this.value)">
                    <button type="submit"><img src="images/magnifying-glass.png" alt="Search" id="mag-glass"></button>
                    <span id="search_result" class="search-result"></span>
                </form>
            </article>
            <input type="checkbox" id="btn">
            <article class="menu">
                <ul>
                    <?php
                    // Get file directory 
                    $cur_dir = explode('\\', getcwd());

                    // Check if file is in main folder
                    if (isset($_SESSION["userid"])) {
                        if ($cur_dir[count($cur_dir) - 1] == "quokka_mobile") {
                    ?>
                            <li>
                                <a href="account/cart.php" id="cart-a">
                                    <svg version="1.1" viewBox="0 0 24 24" aria-hidden="true" class="account-svg" focusable="false">
                                        <path d="M23.9 6.5c0-.8-.7-1.5-1.5-1.5H5.8l-1-4H1c-.6 0-1 .4-1 1s.4 1 1 1h2.2L4 6.2l2.9 11.6c-.5.6-.9 1.4-.9 2.2 0 1.7 1.3 3 3 3s3-1.3 3-3c0-.4-.1-.7-.2-1h4.4c-.1.3-.2.6-.2 1 0 1.7 1.3 3 3 3s3-1.3 3-3c0-.9-.4-1.6-.9-2.2l2.7-11c0-.1.1-.2.1-.3zM10 20c0 .6-.4 1-1 1s-1-.4-1-1 .4-1 1-1 1 .4 1 1zm9 1c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm.2-4H8.8L6.3 7h15.4l-2.5 10z"></path>
                                    </svg>
                                    <?php

                                    if (isset($_SESSION["orderid"])) {
                                        require_once 'php-includes/dbh.inc.php';
                                        $dsn = new Dbh;
                                        $stmt = $dsn->connect()->prepare("SELECT * FROM `orderrow` WHERE `idorder` = ?;");

                                        $stmt->execute(array($_SESSION["orderid"]));

                                        $cartCount = $stmt->rowCount();

                                        echo $cartCount;
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </a>
                            </li>
                        <?php
                        } elseif ($cur_dir[count($cur_dir) - 1] == "account") {
                        ?>
                            <li>
                                <a href="cart.php" id="cart-a">
                                    <svg version="1.1" viewBox="0 0 24 24" aria-hidden="true" class="account-svg" focusable="false">
                                        <path d="M23.9 6.5c0-.8-.7-1.5-1.5-1.5H5.8l-1-4H1c-.6 0-1 .4-1 1s.4 1 1 1h2.2L4 6.2l2.9 11.6c-.5.6-.9 1.4-.9 2.2 0 1.7 1.3 3 3 3s3-1.3 3-3c0-.4-.1-.7-.2-1h4.4c-.1.3-.2.6-.2 1 0 1.7 1.3 3 3 3s3-1.3 3-3c0-.9-.4-1.6-.9-2.2l2.7-11c0-.1.1-.2.1-.3zM10 20c0 .6-.4 1-1 1s-1-.4-1-1 .4-1 1-1 1 .4 1 1zm9 1c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm.2-4H8.8L6.3 7h15.4l-2.5 10z"></path>
                                    </svg>
                                    <?php
                                    if (isset($_SESSION["orderid"])) {
                                        require_once '../php-includes/dbh.inc.php';
                                        $dsn = new Dbh;
                                        $stmt = $dsn->connect()->prepare("SELECT * FROM `orderrow` WHERE `idorder` = ?;");

                                        $stmt->execute(array($_SESSION["orderid"]));

                                        $cartCount = $stmt->rowCount();

                                        echo $cartCount;
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li>
                                <a href="../account/cart.php" id="cart-a">
                                    <svg version="1.1" viewBox="0 0 24 24" aria-hidden="true" class="account-svg" focusable="false">
                                        <path d="M23.9 6.5c0-.8-.7-1.5-1.5-1.5H5.8l-1-4H1c-.6 0-1 .4-1 1s.4 1 1 1h2.2L4 6.2l2.9 11.6c-.5.6-.9 1.4-.9 2.2 0 1.7 1.3 3 3 3s3-1.3 3-3c0-.4-.1-.7-.2-1h4.4c-.1.3-.2.6-.2 1 0 1.7 1.3 3 3 3s3-1.3 3-3c0-.9-.4-1.6-.9-2.2l2.7-11c0-.1.1-.2.1-.3zM10 20c0 .6-.4 1-1 1s-1-.4-1-1 .4-1 1-1 1 .4 1 1zm9 1c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm.2-4H8.8L6.3 7h15.4l-2.5 10z"></path>
                                    </svg>
                                    <?php
                                    if (isset($_SESSION["orderid"])) {
                                        require_once '../php-includes/dbh.inc.php';
                                        $dsn = new Dbh;
                                        $stmt = $dsn->connect()->prepare("SELECT * FROM `orderrow` WHERE `idorder` = ?;");

                                        $stmt->execute(array($_SESSION["orderid"]));

                                        $cartCount = $stmt->rowCount();

                                        echo $cartCount;
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                    <li><a href="home.php" id="home-a">Home</a></li>
                    <li>
                        <label for="btn-1" class="show">Over Ons +</label>
                        <a href="#">Over Ons</a>
                        <input type="checkbox" id="btn-1">
                        <ul>
                            <li><a href="quokkamobile.php" id="quokka-a">Quokka Mobile</a></li>
                            <li><a href="personeel.php" id="personeel-a">Personeel</a></li>
                        </ul>
                    </li>
                    <li><a href="producten.php" id="producten-a">Producten</a></li>
                    <li>
                        <label for="btn-5" class="show">Contact +</label>
                        <a href="#">Contact</a>
                        <input type="checkbox" id="btn-5">
                        <ul>
                            <li><a href="contact.php" id="contact-a">Contact</a></li>
                            <li><a href="contactform.php" id="form-a">Vragen?
                                    <span class="plus">&RightArrow;</span>
                                </a></li>
                        </ul>
                    </li>
                    <?php
                    // Get file directory 
                    $cur_dir = explode('\\', getcwd());

                    // Check if file is in main folder
                    if ($cur_dir[count($cur_dir) - 1] != "quokka_mobile") {
                        // Check if user is logged in
                        if (isset($_SESSION["userid"])) {
                    ?>
                            <li>
                                <a href="../account.php" id="account-a">
                                    <?php
                                    $firstname = $_SESSION["firstname"];
                                    $firstname = str_replace("-", " ", $firstname);
                                    $abr = explode(" ", $firstname);
                                    echo substr($abr[0], 0, 10);
                                    ?>
                                </a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li><a href="../login.php" id="login-a">Log In</a></li>
                        <?php
                        }
                    } else {
                        if (isset($_SESSION["userid"])) {
                        ?>
                            <li>
                                <a href="account.php" id="account-a">
                                    <?php
                                    $firstname = $_SESSION["firstname"];
                                    $firstname = str_replace("-", " ", $firstname);
                                    $abr = explode(" ", $firstname);
                                    echo substr($abr[0], 0, 10);
                                    ?>
                                </a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li><a href="login.php" id="login-a">Log In</a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </article>
        </section>
        <article class="searchbar2">
            <form action="producten.php" method="get" autocomplete="off" id="searchbar2">
                <input type="text" name="search" placeholder="Waar ben je naar op zoek?" onkeyup="javascript:load_data(this.value)">
                <button type="submit"><img src="images/magnifying-glass.png" alt="Search" id="mag-glass2"></button>
                <span id="search_result1" class="search-result search-result1"></span>
            </form>
        </article>
    </nav>
    <script>
        // Load Data funcion
        function load_data(query) {

            var loc = window.location.pathname;
            var dir = loc.substring(0, loc.lastIndexOf('/'));

            if (dir == "/quokka_mobile/producten" || dir == "/quokka_mobile/account") {
                var searchInc = "../php-includes/search.inc.php";
                var productPage = "../producten.php";
                var productDir = "../producten";
                var imageDir = "../images";
                document.getElementById("searchbar").action = "../producten.php";
                document.getElementById("searchbar2").action = "../producten.php";
            } else {
                var searchInc = "php-includes/search.inc.php";
                var productPage = "producten.php";
                var productDir = "producten";
                var imageDir = "images";
            }

            // Check if input is 3 or longer
            if (query.length > 2) {

                // Remove HTML tags from input
                let sanitizedQuery = query.replace(/(<([^>]+)>)/gi, "");

                // Create FormData element
                var form_data = new FormData();
                form_data.append("query", sanitizedQuery);

                // Open ajax connection to search.inc.php
                var ajax_request = new XMLHttpRequest();

                ajax_request.open("POST", searchInc);
                ajax_request.send(form_data);

                ajax_request.onreadystatechange = function() {

                    // Run code if connection was successful
                    if (ajax_request.readyState == 4 && ajax_request.status == 200) {

                        // Parse the returned JSON
                        var response = JSON.parse(ajax_request.responseText);

                        //console.log(response.name);

                        // Create HTML element
                        var html = "<article class=\"list-group\">";

                        // Check if something was found
                        if (response.length > 0) {

                            // Append standard search result
                            html += "<a href=\"" + productPage + "?search=" + sanitizedQuery + "\" class=\"list-group-item\">" +
                                "<p>Zoek naar: \"" + sanitizedQuery + "\"</p></a>";

                            // Append other search results
                            for (var count = 0; count < response.length; count++) {

                                // Variables
                                var url;
                                var name = response[count].name;

                                //console.log(name);

                                // Remove special characters
                                var cleanName = name.replace(/<\/?[^>]+(>|$)/g, "");

                                //console.log(cleanName);

                                // Turn spaces into dashes
                                var url = cleanName.replace(/\s+/g, '-').toLowerCase();

                                //console.log(url);

                                // Append to element
                                html += "<a href=\"" + productDir + "/" + url + ".php\" class=\"list-group-item\"><img src=\"" + imageDir + "/" + url + ".jpg\" alt=\"" + name + "\"></img>" +
                                    "<p>" + name + "</p></a>";
                            }

                        } else {
                            // Append standard search result
                            html += "<a href=\"" + productPage + "?search=" + sanitizedQuery + "\" class=\"list-group-item\">" +
                                "<p>Zoek naar: \"" + sanitizedQuery + "\"</p></a>";
                        }

                        // Close html element
                        html += "</article>";

                        // Set innerHTML to element value
                        document.getElementById("search_result").innerHTML = html;
                        document.getElementById("search_result1").innerHTML = html;
                    }

                }
            } else {
                // Set innerHTML to element value
                document.getElementById("search_result").innerHTML = "";
                document.getElementById("search_result1").innerHTML = "";
            }
        }
    </script>
</header>