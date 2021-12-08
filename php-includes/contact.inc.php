<?php

    // Variables
    // Form Info
    $vNaam = $_POST["voornaam"] ?? "";
    $aNaam = $_POST["achternaam"] ?? "";
    $email = $_POST["email"] ?? "";
    $tel = $_POST["tel"] ?? "";
    $rating = $_POST["rating"] ?? "";
    $vraag = $_POST["vraag"] ?? "";
    $mening = $_POST["mening"] ?? "";
    $bug = $_POST["bug"] ?? "";
    $vraagSoort = $_POST["soort"] ?? "";
    $bugPage = $_POST["bug_page"] ?? "";

    // Timestamp
    $timestamp = date("c");
    
    // Webhook URL
    $url = "https://discord.com/api/webhooks/910252315573895218/VJPppRzEJOj7dI3ZRcHis-THXvOqodo7dc0ouEUDB6xV8womwvzxqOEFY4Bv-Kz6ztsM";

    // Embed for Discord

    // Embed for Question
    if($vraagSoort == "vraag") {
        $embedResult = json_encode([
            "username" => "Contactformulier",
            "content" => "Er is een vraag formulier ingevult.",
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
                            "name" => "Emailadres: ",
                            "value" => $email
                        ],
                        [
                            "name" => "Telefoonnummer: ",
                            "value" => $tel
                        ],
                        [
                            "name" => "Rating: ",
                            "value" => $rating . " sterren"
                        ],
                        [
                            "name" => "Vraag: ",
                            "value" => $vraag
                        ]
                    ]
                ]

            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

        // Check if form is filled in
        if($vNaam != "" && $aNaam != "" && $email != "" && $tel != "" && $vraag != "" && $rating != "") {

            // Send to Discord
            $ch = curl_init();

            curl_setopt_array( $ch, [
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $embedResult,
                CURLOPT_HTTPHEADER => [
                    "Length" => strlen($embedResult),
                    "Content-Type: application/json"
                ]
            ]);

            $response = curl_exec( $ch );
            curl_close( $ch );
            header("Location: ../contactform.php?error=none");
        }
    } else if($vraagSoort == "mening") {
        $embedResult = json_encode([
            "username" => "Contactformulier",
            "content" => "Er is een menings formulier ingevult.",
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
                            "name" => "Emailadres: ",
                            "value" => $email
                        ],
                        [
                            "name" => "Telefoonnummer: ",
                            "value" => $tel
                        ],
                        [
                            "name" => "Rating: ",
                            "value" => $rating . " sterren"
                        ],
                        [
                            "name" => "Mening: ",
                            "value" => $mening
                        ]
                    ]
                ]

            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

        // Check if form is filled in
        if($vNaam != "" && $aNaam != "" && $email != "" && $tel != "" && $mening != "" && $rating != "") {

            // Send to Discord
            $ch = curl_init();

            curl_setopt_array( $ch, [
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $embedResult,
                CURLOPT_HTTPHEADER => [
                    "Length" => strlen($embedResult),
                    "Content-Type: application/json"
                ]
            ]);

            $response = curl_exec( $ch );
            curl_close( $ch );
            header("Location: ../contactform.php?error=none");
        }
    } else if($vraagSoort == "bug") {
        $embedResult = json_encode([
            "username" => "Contactformulier",
            "content" => "Er is een bug formulier ingevult.",
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
                            "name" => "Emailadres: ",
                            "value" => $email
                        ],
                        [
                            "name" => "Telefoonnummer: ",
                            "value" => $tel
                        ],
                        [
                            "name" => "Rating: ",
                            "value" => $rating . " sterren"
                        ],
                        [
                            "name" => "Locatie Bug: ",
                            "value" => $bugPage
                        ],
                        [
                            "name" => "Bug: ",
                            "value" => $bug
                        ]
                    ]
                ]

            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

        // Check if form is filled in
        if($vNaam != "" && $aNaam != "" && $email != "" && $tel != "" && $bug != "" && $rating != "") {

            // Send to Discord
            $ch = curl_init();

            curl_setopt_array( $ch, [
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $embedResult,
                CURLOPT_HTTPHEADER => [
                    "Length" => strlen($embedResult),
                    "Content-Type: application/json"
                ]
            ]);

            $response = curl_exec( $ch );
            curl_close( $ch );
            header("Location: ../contactform.php?error=none");
        }
    }

?>