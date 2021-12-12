<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verwerk</title>
    <?php
    include 'head.html';
    ?>
</head>

<body>
    <main>

        <?php

        // Variables
        // Form Info
        $vNaam = $_POST["voornaam"];
        $aNaam = $_POST["achternaam"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $vraag = $_POST["vraag"];

        // Timestamp
        $timestamp = date("c");

        // Webhook URL
        $url = "https://discord.com/api/webhooks/910216656318513182/6BKSXzfrrBYqpTc2ceYpMMKea-91TtH9k-RfLYjHj2WJMZ2MIeAsfeZWoxcPqL85nkQy";

        // Embed for Discord
        $embedResult = json_encode([
            "username" => "Contactformulier",
            "avatar_url" => "https://gamednm.com/logo.png",
            "tts" => false,
            "embeds" => [
                [
                    "title" => "Contact formulier van $vNaam $aNaam",
                    "type" => "rich",
                    // Make sure color is in decimal!!
                    "color" => "1776411",
                    // Make sure timestamp is formatted as ISO8601
                    "timestamp" => $timestamp,
                    "footer" => [
                        "text" => "www.quokkamobile.nl",
                        "icon_url" => "https://gamednm.com/logo.png"
                    ],
                    "thumbnail" =>  [
                        "url" => "https://gamednm.com/logo.png"
                    ],
                    "fields" => [
                        [
                            "name" => "Voornaam: ",
                            "value" => $vNaam
                        ],
                        [
                            "name" => "Achternaam: ",
                            "value" => $aNaam
                        ],
                        [
                            "name" => "Email Adres: ",
                            "value" => $email
                        ],
                        [
                            "name" => "Telefoon Nummer: ",
                            "value" => $tel
                        ],
                        [
                            "name" => "Vraag: ",
                            "value" => $vraag
                        ]
                    ]
                ]

            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        // Send to Discord
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $embedResult,
            CURLOPT_HTTPHEADER => [
                "Length" => strlen($embedResult),
                "Content-Type: application/json"
            ]
        ]);

        $response = curl_exec($ch);
        curl_close($ch);


        // Echo to screen
        // echo "<b><center>Sending result to Discord!</center>

        ?>

    </main>
    <?php
    include 'footer.html';
    ?>
</body>

</html>