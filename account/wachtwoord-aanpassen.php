<?php
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location: ../login.php?redirect=account");
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION["firstname"] ?> | Wachtwoord Aanpassen</title>
    <?php
    include '../head.html';
    ?>
</head>

<body>
    <?php
    include '../nav.php';
    ?>
    <main>
        <section class="account">
            <article class="account-list">
                <ul>
                    <li>
                        <a href="overzicht.php">
                            <svg version="1.1" viewBox="0 0 24 24" aria-hidden="true" focusable="false" class="account-svg">
                                <path d="M12 24c-3 0-7.1-.7-9-2.5-.6-.6-1-1.4-1-2.2 0-3.8 2.6-7.2 6.3-8.6C6.9 9.6 6 7.9 6 6c0-3.3 2.7-6 6-6s6 2.7 6 6c0 1.9-.9 3.6-2.3 4.7 3.6 1.4 6.3 4.8 6.3 8.6 0 3.4-6 4.7-10 4.7zm0-12c-4.3 0-8 3.3-8 7.3 0 .1 0 .4.4.7 1.1 1.1 4.3 2 7.6 2 4.5 0 8-1.5 8-2.7 0-4-3.7-7.3-8-7.3zm0-10C9.8 2 8 3.8 8 6s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z">
                                </path>
                            </svg>Accountoverzicht
                        </a>
                    </li>
                    <li>
                        <a href="gegevens.php" class="account-current-page">
                            <svg version="1.1" viewBox="0 0 14 14" aria-hidden="true" class="account-svg" focusable="false">
                                <g fill-rule="nonzero">
                                    <path d="M5.834 2.999a4.141 4.141 0 00-.838.347l-.49-.245c-.247-.123-.608-.07-.8.121l-.484.485c-.183.183-.246.55-.12.799l.244.49A4.141 4.141 0 003 5.834l-.52.173c-.261.087-.479.38-.479.65v.685c0 .26.215.563.48.651l.519.173c.085.294.202.575.347.838l-.245.49c-.123.247-.07.608.121.8l.485.484c.183.183.55.246.799.12l.49-.244c.263.145.544.262.838.347l.173.52c.087.261.38.479.65.479h.685c.26 0 .563-.215.651-.48l.173-.519c.294-.085.575-.202.838-.347l.49.245c.247.123.608.07.8-.121l.484-.485c.183-.183.246-.55.12-.799l-.244-.49c.145-.263.262-.544.347-.838l.52-.173c.261-.087.479-.38.479-.65v-.685c0-.26-.215-.563-.48-.651l-.519-.173a4.141 4.141 0 00-.347-.838l.245-.49c.123-.247.07-.608-.121-.8l-.485-.484c-.183-.183-.55-.246-.799-.12l-.49.244A4.141 4.141 0 008.166 3l-.173-.52C7.906 2.219 7.613 2 7.343 2h-.685c-.26 0-.563.215-.651.48l-.173.519zm-.776-.836C5.281 1.496 5.962 1 6.658 1h.684c.706 0 1.378.497 1.6 1.163l.018.055.035.015.052-.026c.63-.315 1.462-.184 1.954.308l.484.484c.499.5.622 1.326.308 1.954l-.026.052.015.035.055.018c.667.223 1.163.904 1.163 1.6v.684c0 .706-.497 1.378-1.163 1.6l-.055.018-.015.035.026.052c.315.63.184 1.462-.308 1.954l-.484.484c-.5.499-1.326.622-1.954.308l-.052-.026-.035.015-.018.055c-.223.667-.904 1.163-1.6 1.163h-.684c-.706 0-1.378-.497-1.6-1.163l-.018-.055a5.143 5.143 0 01-.035-.015l-.052.026c-.63.315-1.462.184-1.954-.308L2.515 11c-.499-.5-.622-1.326-.308-1.954l.026-.052a5.14 5.14 0 01-.015-.035l-.055-.018C1.496 8.719 1 8.038 1 7.342v-.684c0-.706.497-1.378 1.163-1.6l.055-.018a5.14 5.14 0 01.015-.035l-.026-.052c-.315-.63-.184-1.462.308-1.954L3 2.515c.5-.499 1.326-.622 1.954-.308l.052.026a5.14 5.14 0 01.035-.015l.018-.055z">
                                    </path>
                                    <path d="M7 8.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm0 1a2.5 2.5 0 110-5 2.5 2.5 0 010 5z">
                                    </path>
                                </g>
                            </svg>Gegevens aanpassen
                        </a>
                    </li>
                    <li>
                        <a href="bestellingen.php">
                            <svg version="1.1" viewBox="0 0 14 14" aria-hidden="true" class="account-svg" focusable="false">
                                <path fill-rule="evenodd" d="M10 1H4L1 5v9h12.038L13 5l-3-4zm2 4H7.5V2h2.25L12 5zM4.25 2H6.5v3H2l2.25-3zM2 13h10V6H2v7z">
                                </path>
                            </svg>Bestellingen
                        </a>
                    </li>
                    <li>
                        <a href="cart.php">
                            <svg version="1.1" viewBox="0 0 24 24" aria-hidden="true" class="account-svg" focusable="false">
                                <path d="M23.9 6.5c0-.8-.7-1.5-1.5-1.5H5.8l-1-4H1c-.6 0-1 .4-1 1s.4 1 1 1h2.2L4 6.2l2.9 11.6c-.5.6-.9 1.4-.9 2.2 0 1.7 1.3 3 3 3s3-1.3 3-3c0-.4-.1-.7-.2-1h4.4c-.1.3-.2.6-.2 1 0 1.7 1.3 3 3 3s3-1.3 3-3c0-.9-.4-1.6-.9-2.2l2.7-11c0-.1.1-.2.1-.3zM10 20c0 .6-.4 1-1 1s-1-.4-1-1 .4-1 1-1 1 .4 1 1zm9 1c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm.2-4H8.8L6.3 7h15.4l-2.5 10z"></path>
                            </svg>Winkelwagen
                        </a>
                    </li>
                    <?php
                    // Check beheerder
                    if ($_SESSION["perms"] == 1) {
                    ?>
                        <h3>Beheerder: </h3>
                        <li>
                            <a href="productmanager.php">
                                <svg version="1.1" viewBox="0 0 14 14" aria-hidden="true" class="account-svg" focusable="false">
                                    <path fill-rule="evenodd" d="M10 1H4L1 5v9h12.038L13 5l-3-4zm2 4H7.5V2h2.25L12 5zM4.25 2H6.5v3H2l2.25-3zM2 13h10V6H2v7z">
                                    </path>
                                </svg>Manage producten
                            </a>
                        </li>
                        <li>
                            <a href="usermanager.php">
                                <svg version="1.1" viewBox="0 0 24 24" aria-hidden="true" focusable="false" class="account-svg">
                                    <path d="M12 24c-3 0-7.1-.7-9-2.5-.6-.6-1-1.4-1-2.2 0-3.8 2.6-7.2 6.3-8.6C6.9 9.6 6 7.9 6 6c0-3.3 2.7-6 6-6s6 2.7 6 6c0 1.9-.9 3.6-2.3 4.7 3.6 1.4 6.3 4.8 6.3 8.6 0 3.4-6 4.7-10 4.7zm0-12c-4.3 0-8 3.3-8 7.3 0 .1 0 .4.4.7 1.1 1.1 4.3 2 7.6 2 4.5 0 8-1.5 8-2.7 0-4-3.7-7.3-8-7.3zm0-10C9.8 2 8 3.8 8 6s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z">
                                    </path>
                                </svg>Manage users
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="../php-includes/logout.inc.php" class="account-logout">
                            <svg version="1.1" viewBox="0 0 14 14" aria-hidden="true" class="account-svg" focusable="false">
                                <g fill-rule="evenodd">
                                    <path d="M12.601 6.393l.25.252a.504.504 0 01-.004.711L11.144 9.06a.507.507 0 01-.71.002.501.501 0 01.004-.71l.855-.855H6v-1h5.293l-.86-.86a.504.504 0 01.001-.706.495.495 0 01.706-.002l1.428 1.428a.485.485 0 01.033.037z">
                                    </path>
                                    <path fill-rule="nonzero" d="M10.348 2.636l-.039-.03a5.5 5.5 0 10-.001 8.788.5.5 0 10-.602-.798 4.5 4.5 0 110-7.19l.033.023a.5.5 0 10.61-.793z">
                                    </path>
                                </g>
                            </svg>Log Uit
                        </a>
                    </li>
                </ul>
            </article>
            <article class="account-content">
                <h2>Wachtwoord aanpassen</h2>
                <form action="../php-includes/changepassword.inc.php" method="post" class="change-form">
                    <fieldset class="change-pers">
                        <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                        ?>
                                <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                    <p>Vul alle verplichte velden
                                        in om aan te kunnen passen!</p>
                                </span>
                            <?php
                            } elseif ($_GET["error"] == "stmtfailed") {
                            ?>
                                <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                    <p>Er was een fout
                                        in verbinden met de database! Neem A.U.B. <a href="../contactform.php">contact</a> op met
                                        ons
                                        op!</p>
                                </span>
                            <?php
                            } elseif ($_GET["error"] == "passwordmatch") {
                            ?>
                                <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                    <p>De nieuwe wachtwoorden die u heeft ingetypt komt niet over met elkaar! Probeer het nog eens.</p>
                                </span>
                            <?php
                            } elseif ($_GET["error"] == "oldmatchnew") {
                            ?>
                                <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                    <p>Het wachtwoord dat u heeft ingetypt komt over met uw huidige wachtwoord. Vul een ander wachtwoord in om het te kunnen veranderen.</p>
                                </span>
                            <?php
                            } elseif ($_GET["error"] == "wrongpassword") {
                            ?>
                                <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                    <p>Het wachtwoord dat u heeft ingetypt klopt niet! Probeer het nog eens.</p>
                                </span>
                        <?php
                            }
                        }
                        ?>
                        <fieldset>
                            <article class="showhide" id="showhide" onclick="showPassword()"> <svg version="1.1" viewBox="0 0 37.519 37.519">
                                    <g>
                                        <path d="M37.087,17.705c-0.334-0.338-8.284-8.276-18.327-8.276S0.766,17.367,0.433,17.705c-0.577,0.584-0.577,1.523,0,2.107
                                                c0.333,0.34,8.284,8.277,18.327,8.277s17.993-7.938,18.327-8.275C37.662,19.23,37.662,18.29,37.087,17.705z M18.76,25.089
                                                c-6.721,0-12.604-4.291-15.022-6.332c2.411-2.04,8.281-6.328,15.022-6.328c6.72,0,12.604,4.292,15.021,6.332
                                                C31.369,20.802,25.501,25.089,18.76,25.089z M18.76,13.009c3.176,0,5.75,2.574,5.75,5.75c0,3.175-2.574,5.75-5.75,5.75
                                                c-3.177,0-5.75-2.574-5.75-5.75C13.01,15.584,15.583,13.009,18.76,13.009z" />
                                    </g>
                                </svg>
                                Zie Wachtwoord
                            </article>
                            <input type="password" name="password" id="password" placeholder="Huidig Wachtwoord" tabindex="1" pattern=".{8,}" autofocus>
                        </fieldset>
                        <fieldset>
                            <article class="showhide" id="showhide1" onclick="showPassword1()"> <svg version="1.1" viewBox="0 0 37.519 37.519">
                                    <g>
                                        <path d="M37.087,17.705c-0.334-0.338-8.284-8.276-18.327-8.276S0.766,17.367,0.433,17.705c-0.577,0.584-0.577,1.523,0,2.107
                                                c0.333,0.34,8.284,8.277,18.327,8.277s17.993-7.938,18.327-8.275C37.662,19.23,37.662,18.29,37.087,17.705z M18.76,25.089
                                                c-6.721,0-12.604-4.291-15.022-6.332c2.411-2.04,8.281-6.328,15.022-6.328c6.72,0,12.604,4.292,15.021,6.332
                                                C31.369,20.802,25.501,25.089,18.76,25.089z M18.76,13.009c3.176,0,5.75,2.574,5.75,5.75c0,3.175-2.574,5.75-5.75,5.75
                                                c-3.177,0-5.75-2.574-5.75-5.75C13.01,15.584,15.583,13.009,18.76,13.009z" />
                                    </g>
                                </svg>
                                Zie Wachtwoord
                            </article>
                            <input type="password" name="newpassword" id="newpassword" placeholder="Nieuw Wachtwoord" tabindex="2" pattern=".{8,}">
                        </fieldset>
                        <fieldset>
                            <article class="showhide" id="showhide2" onclick="showPassword2()"> <svg version="1.1" viewBox="0 0 37.519 37.519">
                                    <g>
                                        <path d="M37.087,17.705c-0.334-0.338-8.284-8.276-18.327-8.276S0.766,17.367,0.433,17.705c-0.577,0.584-0.577,1.523,0,2.107
                                                c0.333,0.34,8.284,8.277,18.327,8.277s17.993-7.938,18.327-8.275C37.662,19.23,37.662,18.29,37.087,17.705z M18.76,25.089
                                                c-6.721,0-12.604-4.291-15.022-6.332c2.411-2.04,8.281-6.328,15.022-6.328c6.72,0,12.604,4.292,15.021,6.332
                                                C31.369,20.802,25.501,25.089,18.76,25.089z M18.76,13.009c3.176,0,5.75,2.574,5.75,5.75c0,3.175-2.574,5.75-5.75,5.75
                                                c-3.177,0-5.75-2.574-5.75-5.75C13.01,15.584,15.583,13.009,18.76,13.009z" />
                                    </g>
                                </svg>
                                Zie Wachtwoord
                            </article>
                            <input type="password" name="newpasswordrepeat" id="newpasswordrepeat" placeholder="Herhaal Nieuw Wachtwoord" tabindex="3" pattern=".{8,}">
                        </fieldset>
                        <input type="submit" name="submit" value="Pas aan">
                    </fieldset>
                </form>
            </article>
            <script>
                function showPassword() {
                    var field = document.getElementById("password");
                    var showhide = document.getElementById("showhide");

                    if (field.type === "password") {
                        field.type = "text";
                        showhide.innerHTML = "<svg viewBox=\"0 0 37.519 37.519\" version=\"1.1\">" +
                            "<g>" +
                            "<g id=\"svg_3\"/>" +
                            "<g id=\"svg_4\"/>" +
                            "<g id=\"svg_5\"/>" +
                            "<g id=\"svg_6\"/>" +
                            "<g id=\"svg_7\"/>" +
                            "<g id=\"svg_8\"/>" +
                            "<g id=\"svg_9\"/>" +
                            "<g id=\"svg_10\"/>" +
                            "<g id=\"svg_11\"/>" +
                            "<g id=\"svg_12\"/>" +
                            "<g id=\"svg_13\"/>" +
                            "<g id=\"svg_14\"/>" +
                            "<g id=\"svg_15\"/>" +
                            "<g id=\"svg_16\"/>" +
                            "<g id=\"svg_17\"/>" +
                            "<path id=\"svg_2\" d=\"m37.087,17.705c-0.334,-0.338 -8.284,-8.276 -18.327,-8.276s-17.994,7.938 -18.327,8.276c-0.577,0.584 -0.577,1.523 0,2.107c0.333,0.34 8.284,8.277 18.327,8.277s17.993,-7.938 18.327,-8.275c0.575,-0.584 0.575,-1.524 0,-2.109zm-18.327,7.384c-6.721,0 -12.604,-4.291 -15.022,-6.332c2.411,-2.04 8.281,-6.328 15.022,-6.328c6.72,0 12.604,4.292 15.021,6.332c-2.412,2.041 -8.28,6.328 -15.021,6.328zm0,-12.08c3.176,0 5.75,2.574 5.75,5.75c0,3.175 -2.574,5.75 -5.75,5.75c-3.177,0 -5.75,-2.574 -5.75,-5.75c0,-3.175 2.573,-5.75 5.75,-5.75z\"/>" +
                            "</g>" +
                            "<line filter=\"url(#svg_20_blur)\" stroke-width=\"3\" stroke-linecap=\"undefined\" stroke-linejoin=\"undefined\" id=\"svg_20\" y2=\"35.01543\" x2=\"2\" y1=\"3\" x1=\"34.87325\" stroke=\"red\" fill=\"currentColor\"/>" +
                            "<line stroke-width=\"3\" stroke-linecap=\"undefined\" stroke-linejoin=\"undefined\" id=\"svg_23\" y2=\"32\" x2=\"4.82585\" y1=\"4.58888\" x1=\"32.97751\" stroke=\"red\" fill=\"currentColor\"/>" +
                            "</g>" +
                            "</svg>" +
                            "Verberg Wachtwoord";
                    } else {
                        field.type = "password";
                        showhide.innerHTML = "<svg version=\"1.1\" viewBox=\"0 0 37.519 37.519\">" +
                            "<g>" +
                            "<path d=\"M37.087,17.705c-0.334-0.338-8.284-8.276-18.327-8.276S0.766,17.367,0.433,17.705c-0.577,0.584-0.577,1.523,0,2.107" +
                            "c0.333,0.34,8.284,8.277,18.327,8.277s17.993-7.938,18.327-8.275C37.662,19.23,37.662,18.29,37.087,17.705z M18.76,25.089" +
                            "c-6.721,0-12.604-4.291-15.022-6.332c2.411-2.04,8.281-6.328,15.022-6.328c6.72,0,12.604,4.292,15.021,6.332" +
                            "C31.369,20.802,25.501,25.089,18.76,25.089z M18.76,13.009c3.176,0,5.75,2.574,5.75,5.75c0,3.175-2.574,5.75-5.75,5.75" +
                            "c-3.177,0-5.75-2.574-5.75-5.75C13.01,15.584,15.583,13.009,18.76,13.009z\" />" +
                            "</g>" +
                            "</svg>" +
                            "Zie Wachtwoord";
                    }
                }

                function showPassword1() {
                    var field = document.getElementById("newpassword");
                    var showhide = document.getElementById("showhide1");

                    if (field.type === "password") {
                        field.type = "text";
                        showhide.innerHTML = "<svg viewBox=\"0 0 37.519 37.519\" version=\"1.1\">" +
                            "<g>" +
                            "<g id=\"svg_3\"/>" +
                            "<g id=\"svg_4\"/>" +
                            "<g id=\"svg_5\"/>" +
                            "<g id=\"svg_6\"/>" +
                            "<g id=\"svg_7\"/>" +
                            "<g id=\"svg_8\"/>" +
                            "<g id=\"svg_9\"/>" +
                            "<g id=\"svg_10\"/>" +
                            "<g id=\"svg_11\"/>" +
                            "<g id=\"svg_12\"/>" +
                            "<g id=\"svg_13\"/>" +
                            "<g id=\"svg_14\"/>" +
                            "<g id=\"svg_15\"/>" +
                            "<g id=\"svg_16\"/>" +
                            "<g id=\"svg_17\"/>" +
                            "<path id=\"svg_2\" d=\"m37.087,17.705c-0.334,-0.338 -8.284,-8.276 -18.327,-8.276s-17.994,7.938 -18.327,8.276c-0.577,0.584 -0.577,1.523 0,2.107c0.333,0.34 8.284,8.277 18.327,8.277s17.993,-7.938 18.327,-8.275c0.575,-0.584 0.575,-1.524 0,-2.109zm-18.327,7.384c-6.721,0 -12.604,-4.291 -15.022,-6.332c2.411,-2.04 8.281,-6.328 15.022,-6.328c6.72,0 12.604,4.292 15.021,6.332c-2.412,2.041 -8.28,6.328 -15.021,6.328zm0,-12.08c3.176,0 5.75,2.574 5.75,5.75c0,3.175 -2.574,5.75 -5.75,5.75c-3.177,0 -5.75,-2.574 -5.75,-5.75c0,-3.175 2.573,-5.75 5.75,-5.75z\"/>" +
                            "</g>" +
                            "<line filter=\"url(#svg_20_blur)\" stroke-width=\"3\" stroke-linecap=\"undefined\" stroke-linejoin=\"undefined\" id=\"svg_20\" y2=\"35.01543\" x2=\"2\" y1=\"3\" x1=\"34.87325\" stroke=\"red\" fill=\"currentColor\"/>" +
                            "<line stroke-width=\"3\" stroke-linecap=\"undefined\" stroke-linejoin=\"undefined\" id=\"svg_23\" y2=\"32\" x2=\"4.82585\" y1=\"4.58888\" x1=\"32.97751\" stroke=\"red\" fill=\"currentColor\"/>" +
                            "</g>" +
                            "</svg>" +
                            "Verberg Wachtwoord";
                    } else {
                        field.type = "password";
                        showhide.innerHTML = "<svg version=\"1.1\" viewBox=\"0 0 37.519 37.519\">" +
                            "<g>" +
                            "<path d=\"M37.087,17.705c-0.334-0.338-8.284-8.276-18.327-8.276S0.766,17.367,0.433,17.705c-0.577,0.584-0.577,1.523,0,2.107" +
                            "c0.333,0.34,8.284,8.277,18.327,8.277s17.993-7.938,18.327-8.275C37.662,19.23,37.662,18.29,37.087,17.705z M18.76,25.089" +
                            "c-6.721,0-12.604-4.291-15.022-6.332c2.411-2.04,8.281-6.328,15.022-6.328c6.72,0,12.604,4.292,15.021,6.332" +
                            "C31.369,20.802,25.501,25.089,18.76,25.089z M18.76,13.009c3.176,0,5.75,2.574,5.75,5.75c0,3.175-2.574,5.75-5.75,5.75" +
                            "c-3.177,0-5.75-2.574-5.75-5.75C13.01,15.584,15.583,13.009,18.76,13.009z\" />" +
                            "</g>" +
                            "</svg>" +
                            "Zie Wachtwoord";
                    }
                }

                function showPassword2() {
                    var field = document.getElementById("newpasswordrepeat");
                    var showhide = document.getElementById("showhide2");

                    if (field.type === "password") {
                        field.type = "text";
                        showhide.innerHTML = "<svg viewBox=\"0 0 37.519 37.519\" version=\"1.1\">" +
                            "<g>" +
                            "<g id=\"svg_3\"/>" +
                            "<g id=\"svg_4\"/>" +
                            "<g id=\"svg_5\"/>" +
                            "<g id=\"svg_6\"/>" +
                            "<g id=\"svg_7\"/>" +
                            "<g id=\"svg_8\"/>" +
                            "<g id=\"svg_9\"/>" +
                            "<g id=\"svg_10\"/>" +
                            "<g id=\"svg_11\"/>" +
                            "<g id=\"svg_12\"/>" +
                            "<g id=\"svg_13\"/>" +
                            "<g id=\"svg_14\"/>" +
                            "<g id=\"svg_15\"/>" +
                            "<g id=\"svg_16\"/>" +
                            "<g id=\"svg_17\"/>" +
                            "<path id=\"svg_2\" d=\"m37.087,17.705c-0.334,-0.338 -8.284,-8.276 -18.327,-8.276s-17.994,7.938 -18.327,8.276c-0.577,0.584 -0.577,1.523 0,2.107c0.333,0.34 8.284,8.277 18.327,8.277s17.993,-7.938 18.327,-8.275c0.575,-0.584 0.575,-1.524 0,-2.109zm-18.327,7.384c-6.721,0 -12.604,-4.291 -15.022,-6.332c2.411,-2.04 8.281,-6.328 15.022,-6.328c6.72,0 12.604,4.292 15.021,6.332c-2.412,2.041 -8.28,6.328 -15.021,6.328zm0,-12.08c3.176,0 5.75,2.574 5.75,5.75c0,3.175 -2.574,5.75 -5.75,5.75c-3.177,0 -5.75,-2.574 -5.75,-5.75c0,-3.175 2.573,-5.75 5.75,-5.75z\"/>" +
                            "</g>" +
                            "<line filter=\"url(#svg_20_blur)\" stroke-width=\"3\" stroke-linecap=\"undefined\" stroke-linejoin=\"undefined\" id=\"svg_20\" y2=\"35.01543\" x2=\"2\" y1=\"3\" x1=\"34.87325\" stroke=\"red\" fill=\"currentColor\"/>" +
                            "<line stroke-width=\"3\" stroke-linecap=\"undefined\" stroke-linejoin=\"undefined\" id=\"svg_23\" y2=\"32\" x2=\"4.82585\" y1=\"4.58888\" x1=\"32.97751\" stroke=\"red\" fill=\"currentColor\"/>" +
                            "</g>" +
                            "</svg>" +
                            "Verberg Wachtwoord";
                    } else {
                        field.type = "password";
                        showhide.innerHTML = "<svg version=\"1.1\" viewBox=\"0 0 37.519 37.519\">" +
                            "<g>" +
                            "<path d=\"M37.087,17.705c-0.334-0.338-8.284-8.276-18.327-8.276S0.766,17.367,0.433,17.705c-0.577,0.584-0.577,1.523,0,2.107" +
                            "c0.333,0.34,8.284,8.277,18.327,8.277s17.993-7.938,18.327-8.275C37.662,19.23,37.662,18.29,37.087,17.705z M18.76,25.089" +
                            "c-6.721,0-12.604-4.291-15.022-6.332c2.411-2.04,8.281-6.328,15.022-6.328c6.72,0,12.604,4.292,15.021,6.332" +
                            "C31.369,20.802,25.501,25.089,18.76,25.089z M18.76,13.009c3.176,0,5.75,2.574,5.75,5.75c0,3.175-2.574,5.75-5.75,5.75" +
                            "c-3.177,0-5.75-2.574-5.75-5.75C13.01,15.584,15.583,13.009,18.76,13.009z\" />" +
                            "</g>" +
                            "</svg>" +
                            "Zie Wachtwoord";
                    }
                }
            </script>
        </section>
    </main>
    <?php
    include '../footer.html';
    ?>
</body>

</html>