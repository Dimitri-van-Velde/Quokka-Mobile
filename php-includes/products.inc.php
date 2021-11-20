<?php

    class Products extends Dbh {

        // Get Products Function
        public function getProducts() {

            // Check if brand filter and price range is used
            if(isset($_GET["brand"]) && isset($_GET["prijsmin"]) && isset($_GET["prijsmax"])) {

                // Database Query
                $stmt = $this->connect()->prepare("SELECT * FROM `products` WHERE `idbrand`"." = ".":brand AND `price` BETWEEN :prijsmin AND :prijsmax");
                $parameters = array(":brand" => $_GET["brand"], ":prijsmin" => $_GET["prijsmin"], ":prijsmax" => $_GET["prijsmax"]);
                $stmt->execute($parameters);
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Check if something is found
                if($results != null) {

                    // Create product element
                    for($i = 0; $i < count($results); $i++) {

                        // Strip tags from input
                        $strippedInput = strip_tags($_GET["search"]); 
                    
                        // Variables
                        $name = $results[$i]["name"];
                        $price = $results[$i]["price"];
                        $screensize = $results[$i]["screensize"];
                        
                        // Replace . with , in price
                        $price = substr_replace($price, ",", strlen($price) -3, 1);
                        // Get numbers after comma
                        $pricecomma = substr($price, -2);
                        // Remove after comma
                        $price = substr($price, 0, -2);

                        // Get image and site URL
                        // Make lower case
                        $url = strtolower($name);
                        //Make alphanumeric
                        $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
                        //Clean up multiple dashes or whitespaces
                        $url = preg_replace("/[\s-]+/", " ", $url);
                        //Convert whitespaces and underscore to dash
                        $url = preg_replace("/[\s_]/", "-", $url);

                        // Echo to screen
                        echo "<li>
                            <a href=\"producten/$url.php\"><img src=\"images/$url.jpg\" alt=\"$name\"></a>
                            <a href=\"producten/$url.php\">$name</a>
                            <p>Prijs: €$price<sup>$pricecomma</sup></p>
                        </li>";

                    }
                } else {
                    echo "<p>Geen resultaten gevonden tussen: <b>€".$_GET["prijsmin"]."</b> & <b>€".$_GET["prijsmax"]."</b></p>";
                }

                // Check if only price range is used
            } elseif(isset($_GET["prijsmin"]) && isset($_GET["prijsmax"]) && empty($_GET["brand"])) { 

                // Database Query
                $stmt = $this->connect()->prepare("SELECT * FROM `products` WHERE `price` BETWEEN :prijsmin AND :prijsmax");
                $parameters = array(":prijsmin" => $_GET["prijsmin"], ":prijsmax" => $_GET["prijsmax"]);
                $stmt->execute($parameters);
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Check if something is found
                if($results != null) {

                    // Create product element
                    for($i = 0; $i < count($results); $i++) {

                        // Variables
                        $name = $results[$i]["name"];
                        $price = $results[$i]["price"];
                        $screensize = $results[$i]["screensize"];
                        
                        // Replace . with , in price
                        $price = substr_replace($price, ",", strlen($price) -3, 1);
                        // Get numbers after comma
                        $pricecomma = substr($price, -2);
                        // Remove after comma
                        $price = substr($price, 0, -2);

                        // Get image and site URL
                        // Make lower case
                        $url = strtolower($name);
                        //Make alphanumeric
                        $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
                        //Clean up multiple dashes or whitespaces
                        $url = preg_replace("/[\s-]+/", " ", $url);
                        //Convert whitespaces and underscore to dash
                        $url = preg_replace("/[\s_]/", "-", $url);
                        
                        // Echo to screen
                        echo "<li>
                            <a href=\"producten/$url.php\"><img src=\"images/$url.jpg\" alt=\"$name\"></a>
                            <a href=\"producten/$url.php\">$name</a>
                            <p>Prijs: €$price<sup>$pricecomma</sup></p>
                        </li>";
                    }
                } else {
                    echo "<p>Geen resultaten gevonden tussen: <b>€".$_GET["prijsmin"]."</b> & <b>€".$_GET["prijsmax"]."</b></p>";
                }

                // Check if searchbar is used
            } elseif(isset($_GET["search"])) {

                // Strip tags from input
                $strippedInput = strip_tags($_GET["search"]); 
                
                // Database Query
                $stmt = $this->connect()->prepare("SELECT * FROM `products` WHERE `name` LIKE :user_input");
                $parameters = array(":user_input" => "%".$strippedInput."%");
                $stmt->execute($parameters);
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Check if something is found
                if($results != null) { 

                    // Create product element
                    for($i = 0; $i < count($results); $i++) {

                        // Variables
                        $name = $results[$i]["name"];
                        $price = $results[$i]["price"];
                        $screensize = $results[$i]["screensize"];
                        
                        // Replace . with , in price
                        $price = substr_replace($price, ",", strlen($price) -3, 1);
                        // Get numbers after comma
                        $pricecomma = substr($price, -2);
                        // Remove after comma
                        $price = substr($price, 0, -2);

                        // Get image and site URL
                        // Make lower case
                        $url = strtolower($name);
                        //Make alphanumeric
                        $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
                        //Clean up multiple dashes or whitespaces
                        $url = preg_replace("/[\s-]+/", " ", $url);
                        //Convert whitespaces and underscore to dash
                        $url = preg_replace("/[\s_]/", "-", $url);

                        // Echo to screen
                        echo "<li>
                            <a href=\"producten/$url.php\"><img src=\"images/$url.jpg\" alt=\"$name\"></a>
                            <a href=\"producten/$url.php\">$name</a>
                            <p>Prijs: €$price<sup>$pricecomma</sup></p>
                        </li>";

                    }
                } else {
                    echo "<p>Geen resultaten gevonden voor: <b>".$strippedInput."</b></p>";
                }

                // Check if price filter is used
            } else { 
                
                // Database Query
                $stmt = $this->connect()->prepare("SELECT * FROM `products`");
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Check if something is found
                if($results != null) {

                    // Create product element
                    for($i = 0; $i < count($results); $i++) {

                        // Variables
                        $name = $results[$i]["name"];
                        $price = $results[$i]["price"];
                        $screensize = $results[$i]["screensize"];
                        
                        // Replace . with , in price
                        $price = substr_replace($price, ",", strlen($price) -3, 1);
                        // Get numbers after comma
                        $pricecomma = substr($price, -2);
                        // Remove after comma
                        $price = substr($price, 0, -2);

                        // Get image and site URL
                        // Make lower case
                        $url = strtolower($name);
                        //Make alphanumeric
                        $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
                        //Clean up multiple dashes or whitespaces
                        $url = preg_replace("/[\s-]+/", " ", $url);
                        //Convert whitespaces and underscore to dash
                        $url = preg_replace("/[\s_]/", "-", $url);

                        // Echo to screen
                        echo "<li>
                            <a href=\"producten/$url.php\"><img src=\"images/$url.jpg\" alt=\"$name\"></a>
                            <a href=\"producten/$url.php\">$name</a>
                            <p>Prijs: €$price<sup>$pricecomma</sup></p>
                        </li>";

                    }
                } 
            }

        }
    }

?>