<?php

    class User extends Dbh {

        // $_POST["search"];

        // Get Products Function
        public function getAllProducts() {
            // Database Query
            $stmt = $this->connect()->prepare("SELECT * FROM `products` WHERE `name` LIKE :user_input");
            $parameters = array(":user_input" => "%".$_POST["search"]."%");
            $stmt->execute($parameters);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Create product element
            echo "<article class=\"product\">
            <ul>";

            for($i = 0; $i < count($results); $i++) {

                // echo $results[$i]["name"]."<br>";

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
                    <a href=\"#\"><img src=\"images/$imgUrl.jpg\" alt=\"$name\"></a>
                    <a href=\"#\">$name</a>
                    <p>Prijs: €$price</p>
                    <p>Schermgrootte: $screensize inch scherm</p>
                </li>";

            }

            echo "</ul>
            </article>";

        }
    }

?>