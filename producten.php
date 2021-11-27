<?php
    include_once 'php-includes/dbh.inc.php';
    include_once 'php-includes/products.inc.php';
?>   

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
    <?php
        include 'head.html';
    ?>
</head>

<body>
    <?php
        include 'nav.html';
    ?>

    <main>
        <section class="product-container">
            <article class="filter-sidebar">
                <h2>Filter Producten</h2>
                <form action="producten.php" method="get" class="filter">
                    <h3>Kies Merk</h3>
                    <fieldset>
                        <select name="brand" id="brand" onchange="(get_brand(this.value))">
                            <option value="0" selected disabled>Kies merk...</option>
                            <option value="1">Samsung</option>
                            <option value="2">Apple</option>
                            <option value="3">Huawei</option>
                            <option value="4">OnePlus</option>
                        </select>
                    </fieldset>
                    <!-- <h3>Prijs Range</h3>
                    <fieldset class="filter-numbers">
                        <input type="number" name="prijsmin" value="100" on>
                        <p>tot</p>
                        <input type="number" name="prijsmax" value="2000">
                    </fieldset> -->
                    <input type="reset" onclick="(default_list())">
                </form>
            </article>
            <article class="product">
                <form action="producten.php" method="get" class="sort">
                    <label for="sort">Sorteren op: </label>
                    <select name="sort" id="sort" onchange="(get_sort(this.value))">
                        <option value="popularity" selected>Populariteit</option>
                        <option value="priceLtH">Prijs: laag - hoog</option>
                        <option value="priceHtL">Prijs hoog - laag</option>
                        <option value="releaseNtO">Nieuwste</option>
                        <option value="releaseOtN">Oudste</option>
                    </select>
                </form>
                <ul id="product-ul">
                    <?php

                        $object = new Products;
                        echo $object->getProducts();

                    ?>
                </ul>
            </article>

            <?php

                $searchValue;

                if(isset($_GET["search"])){ 
                    $searchValue = $_GET["search"];
                } else {
                    $searchValue = "";
                }  
            ?>

            <script>

                //default_list();

                //console.log("<?php //Print($_GET["search"]) ?>");

                // Default function
                function default_list(){

                    window.history.replaceState({}, null, "http://localhost/quokka_mobile/producten.php");
                    document.title = "Producten";

                    // Variable
                    var default_list = "popularity";

                    // Set sort back to default
                    document.getElementById("sort").options.selectedIndex = default_list;

                    // Create FormData element
                    var form_data = new FormData();
                    form_data.append("default_list", default_list);

                    // Open ajax connection to search.inc.php
                    var ajax_request = new XMLHttpRequest();
                    
                    ajax_request.open("POST", "php-includes/defaultlist.inc.php");
                    ajax_request.send(form_data);

                    ajax_request.onreadystatechange = function() {

                        // Run code if connection was successful
                        if(ajax_request.readyState == 4 && ajax_request.status == 200) {

                            // Parse the returned JSON
                            var response = JSON.parse(ajax_request.responseText);

                            // Create HTML element
                            html = "";

                            // Check if something was found
                            if(response.length > 0) {

                                // Create li elements
                                for(var count = 0; count < response.length; count++) {

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
                                    "<a href=\"producten/"+url+".php\"><img src=\"images/"+url+".jpg\" alt=\""+name+"\"></a>" +
                                    "<a href=\"producten/"+url+".php\">"+name+"</a>" +
                                    "<p>Prijs: €"+priceWithComma+"</p>" +
                                "</li>";
                                }
                            }

                            // Put li's on screen
                            document.getElementById("product-ul").innerHTML = html;

                        }
                    }

                }

                // Get brand function
                function get_brand(brand) {
                    var current_sort = document.getElementById("sort").value;
                    //console.log(current_sort);

                    //console.log(brand);

                    // Create FormData element
                    var form_data = new FormData();
                    form_data.append("brand", brand);
                    form_data.append("current_sort", current_sort);

                    // Open ajax connection to search.inc.php
                    var ajax_request = new XMLHttpRequest();
                    
                    ajax_request.open("POST", "php-includes/brandfilter.inc.php");
                    ajax_request.send(form_data);

                    ajax_request.onreadystatechange = function() {

                        // Run code if connection was successful
                        if(ajax_request.readyState == 4 && ajax_request.status == 200) {

                            // Parse the returned JSON
                            var response = JSON.parse(ajax_request.responseText);

                            // Create HTML element
                            html = "";

                            // Check if something was found
                            if(response.length > 0) {

                                // Create li elements
                                for(var count = 0; count < response.length; count++) {

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
                                    "<a href=\"producten/"+url+".php\"><img src=\"images/"+url+".jpg\" alt=\""+name+"\"></a>" +
                                    "<a href=\"producten/"+url+".php\">"+name+"</a>" +
                                    "<p>Prijs: €"+priceWithComma+"</p>" +
                                "</li>";
                                }
                            }

                            // Put li's on screen
                            document.getElementById("product-ul").innerHTML = html;

                        }
                    }

                }

                // Get sort function
                function get_sort(sort) {
                    var current_brand = document.getElementById("brand").value;
                    var current_search =  "<?php Print($searchValue)?>";
                    //console.log(current_search);
                    //console.log(current_brand);

                    // Create FormData element
                    var form_data = new FormData();
                    form_data.append("sort", sort);
                    form_data.append("current_brand", current_brand);
                    form_data.append("current_search", current_search);

                    // Open ajax connection to search.inc.php
                    var ajax_request = new XMLHttpRequest();
                    
                    ajax_request.open("POST", "php-includes/sortfilter.inc.php");
                    ajax_request.send(form_data);

                    ajax_request.onreadystatechange = function() {

                        // Run code if connection was successful
                        if(ajax_request.readyState == 4 && ajax_request.status == 200) {

                            // Parse the returned JSON
                            var response = JSON.parse(ajax_request.responseText);

                            // Create HTML element
                            html = "";

                            // Check if something was found
                            if(response.length > 0) {

                                // Create li elements
                                for(var count = 0; count < response.length; count++) {

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
                                    "<a href=\"producten/"+url+".php\"><img src=\"images/"+url+".jpg\" alt=\""+name+"\"></a>" +
                                    "<a href=\"producten/"+url+".php\">"+name+"</a>" +
                                    "<p>Prijs: €"+priceWithComma+"</p>" +
                                "</li>";
                                }
                            }

                            // Put li's on screen
                            document.getElementById("product-ul").innerHTML = html;

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