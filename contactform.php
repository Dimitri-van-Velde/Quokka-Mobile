<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactformulier</title>
    <?php 
        include 'head.html'; 
    ?>
</head>

<body>
    <?php
        include 'nav.html';
    ?>
    <main>
        <section>
            <article class="form-container">
                <form class="contact" action="contactform.php" method="post">
                    <h2>Vragen?</h2>
                    <h3>We helpen U graag!</h3>
                    <fieldset>
                        <input placeholder="Voornaam" name="voornaam" type="text" tabindex="1" required autofocus>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Achternaam" name="achternaam" type="text" tabindex="2" required>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Uw Email Adres" name="email" type="email" tabindex="3" required>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Uw Telefoon Nummer" name="tel" type="tel" pattern="[0-9]{10}" tabindex="4"
                            required>
                    </fieldset>
                    <fieldset>
                        <textarea placeholder="Typ Uw vraag hier...." tabindex="5" name="vraag" required></textarea>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit">Submit</button>
                    </fieldset>
                </form>

                <?php
                
                    // Variables
                    // Form Info
                    $vNaam = $_POST["voornaam"] ?? "";
                    $aNaam = $_POST["achternaam"] ?? "";
                    $email = $_POST["email"] ?? "";
                    $tel = $_POST["tel"] ?? "";
                    $vraag= $_POST["vraag"] ?? "";

                    // Timestamp
                    $timestamp = date("c");
                    
                    // Webhook URL
                    $url = "https://discord.com/api/webhooks/910252315573895218/VJPppRzEJOj7dI3ZRcHis-THXvOqodo7dc0ouEUDB6xV8womwvzxqOEFY4Bv-Kz6ztsM";

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
                    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

                    // Check if form is filled in
                    if($vNaam != "" && $aNaam != "" && $email != "" && $tel != "" && $vraag != "") {

                        // Alert function
                        function alert($alertMsg) {
                            echo "<script type='text/javascript'>alert('$alertMsg');</script>";
                        }
                        
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
                        alert("Bedankt voor het vragen $vNaam, we hopen u zo snel mogelijk te kunnen helpen!");
                    }

                ?>

            </article>
        </section>
    </main>
    <?php
        include 'footer.html';
    ?>
</body>

</html>