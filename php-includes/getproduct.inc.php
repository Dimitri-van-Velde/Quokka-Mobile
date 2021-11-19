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
                $color = $results[$i]["color"];
                $releasedate = $results[$i]["releasedate"];
                
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
                echo "
                    <a href=\"javascript:history.go(-1)\" class=\"back-arrow\">&LeftArrow; Terug</a>
                    <article class=\"product-page-image\">
                        <img src=\"../images/$url.jpg\" alt=\"$name\">
                    </article>
                    <article class=\"product-page-info\">
                        <ul>
                            <li>Prijs: €$price<sup>$pricecomma</sup></li>
                            <li>Schermgrootte: $screensize inch scherm</li>
                            <li>Kleur: $color</li>
                            <li>Releasedatum: $releasedate</li>
                        </ul>
                    </article>
                ";
            }
        }
    }
?>