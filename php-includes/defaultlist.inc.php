<?php

include_once 'dbh.inc.php';

$dbh = new Dbh;

if (isset($_POST["default_list"])) {

    // Connect to database
    $dsn = $dbh->connect();

    // Set data array
    $data = array();

    // Query
    $query = "
        SELECT `products`.*, `sales`.`sold` FROM `products` 
            JOIN `sales` ON `products`.`idproduct` = `sales`.`idproduct` 
            ORDER BY `sold` DESC
        ";

    $result = $dsn->query($query);

    // Put result into array
    foreach ($result as $row) {

        $data[] = array(
            "name" => $row["name"],
            "price" => $row["price"]
        );
    }

    // Send back as json
    echo json_encode($data);
}
