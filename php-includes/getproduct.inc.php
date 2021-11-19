<?php

    class GetProduct extends Dbh {

        // Get Products Function
        public function getSingleProduct($productid) {

            // Check if searchbar is used
                
            // Database Query
            $stmt = $this->connect()->prepare("SELECT * FROM `products` WHERE `idproduct`"." = ".":productid");
            $parameters = array(":productid" => $productid);
            $stmt->execute($parameters);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Create product element
            for($i = 0; $i < count($results); $i++) {

                // Variables
                $name = $results[$i]["name"];
                $price = $results[$i]["price"];
                $screensize = $results[$i]["screensize"];
                
                // Replace . with , in price
                $price = substr_replace($price, ",", strlen($price) -3, 1);

                // Get image URL
                // Make lower case
                $imgUrl = strtolower($name);
                //Make alphanumeric
                $imgUrl = preg_replace("/[^a-z0-9_\s-]/", "", $imgUrl);
                //Clean up multiple dashes or whitespaces
                $imgUrl = preg_replace("/[\s-]+/", " ", $imgUrl);
                //Convert whitespaces and underscore to dash
                $imgUrl = preg_replace("/[\s_]/", "-", $imgUrl);
                echo "<li>
                    <a href=\"#\"><img src=\"../images/$imgUrl.jpg\" alt=\"$name\"></a>
                    <a href=\"#\">$name</a>
                    <p>Prijs: €$price</p>
                    <p>Schermgrootte: $screensize inch scherm</p>
                </li>";
            }
        }
    }
?>