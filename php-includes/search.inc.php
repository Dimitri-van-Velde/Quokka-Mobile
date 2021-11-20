<?php

    if(isset($_POST["query"])) {

        // Variable Information
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "quokka_mobile";
        $charset = "utf8mb4";

        // Connect to database
        $dsn = "mysql:host=".$servername.";dbname=".$dbname.";charset=".$charset;
        $connect = new PDO($dsn, $username, $password);

        // Set data array
        $data = array();

        // Replace special chars
        $condition = preg_replace("/[^A-Za-z0-9\- ]/", "", $_POST["query"]);

        // Query
        $query = "
        SELECT `name` FROM `products` 
            WHERE `name` LIKE \"%".$condition."%\"
            ORDER BY `idproduct` DESC
            LIMIT 3
        ";

        $result = $connect->query($query);

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