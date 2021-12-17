<?php

include_once 'dbh.inc.php';

$dbh = new Dbh;

if (isset($_POST["brand"])) {

    // Connect to database
    $dsn = $dbh->connect();

    // Set data array
    $data = array();

    // Get brand value
    $brand = $_POST["brand"];

    // Set query based on sort value
    if ($_POST["current_sort"] == "popularity") {

        $query = "
            SELECT `products`.*, `sales`.`sold` FROM `products` 
                JOIN `sales` ON `products`.`idproduct` = `sales`.`idproduct` 
                WHERE `idbrand` = $brand AND `hidden` = 0
                ORDER BY `sold` DESC
            ";
    } elseif ($_POST["current_sort"] == "priceLtH") {

        $query = "
            SELECT * FROM `products`
                WHERE `idbrand` = $brand AND `hidden` = 0
                ORDER BY `price` ASC
            ";
    } elseif ($_POST["current_sort"] == "priceHtL") {

        $query = "
            SELECT * FROM `products`
                WHERE `idbrand` = $brand AND `hidden` = 0
                ORDER BY `price` DESC
            ";
    } elseif ($_POST["current_sort"] == "releaseNtO") {

        $query = "
            SELECT * FROM `products`
                WHERE `idbrand` = $brand AND `hidden` = 0
                ORDER BY `releasedate` DESC
            ";
    } elseif ($_POST["current_sort"] == "releaseOtN") {

        $query = "
            SELECT * FROM `products`
                WHERE `idbrand` = $brand AND `hidden` = 0
                ORDER BY `releasedate` ASC
            ";
    }

    $result = $dsn->query($query);

    // Put result into array
    foreach ($result as $row) {

        $data[] = array(
            "name" => $row["name"],
            "price" => number_format($row["price"],  2, ",<sup>", ".")
        );
    }

    // Send back as json
    echo json_encode($data);
}
