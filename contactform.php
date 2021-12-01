<?php
    session_start();
?>

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
        include 'nav.php';
    ?>
    <main>
        <section>
            <article class="form-container">
                <?php 
                    if(isset($_SESSION["userid"])) {
                ?>
                    <form class="contact" action="contactform.php" method="post">
                    <h2>Vragen?</h2>
                    <h3>We helpen U graag!</h3>
                    <fieldset>
                        <input placeholder="Voornaam" name="voornaam" id="voornaam" type="text" tabindex="1" required autofocus 
                        value="<?php echo $_SESSION["firstname"]; ?>">
                    </fieldset>
                    <fieldset>
                        <input placeholder="Achternaam" name="achternaam" id="achternaam" type="text" tabindex="2" required
                        value="<?php 
                            if($_SESSION["preposition"] != "") {
                                echo $_SESSION["preposition"] . " " . $_SESSION["lastname"];
                            } else {
                                echo $_SESSION["lastname"];
                            }
                        ?>">
                    </fieldset>
                    <fieldset>
                        <input placeholder="Uw Emailadres" name="email" id="email" type="email" tabindex="3" required
                        value="<?php echo $_SESSION["email"]; ?>">
                    </fieldset>
                    <fieldset>
                        <input placeholder="Uw Telefoonnummer" name="tel" id="tel" type="tel" pattern="[0-9]{10}" tabindex="4"
                            required value="<?php echo $_SESSION["phonenumber"]; ?>">
                    </fieldset>
                    <fieldset>
                        <select name="soort" id="soort" onchange="getOption(this)" tabindex="5" required>
                            <option value="empty" disabled selected>Kies uw onderwerp</option>
                            <option value="vraag">Vraag</option>
                            <option value="mening">Mening</option>
                            <option value="bug">Bug/Fout</option>
                        </select>
                    </fieldset>
                    <fieldset id="vraag">
                        <textarea placeholder="Typ uw vraag hier...." tabindex="6" name="vraag"></textarea>
                    </fieldset>
                    <fieldset id="mening">
                        <textarea placeholder="Typ uw mening hier...." tabindex="6" name="mening"></textarea>
                    </fieldset>
                    <fieldset id="bug_page">
                        <select name="bug_page" tabindex="6">
                            <option value="empty" disabled selected>Locatie Bug/Fout</option>
                            <option value="home">Home</option>
                            <option value="bedrijf">Quokka Mobile</option>
                            <option value="personeel">Personeel</option>
                            <option value="producten">Producten</option>
                            <option value="contact">Contact</option>
                            <option value="contactform">Contact Formulier</option>
                        </select>
                    </fieldset>
                    <fieldset id="bug">
                        <textarea placeholder="Beschrijf de fout hier...." tabindex="7" name="bug"></textarea>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit">Submit</button>
                    </fieldset>
                </form>
                <?php
                    } else {
                ?>                            
                    <form class="contact" action="contactform.php" method="post">
                    <h2>Vragen?</h2>
                    <h3>We helpen U graag!</h3>
                    <fieldset>
                        <input placeholder="Voornaam" name="voornaam" id="voornaam" type="text" tabindex="1" required autofocus>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Achternaam" name="achternaam" id="achternaam" type="text" tabindex="2" required>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Uw Emailadres" name="email" id="email" type="email" tabindex="3" required>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Uw Telefoonnummer" name="tel" id="tel" type="tel" pattern="[0-9]{10}" tabindex="4"
                            required>
                    </fieldset>
                    <fieldset>
                        <select name="soort" id="soort" onchange="getOption(this)" tabindex="5" required>
                            <option value="empty" disabled selected>Kies uw onderwerp</option>
                            <option value="vraag">Vraag</option>
                            <option value="mening">Mening</option>
                            <option value="bug">Bug/Fout</option>
                        </select>
                    </fieldset>
                    <fieldset id="vraag">
                        <textarea placeholder="Typ uw vraag hier...." tabindex="6" name="vraag"></textarea>
                    </fieldset>
                    <fieldset id="mening">
                        <textarea placeholder="Typ uw mening hier...." tabindex="6" name="mening"></textarea>
                    </fieldset>
                    <fieldset id="bug_page">
                        <select name="bug_page" tabindex="6">
                            <option value="empty" disabled selected>Locatie Bug/Fout</option>
                            <option value="home">Home</option>
                            <option value="bedrijf">Quokka Mobile</option>
                            <option value="personeel">Personeel</option>
                            <option value="producten">Producten</option>
                            <option value="contact">Contact</option>
                            <option value="contactform">Contact Formulier</option>
                        </select>
                    </fieldset>
                    <fieldset id="bug">
                        <textarea placeholder="Beschrijf de fout hier...." tabindex="7" name="bug"></textarea>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit">Submit</button>
                    </fieldset>
                </form>
                <?php
                    }
                ?>
                

                <?php
                
                    // Variables
                    // Form Info
                    $vNaam = $_POST["voornaam"] ?? "";
                    $aNaam = $_POST["achternaam"] ?? "";
                    $email = $_POST["email"] ?? "";
                    $tel = $_POST["tel"] ?? "";
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
                                            "name" => "Mening: ",
                                            "value" => $mening
                                        ]
                                    ]
                                ]

                            ]
                        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

                        // Check if form is filled in
                        if($vNaam != "" && $aNaam != "" && $email != "" && $tel != "" && $mening != "") {

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
                            alert("Bedankt voor het geven van uw mening $vNaam!");
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
                                            "name" => "Pagina Bug: ",
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
                        if($vNaam != "" && $aNaam != "" && $email != "" && $tel != "" && $bug != "") {

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
                            alert("Bedankt voor het aangeven van de fout $vNaam, we hopen het zo snel mogelijk op te lossen!");
                        }
                    }

                ?>

                <script>

                    // Get which select option is picked
                    function getOption(selectObject) {
                        var value = selectObject.value;

                        // Check which option is picked
                        if(value == "vraag") {
                            // Show element
                            document.getElementById("vraag").style.display = "block";

                            // Hide other elements
                            document.getElementById("mening").style.display = "none";
                            document.getElementById("bug").style.display = "none";
                            document.getElementById("bug_page").style.display = "none";
                        } else if(value == "mening") {
                            // Show element
                            document.getElementById("mening").style.display = "block";

                            // Hide other elements
                            document.getElementById("vraag").style.display = "none";
                            document.getElementById("bug").style.display = "none";
                            document.getElementById("bug_page").style.display = "none";
                        } else if(value == "bug") {
                            // Show elements
                            document.getElementById("bug").style.display = "block";
                            document.getElementById("bug_page").style.display = "block";

                            // Hide other elements
                            document.getElementById("mening").style.display = "none";
                            document.getElementById("vraag").style.display = "none";
                        } else {
                            // Hide other elements
                            document.getElementById("vraag").style.display = "none";
                            document.getElementById("mening").style.display = "none";
                            document.getElementById("bug").style.display = "none";
                            document.getElementById("bug_page").style.display = "none";
                        };
                    }

                </script>

            </article>
        </section>
    </main>
    <?php
        include 'footer.html';
    ?>
</body>

</html>