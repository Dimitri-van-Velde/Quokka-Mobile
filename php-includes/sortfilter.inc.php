<?php

include_once 'dbh.inc.php';

$dbh = new Dbh;

    if(isset($_POST["sort"])) {
        

        // Connect to database
        $dsn = $dbh->connect();

        // Set data array
        $data = array();

        // Get values
        $brand = $_POST["current_brand"];
        $search = $_POST["current_search"];

        // Set query 
        if($search == "") {
            if($brand == 0) {
                if($_POST["sort"] == "popularity") {

                    $query = "
                    SELECT `products`.*, `sales`.`sold` FROM `products` 
                        JOIN `sales` ON `products`.`idproduct` = `sales`.`idproduct` 
                        ORDER BY `sold` DESC
                    ";
                } elseif($_POST["sort"] == "priceLtH") {

                    $query = "
                    SELECT * FROM `products`
                        ORDER BY `price` ASC
                    ";
                } elseif($_POST["sort"] == "priceHtL") {

                    $query = "
                    SELECT * FROM `products`
                        ORDER BY `price` DESC
                    ";
                } elseif($_POST["sort"] == "releaseNtO") {

                    $query = "
                    SELECT * FROM `products`
                        ORDER BY `releasedate` DESC
                    ";
                } elseif($_POST["sort"] == "releaseOtN") {

                    $query = "
                    SELECT * FROM `products`
                        ORDER BY `releasedate` ASC
                    ";
                }
            } else {
                if($_POST["sort"] == "popularity") {

                    $query = "
                    SELECT `products`.*, `sales`.`sold` FROM `products` 
                        JOIN `sales` ON `products`.`idproduct` = `sales`.`idproduct` 
                        WHERE `idbrand` = $brand
                        ORDER BY `sold` DESC
                    ";
                } elseif($_POST["sort"] == "priceLtH") {

                    $query = "
                    SELECT * FROM `products`
                        WHERE `idbrand` = $brand
                        ORDER BY `price` ASC
                    ";
                } elseif($_POST["sort"] == "priceHtL") {

                    $query = "
                    SELECT * FROM `products`
                        WHERE `idbrand` = $brand
                        ORDER BY `price` DESC
                    ";
                } elseif($_POST["sort"] == "releaseNtO") {

                    $query = "
                    SELECT * FROM `products`
                        WHERE `idbrand` = $brand
                        ORDER BY `releasedate` DESC
                    ";
                } elseif($_POST["sort"] == "releaseOtN") {

                    $query = "
                    SELECT * FROM `products`
                        WHERE `idbrand` = $brand
                        ORDER BY `releasedate` ASC
                    ";
                } 
            }
        } else {
            if($brand == 0) {
                if($_POST["sort"] == "popularity") {

                    $query = "
                    SELECT `products`.*, `sales`.`sold` FROM `products` 
                        JOIN `sales` ON `products`.`idproduct` = `sales`.`idproduct` 
                        WHERE `name` LIKE \"%".$search."%\"
                        ORDER BY `sold` DESC
                    ";
                } elseif($_POST["sort"] == "priceLtH") {

                    $query = "
                    SELECT * FROM `products`
                    WHERE `name` LIKE \"%".$search."%\"
                        ORDER BY `price` ASC
                    ";
                } elseif($_POST["sort"] == "priceHtL") {

                    $query = "
                    SELECT * FROM `products`
                    WHERE `name` LIKE \"%".$search."%\"
                        ORDER BY `price` DESC
                    ";
                } elseif($_POST["sort"] == "releaseNtO") {

                    $query = "
                    SELECT * FROM `products`
                    WHERE `name` LIKE \"%".$search."%\"
                        ORDER BY `releasedate` DESC
                    ";
                } elseif($_POST["sort"] == "releaseOtN") {

                    $query = "
                    SELECT * FROM `products`
                    WHERE `name` LIKE \"%".$search."%\"
                        ORDER BY `releasedate` ASC
                    ";
                }
            } else {
                if($_POST["sort"] == "popularity") {

                    $query = "
                    SELECT `products`.*, `sales`.`sold` FROM `products` 
                        JOIN `sales` ON `products`.`idproduct` = `sales`.`idproduct` 
                        WHERE `idbrand` = $brand
                        AND WHERE `name` LIKE \"%".$search."%\"
                        ORDER BY `sold` DESC
                    ";
                } elseif($_POST["sort"] == "priceLtH") {

                    $query = "
                    SELECT * FROM `products`
                        WHERE `idbrand` = $brand
                        AND WHERE `name` LIKE \"%".$search."%\"
                        ORDER BY `price` ASC
                    ";
                } elseif($_POST["sort"] == "priceHtL") {

                    $query = "
                    SELECT * FROM `products`
                        WHERE `idbrand` = $brand
                        AND WHERE `name` LIKE \"%".$search."%\"
                        ORDER BY `price` DESC
                    ";
                } elseif($_POST["sort"] == "releaseNtO") {

                    $query = "
                    SELECT * FROM `products`
                        WHERE `idbrand` = $brand
                        AND WHERE `name` LIKE \"%".$search."%\"
                        ORDER BY `releasedate` DESC
                    ";
                } elseif($_POST["sort"] == "releaseOtN") {

                    $query = "
                    SELECT * FROM `products`
                        WHERE `idbrand` = $brand
                        AND WHERE `name` LIKE \"%".$search."%\"
                        ORDER BY `releasedate` ASC
                    ";
                } 
            }
        }

        $result = $dsn->query($query);

        // Put result into array
        foreach($result as $row) {

            $data[] = array(
                "name" => $row["name"],
                "price" => $row["price"]
            );

        }

        // Send back as json
        echo json_encode($data);
    }
?>