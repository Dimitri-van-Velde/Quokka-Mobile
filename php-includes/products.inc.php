<?php

class Products extends Dbh
{

    // Get Products Function
    public function getProducts()
    {

        if (isset($_GET["search"])) {

            // Strip tags from input
            $strippedInput = strip_tags($_GET["search"]);

            // Database Query
            $stmt = $this->connect()->prepare("SELECT * FROM `products` WHERE `name` LIKE :user_input AND `hidden` = 0");
            $parameters = array(":user_input" => "%" . $strippedInput . "%");
            $stmt->execute($parameters);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Check if something is found
            if ($results != null) {

                echo "<script>
                        document.title = \"Zoekresultaten voor \\\"$strippedInput\\\"\";
                    </script>
                    ";

                // Create product element
                for ($i = 0; $i < count($results); $i++) {

                    // Variables
                    $name = $results[$i]["name"];
                    $price = $results[$i]["price"];
                    $screenSize = $results[$i]["screensize"];

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
                            <p>Prijs: €" . number_format($price,  2, ",<sup>", ".") . "</p>
                        </li>";
                }
            } else {
                echo "<script>
                        document.title = \"Zoekresultaten voor \\\"$strippedInput\\\"\";
                    </script>
                    ";
                echo "<p>Geen resultaten gevonden voor: <b>" . $strippedInput . "</b></p>";
            }

            // Check if price filter is used
        } else {

            // Database Query
            $stmt = $this->connect()->prepare("SELECT `products`.*, `sales`.`sold` FROM `products` 
                    JOIN `sales` ON `products`.`idproduct` = `sales`.`idproduct` 
                    WHERE `hidden` = 0
                    ORDER BY `sold` DESC");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Check if something is found
            if ($results != null) {

                // Create product element
                for ($i = 0; $i < count($results); $i++) {

                    // Variables
                    $name = $results[$i]["name"];
                    $price = $results[$i]["price"];
                    $screenSize = $results[$i]["screensize"];

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
                            <p>Prijs: €" . number_format($price,  2, ",<sup>", ".") . "</p>
                        </li>";
                }
            }
        }
    }
}
