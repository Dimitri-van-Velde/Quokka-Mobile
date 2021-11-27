<?php

include_once 'dbh.inc.php';

$dbh = new Dbh;

    if(isset($_POST["query"])) {

        // Connect to database
        $dsn = $dbh->connect();

        // Set data array
        $data = array();

        // Replace special chars
        $condition = preg_replace("/[^A-Za-z0-9\- ]/", "", $_POST["query"]);

        // Query
        $query = "
        SELECT `name` FROM `products` 
            WHERE `name` LIKE \"%".$condition."%\"
            ORDER BY `sold` DESC
            LIMIT 3
        ";

        $result = $dsn->query($query);

        $replace_string = "<b>".$condition."</b>";

        // Put result into array
        foreach($result as $row) {

            //var_dump($row["name"]);

            $data[] = array(
                //'name' => $row["name"]
                "name" => str_ireplace($condition, $replace_string, $row["name"])
            );

        }

        // var_dump($data);

        // Send back as json
        echo json_encode($data);

    }

?>