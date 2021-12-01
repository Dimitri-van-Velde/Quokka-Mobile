<header>
    <nav>
        <section class="nav-container">
            <article class="logo">
                <img src="images/logo.png" alt="Logo">
                <h1>Quokka Mobile</h1>
                <label for="btn" class="icon">
                    <span class="burger">☰</span>
                </label>
            </article>
            <article class="searchbar">
                <form action="producten.php" method="get" autocomplete="off">
                    <input type="text" name="search" id="search" placeholder="Waar ben je naar op zoek?" onkeyup="javascript:load_data(this.value)">
                    <button type="submit"><img src="images/magnifying-glass.png" alt="Search"></button>
                    <span id="search_result" class="search-result"></span>
                </form>
            </article>
            <input type="checkbox" id="btn">
            <article class="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li>
                        <label for="btn-1" class="show">Over Ons +</label>
                        <a href="#">Over Ons</a>
                        <input type="checkbox" id="btn-1">
                        <ul>
                            <li><a href="quokkamobile.php">Quokka Mobile</a></li>
                            <li><a href="personeel.php">Personeel</a></li>
                        </ul>
                    </li>
                    <li><a href="producten.php">Producten</a></li>
                    <li>
                        <label for="btn-5" class="show">Contact +</label>
                        <a href="#">Contact</a>
                        <input type="checkbox" id="btn-5">
                        <ul>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="contactform.php">Vragen?
                                    <span class="plus">&RightArrow;</span>
                                </a></li>
                        </ul>
                    </li>
                    <?php 
                        if(isset($_SESSION["userid"])) {
                    ?>
                        <li><a href="account.php"><?php echo $_SESSION["firstname"]; ?></a></li>
                    <?php
                        } else {
                    ?>                            
                        <li><a href="login.php">Log In</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </article>
        </section>
        <article class="searchbar2">
            <form action="producten.php" method="get" autocomplete="off">
                <input type="text" name="search" placeholder="Waar ben je naar op zoek?" onkeyup="javascript:load_data(this.value)">
                <button type="submit"><img src="images/magnifying-glass.png" alt="Search"></button>
                <span id="search_result1" class="search-result search-result1"></span>
            </form>
        </article>
    </nav>
    <script>

        // Load Data funcion
        function load_data(query) {

            // Check if input is 3 or longer
            if(query.length > 2) {

                // Remove HTML tags from input
                let sanitizedQuery = query.replace(/(<([^>]+)>)/gi, "");

                // Create FormData element
                var form_data = new FormData();
                form_data.append("query", sanitizedQuery);

                // Open ajax connection to search.inc.php
                var ajax_request = new XMLHttpRequest();
                
                ajax_request.open("POST", "php-includes/search.inc.php");
                ajax_request.send(form_data);

                ajax_request.onreadystatechange = function() {

                    // Run code if connection was successful
                    if(ajax_request.readyState == 4 && ajax_request.status == 200) {

                        // Parse the returned JSON
                        var response = JSON.parse(ajax_request.responseText);

                        //console.log(response.name);

                        // Create HTML element
                        var html = "<article class=\"list-group\">";

                        // Check if something was found
                        if(response.length > 0) {
                            
                            // Append standard search result
                            html += "<a href=\"producten.php?search="+sanitizedQuery+"\" class=\"list-group-item\">"+
                                "<p>Zoek naar: \""+sanitizedQuery+"\"</p></a>";

                            // Append other search results
                            for(var count = 0; count < response.length; count++) {

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
                                html += "<a href=\"producten/"+url+".php\" class=\"list-group-item\"><img src=\"images/"+url+".jpg\" alt=\""+name+"\"></img>"+
                                    "<p>"+name+"</p></a>";
                            }

                        } else {
                            // Append standard search result
                            html += "<a href=\"producten.php?search="+sanitizedQuery+"\" class=\"list-group-item\">"+
                                "<p>Zoek naar: \""+sanitizedQuery+"\"</p></a>";
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