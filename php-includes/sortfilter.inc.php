<?php

include_once 'dbh.inc.php';

$dbh = new Dbh;

    if(isset($_POST["sort"])) {
        

        // Connect to database
        $dsn = $dbh->connect();

        // Set data array
        $data = array();

        // Get brand value
        $brand = $_POST["current_brand"];

        // Set query based on brand value
        if($brand == 0) {
            if($_POST["sort"] == "popularity") {

                $query = "
                SELECT * FROM `products`
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
                SELECT * FROM `products`
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