<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <?php 
        include 'head.html'; 
    ?>
</head>

<body>
    <main>

        <?php

            // Variables
            $output = $_POST["search"];
            $searchResult = "Er is gezocht naar: $output";
            $url = "https://discord.com/api/webhooks/910216656318513182/6BKSXzfrrBYqpTc2ceYpMMKea-91TtH9k-RfLYjHj2WJMZ2MIeAsfeZWoxcPqL85nkQy";
            $headers = [ 'Content-Type: application/json; charset=utf-8' ];
            $POST = [ 'username' => 'Zoekresultaat', 'content' => $searchResult ];

            // Echo to screen
            echo "<center>Sending result to Discord!</center>";

            // Send to Discord
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
            $response   = curl_exec($ch);

        ?>

    </main>
    <?php
        include 'footer.html';
    ?>
</body>

</html>