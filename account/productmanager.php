<?php
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location: ../login.php?redirect=account");
}

if ($_SESSION["perms"] != 1) {
    header("Location: overzicht.php?redirect=noperms");
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Manager</title>
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
                        <a href="gegevens.php">
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
                            <a href="productmanager.php" class="account-current-page">
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
                <h2>Manage Producten</h2>
                <article class="account-content-select">
                    <form action="productmanager.php" method="post">
                        <input type="submit" name="producten" value="Producten ophalen" class="usermanager-submit">
                    </form>
                    <form action="productmanager.php" method="post">
                        <input type="submit" name="bestellingen" value="Bestellingen ophalen" class="usermanager-submit">
                    </form>
                </article>
                <?php

                // Hide product
                if (isset($_POST["hideproduct"])) {

                    require_once '../php-includes/dbh.inc.php';
                    $dsn = new Dbh;

                    // Change hidden value to 0 or 1
                    $stmt = $dsn->connect()->prepare("UPDATE `products` SET `hidden` = ? WHERE `idproduct` = ?;");

                    $stmt->execute(array($_POST["hide"], $_SESSION["action-uid"]));

                    $stmt = null;
                ?>
                    <form class="change-form">
                        <fieldset class="change-pers">
                            <span class="login-check-message"><img src="../images/check.svg" alt="Check Icon">
                                <p>Het product met id <?php echo $_SESSION["action-uid"]; ?> is
                                    <?php
                                    if ($_POST["hide"] == 1) {
                                        echo "verborgen.";
                                    } else {
                                        echo "zichtbaar.";
                                    }
                                    ?>
                                </p>
                            </span>
                        </fieldset>
                    </form>
                <?php
                    unset($_SESSION["action"]);
                    unset($_SESSION["action-uid"]);
                }
                ?>
                <?php
                // Add product
                if (isset($_POST["addproduct"])) {
                    // Variables
                    $name = $_POST["name"];
                    $idbrand = $_POST["idbrand"];
                    $price = number_format($_POST["price"], 2, ".", "");
                    $release = $_POST["release"];
                    $screensize = number_format($_POST["screensize"], 2, ".", "");
                    $color = ucfirst($_POST["color"]);

                    // Add image
                    $target_dir = "../images/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Check if file is an actual image
                    if (isset($_POST["addproduct"])) {
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                        if ($check !== false) {
                            $uploadOk = 1;
                        } else {
                ?>
                            <form class="change-form">
                                <fieldset class="change-pers">
                                    <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                        <p>Het geuploade bestand is geen foto!</p>
                                    </span>
                                </fieldset>
                            </form>
                        <?php
                            $uploadOk = 0;
                            exit();
                        }
                    }

                    // Check if image already exists
                    if (file_exists($target_file)) {
                        ?>
                        <form class="change-form">
                            <fieldset class="change-pers">
                                <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                    <p>De geuploade foto bestaat al!</p>
                                </span>
                            </fieldset>
                        </form>
                    <?php
                        $uploadOk = 0;
                        exit();
                    }

                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 1000000) {
                    ?>
                        <form class="change-form">
                            <fieldset class="change-pers">
                                <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                    <p>Het formaat van de foto is te groot! Voeg er een toe kleiner dan 1MB.</p>
                                </span>
                            </fieldset>
                        </form>
                    <?php
                        $uploadOk = 0;
                        exit();
                    }

                    // Allow certain file formats
                    if (
                        $imageFileType != "jpg"
                    ) {
                    ?>
                        <form class="change-form">
                            <fieldset class="change-pers">
                                <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                    <p>Alleen JPG foto's zijn toegestaan!</p>
                                </span>
                            </fieldset>
                        </form>
                    <?php
                        $uploadOk = 0;
                        exit();
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) { ?>
                        <form class="change-form">
                            <fieldset class="change-pers">
                                <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                    <p>De foto is niet geupload!</p>
                                </span>
                            </fieldset>
                        </form>
                        <?php
                        exit();
                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        ?>
                            <form class="change-form">
                                <fieldset class="change-pers">
                                    <span class="login-check-message"><img src="../images/check.svg" alt="Check Icon">
                                        <p>De foto <?php echo htmlspecialchars(basename($_FILES["fileToUpload"]["name"])); ?> is geupload.</p>
                                    </span>
                                </fieldset>
                            </form>
                        <?php
                        } else { ?>
                            <form class="change-form">
                                <fieldset class="change-pers">
                                    <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                        <p>Er is iets misgegaan met het uploaden van de foto!</p>
                                    </span>
                                </fieldset>
                            </form>
                        <?php
                            exit();
                        }
                    }

                    require_once '../php-includes/dbh.inc.php';
                    $dsn = new Dbh;

                    // Insert product information into product table
                    $stmt = $dsn->connect()->prepare("INSERT INTO `products` (name, idbrand, price, releasedate, screensize, color)
                        VALUES (?, ?, ?, ?, ?, ?);");

                    $stmt->execute(array($name, $idbrand, $price, $release, $screensize, $color));

                    $stmt = null;

                    // Get the id of the just inserted product
                    $stmt = $dsn->connect()->prepare("SELECT MAX(`idproduct`) AS 'maxproduct' FROM `products`;");

                    $stmt->execute();

                    $data = $stmt->fetchAll();

                    $stmt = null;

                    // Set sales values for product
                    $stmt = $dsn->connect()->prepare("INSERT INTO `sales` (idproduct, sold, stock)
                        VALUES (?, ?, ?);");

                    $stmt->execute(array($data[0]["maxproduct"], 0, 1000));

                    $stmt = null;

                    // Create new product's page code
                    $productPageCode = "<?php
session_start();
include_once \"../php-includes/dbh.inc.php\";
include_once \"../php-includes/getproduct.inc.php\";

require_once '../php-includes/dbh.inc.php';
\$dsn = new Dbh;
\$stmt = \$dsn->connect()->prepare(\"SELECT * FROM `products` WHERE `idproduct` = " . $data[0]["maxproduct"] . "\");
\$stmt->execute();

\$data = \$stmt->fetchAll();

if (\$data[0][\"hidden\"] == 1) {
    header(\"Location: ../producten.php?state=hidden\");
}

// Call Class
\$object = new GetProduct;
?>

<!DOCTYPE html>
<html lang=\"nl\">

<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>" . $name . "</title>
    <?php
    include '../head.html';
    ?>
</head>

<body>
    <?php
    include '../nav.php';
    ?>

    <main>
        <section class=\"product-page-container\">

            <?php

            // Echo to screen
            // Set product id in ()
            echo \$object->getSingleProduct(" . $data[0]["maxproduct"] . ");

            ?>

        </section>
    </main>

    <?php
    include '../footer.html';
    ?>

</body>

</html>";

                    // Get image and site URL
                    // Make lower case
                    $url = strtolower($name);
                    //Make alphanumeric
                    $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
                    //Clean up multiple dashes or whitespaces
                    $url = preg_replace("/[\s-]+/", " ", $url);
                    //Convert whitespaces and underscore to dash
                    $url = preg_replace("/[\s_]/", "-", $url);

                    // Create new product's page
                    if (file_put_contents("../producten/$url.php", $productPageCode)) {
                        ?>
                        <form class="change-form">
                            <fieldset class="change-pers">
                                <span class="login-check-message"><img src="../images/check.svg" alt="Check Icon">
                                    <p>De pagina <?php echo htmlspecialchars(basename("../producten/$url.php")); ?> is aangemaakt.</p>
                                </span>
                            </fieldset>
                        </form>
                    <?php
                    } else {
                    ?>
                        <form class="change-form">
                            <fieldset class="change-pers">
                                <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                    <p>Er is iets misgegaan bij het genereren van de pagina!</p>
                                </span>
                            </fieldset>
                        </form>
                    <?php
                    }

                    unset($_SESSION["action"]);
                    unset($_SESSION["action-uid"]);
                    ?>
                    <form class="change-form">
                        <fieldset class="change-pers">
                            <span class="login-check-message"><img src="../images/check.svg" alt="Check Icon">
                                <p>Het product is toegevoegt.</p>
                            </span>
                        </fieldset>
                    </form>
                <?php
                }
                ?>
                <?php
                // Check if changeproduct is set
                if (isset($_POST["changeproduct"])) {
                    // Variables
                    $name = $_POST["name"];
                    $idbrand = $_POST["idbrand"];
                    $price = number_format($_POST["price"], 2, ".", "");
                    $release = $_POST["release"];
                    $screensize = number_format($_POST["screensize"], 2, ".", "");
                    $color = ucfirst($_POST["color"]);

                    require_once '../php-includes/dbh.inc.php';
                    $dsn = new Dbh;

                    // Change product informaation
                    $stmt = $dsn->connect()->prepare("UPDATE `products` SET name = ?, idbrand = ?, price = ?, releasedate = ?, screensize = ?, color = ?
                        WHERE `idproduct` = ?;");

                    $stmt->execute(array($name, $idbrand, $price, $release, $screensize, $color, $_SESSION["action-uid"]));

                    unset($_SESSION["action"]);
                    unset($_SESSION["action-uid"]);
                ?>
                    <form class="change-form">
                        <fieldset class="change-pers">
                            <span class="login-check-message"><img src="../images/check.svg" alt="Check Icon">
                                <p>Het product is aangepast.</p>
                            </span>
                        </fieldset>
                    </form>
                <?php
                }
                ?>
                <?php
                // Check if changeorder is set
                if (isset($_POST["changeorder"])) {

                    require_once '../php-includes/dbh.inc.php';
                    $dsn = new Dbh;
                    $stmt = $dsn->connect()->prepare("SELECT * FROM orders WHERE idorder = ? AND shippeddate IS NULL;");
                    $stmt->execute(array($_SESSION["action-uid"]));

                    if ($stmt->rowCount() == 0) {
                ?>
                        <form class="change-form">
                            <fieldset class="change-pers">
                                <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                    <p>Dit order is al verzonden. Orderrow is niet aangepast!</p>
                                </span>
                            </fieldset>
                        </form>
                    <?php
                    } else {

                        // Variables
                        $idproduct = $_POST["idproduct"];
                        $newQuantity = $_POST["quantity"];

                        require_once '../php-includes/dbh.inc.php';
                        $dsn = new Dbh;

                        // Change product informaation
                        $stmt = $dsn->connect()->prepare("UPDATE `orderrow` SET idproduct = ?, quantity = ?
                        WHERE `idorderrow` = ?;");

                        $stmt->execute(array($idproduct, $newQuantity, $_SESSION["orderrow-id"]));

                        $stmt = null;

                        // Change old product's stock
                        $stmt = $dsn->connect()->prepare("UPDATE `sales` 
                            SET `sales`.`stock` = `sales`.`stock` + ? 
                            WHERE `sales`.`idproduct` = ?;");

                        $stmt->execute(array($_SESSION["quantity"], $_SESSION["product-id"]));

                        $stmt = null;

                        // Change old product's sales
                        $stmt = $dsn->connect()->prepare("UPDATE `sales` 
                            SET `sales`.`sold` = `sales`.`sold` - ? 
                            WHERE `sales`.`idproduct` = ?;");

                        $stmt->execute(array($_SESSION["quantity"], $_SESSION["product-id"]));

                        $stmt = null;

                        // Change new product's stock
                        $stmt = $dsn->connect()->prepare("UPDATE `sales` 
                            SET `sales`.`stock` = `sales`.`stock` - ? 
                            WHERE `sales`.`idproduct` = ?;");

                        $stmt->execute(array($newQuantity, $idproduct));

                        $stmt = null;

                        // Change new product's sales
                        $stmt = $dsn->connect()->prepare("UPDATE `sales` 
                            SET `sales`.`sold` = `sales`.`sold` + ? 
                            WHERE `sales`.`idproduct` = ?;");

                        $stmt->execute(array($newQuantity, $idproduct));

                        $stmt = null;

                        unset($_SESSION["product-id"]);
                        unset($_SESSION["quantity"]);
                        unset($_SESSION["action"]);
                        unset($_SESSION["action-uid"]);
                        unset($_SESSION["orderrow-id"]);
                    ?>
                        <form class="change-form">
                            <fieldset class="change-pers">
                                <span class="login-check-message"><img src="../images/check.svg" alt="Check Icon">
                                    <p>Order is aangepast.</p>
                                </span>
                            </fieldset>
                        </form>
                <?php
                    }
                }
                ?>
                <?php
                // Check if changestock is set
                if (isset($_POST["changestock"])) {

                    require_once '../php-includes/dbh.inc.php';
                    $dsn = new Dbh;

                    $quantity = $_POST["quantity"];
                    $calc = $_POST["calc"];

                    if ($calc == "add") {
                        // Change new product's stock
                        $stmt = $dsn->connect()->prepare("UPDATE `sales` 
                            SET `sales`.`stock` = `sales`.`stock` + ? 
                            WHERE `sales`.`idproduct` = ?;");

                        $stmt->execute(array($quantity, $_SESSION["action-uid"]));

                        $stmt = null;
                    } elseif ($calc == "remove") {
                        // Change new product's stock
                        $stmt = $dsn->connect()->prepare("UPDATE `sales` 
                            SET `sales`.`stock` = `sales`.`stock` - ? 
                            WHERE `sales`.`idproduct` = ?;");

                        $stmt->execute(array($quantity, $_SESSION["action-uid"]));

                        $stmt = null;
                    }

                    unset($_SESSION["action"]);
                    unset($_SESSION["action-uid"]);
                ?>
                    <form class="change-form">
                        <fieldset class="change-pers">
                            <span class="login-check-message"><img src="../images/check.svg" alt="Check Icon">
                                <p>Voorraad is aangepast.</p>
                            </span>
                        </fieldset>
                    </form>
                <?php
                }
                ?>
                <?php
                if (isset($_POST["submit"])) {

                    // Check if an action was chosen
                    if ($_POST["actions"] != 0) {

                        // Split into action and uid
                        $splitAction = explode(" ", $_POST["actions"]);
                        $_SESSION["action"] = $splitAction[0];
                        $_SESSION["action-uid"] = $splitAction[1];
                        $_SESSION["orderrow-id"] = $splitAction[2] ?? "";
                        $_SESSION["product-id"] = $splitAction[3] ?? "";
                        $_SESSION["quantity"] = $splitAction[4] ?? "";

                ?>
                        <!-- Wachtwoord formulier -->
                        <form action="productmanager.php" method="post" class="change-form">
                            <fieldset class="change-pers">
                                <h3>Vul uw wachtwoord in om deze actie te voltooien.</h3>
                                <?php

                                if ($_SESSION["action"] == "edit-product") {
                                    echo "<h4>Product " . $_SESSION["action-uid"] . " aanpassen.</h4>";
                                } elseif ($_SESSION["action"] == "add-product") {
                                    echo "<h4>Product " . $_SESSION["action-uid"] . " toevoegen.</h4>";
                                } elseif ($_SESSION["action"] == "remove-product") {
                                    echo "<h4>Product " . $_SESSION["action-uid"] . " verwijderen.</h4>";
                                } elseif ($_SESSION["action"] == "hide-product") {
                                    echo "<h4>Product " . $_SESSION["action-uid"] . " verbergen/zichtbaar maken.</h4>";
                                } elseif ($_SESSION["action"] == "edit-order") {
                                    echo "<h4>Order " . $_SESSION["action-uid"] . ", orderrow " . $_SESSION["orderrow-id"] . " aanpassen.</h4>";
                                } elseif ($_SESSION["action"] == "remove-order") {
                                    echo "<h4>Order " . $_SESSION["action-uid"] . " verwijderen.</h4>";
                                } elseif ($_SESSION["action"] == "change-stock") {
                                    echo "<h4>Product " . $_SESSION["action-uid"] . " voorraad aanpassen.</h4>";
                                } elseif ($_SESSION["action"] == "ship-order") {
                                    echo "<h4>Verzend order " . $_SESSION["action-uid"] . ".</h4>";
                                }
                                ?>
                                <fieldset>
                                    <article class="showhide" id="showhide" onclick="showPassword()">Zie Wachtwoord <svg version="1.1" viewBox="0 0 37.519 37.519">
                                            <g>
                                                <path d="M37.087,17.705c-0.334-0.338-8.284-8.276-18.327-8.276S0.766,17.367,0.433,17.705c-0.577,0.584-0.577,1.523,0,2.107
                                                c0.333,0.34,8.284,8.277,18.327,8.277s17.993-7.938,18.327-8.275C37.662,19.23,37.662,18.29,37.087,17.705z M18.76,25.089
                                                c-6.721,0-12.604-4.291-15.022-6.332c2.411-2.04,8.281-6.328,15.022-6.328c6.72,0,12.604,4.292,15.021,6.332
                                                C31.369,20.802,25.501,25.089,18.76,25.089z M18.76,13.009c3.176,0,5.75,2.574,5.75,5.75c0,3.175-2.574,5.75-5.75,5.75
                                                c-3.177,0-5.75-2.574-5.75-5.75C13.01,15.584,15.583,13.009,18.76,13.009z" />
                                            </g>
                                        </svg>
                                    </article>
                                    <input type="password" name="password" id="password" placeholder="Uw Wachtwoord" tabindex="1" pattern=".{8,}" autofocus>
                                </fieldset>
                                <input type="submit" name="continue" value="Ga verder">
                            </fieldset>
                        </form>
                <?php
                    }
                }
                ?>
                <?php

                // Check if password is submitted
                if (isset($_POST["continue"])) {

                    // Do if password is wrong
                    if (password_verify($_POST["password"], $_SESSION["currentpassword"]) == false) {
                ?>
                        <form class="change-form">
                            <fieldset class="change-pers">
                                <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                    <p>Het wachtwoord dat u heeft ingetypt klopt niet! Probeer het nog eens.</p>
                                </span>
                            </fieldset>
                        </form>
                        <?php
                    }

                    // Do if password is right
                    if (password_verify($_POST["password"], $_SESSION["currentpassword"]) == true) {

                        if ($_SESSION["action"] == "edit-product") {
                        ?>
                            <form action="productmanager.php" method="post" class="change-form">
                                <fieldset class="change-pers">
                                    <h3>Pas product aan</h3>
                                    <fieldset>
                                        <input type="text" name="name" id="name" placeholder="Product naam" maxlength="45" required>
                                    </fieldset>
                                    <fieldset>
                                        <select name="idbrand" id="idbrand">
                                            <option value="1">Samsung</option>
                                            <option value="2">iPhone</option>
                                            <option value="3">Huawei</option>
                                            <option value="4">OnePlus</option>
                                        </select>
                                    </fieldset>
                                    <fieldset>
                                        <input type="number" name="price" id="price" placeholder="Prijs (0000.00)" step=".01" required>
                                    </fieldset>
                                    <fieldset>
                                        Releasedatum:
                                        <input type="date" name="release" id="release" placeholder="releasedate" required>
                                    </fieldset>
                                    <fieldset>
                                        <input type="number" name="screensize" id="screensize" placeholder="Schermgrootte (00.00)" step=".01" required>
                                    </fieldset>
                                    <fieldset>
                                        <input type="text" name="color" id="color" placeholder="Kleur" step=".01" required>
                                    </fieldset>
                                    <input type="submit" name="changeproduct" value="Pas Aan">
                                </fieldset>
                            </form>
                        <?php
                        } elseif ($_SESSION["action"] == "add-product") {
                        ?>
                            <form action="productmanager.php" method="post" class="change-form" enctype="multipart/form-data">
                                <fieldset class="change-pers">
                                    <h3>Voeg product toe</h3>
                                    <fieldset>
                                        <input type="text" name="name" id="name" placeholder="Product naam" maxlength="45" required>
                                    </fieldset>
                                    <fieldset>
                                        <select name="idbrand" id="idbrand">
                                            <option value="1">Samsung</option>
                                            <option value="2">iPhone</option>
                                            <option value="3">Huawei</option>
                                            <option value="4">OnePlus</option>
                                        </select>
                                    </fieldset>
                                    <fieldset>
                                        <input type="number" name="price" id="price" placeholder="Prijs (0000.00)" step=".01" required>
                                    </fieldset>
                                    <fieldset>
                                        Releasedatum:
                                        <input type="date" name="release" id="release" placeholder="releasedate" required>
                                    </fieldset>
                                    <fieldset>
                                        <input type="number" name="screensize" id="screensize" placeholder="Schermgrootte (00.00)" step=".01" required>
                                    </fieldset>
                                    <fieldset>
                                        <input type="text" name="color" id="color" placeholder="Kleur" step=".01" required>
                                    </fieldset>
                                    <fieldset>
                                        Product foto <article class="tooltip">
                                            <img src="../images/questionmark.svg" alt="Vraagteken" class="questionmark">
                                            <span class="tooltiptext">Format: voorbeeld-foto-a1.jpg, max 1MB</span>
                                        </article>
                                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                                    </fieldset>
                                    <input type="submit" name="addproduct" value="Voeg Toe">
                                </fieldset>
                            </form>
                            <?php
                        } elseif ($_SESSION["action"] == "remove-product") {

                            require_once '../php-includes/dbh.inc.php';
                            $dsn = new Dbh;
                            $stmt = $dsn->connect()->prepare("SELECT `products`.*, `sales`.`sold` FROM `products` 
                                JOIN `sales` ON `products`.`idproduct` = `sales`.`idproduct` 
                                WHERE `products`.`idproduct` = ? AND `sold` = 0;");
                            $stmt->execute(array($_SESSION["action-uid"]));

                            if ($stmt->rowCount() != 0) {

                                $data = $stmt->fetchAll();

                                $name = $data[0]["name"];

                                // Get image and page URL
                                // Make lower case
                                $url = strtolower($name);
                                //Make alphanumeric
                                $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
                                //Clean up multiple dashes or whitespaces
                                $url = preg_replace("/[\s-]+/", " ", $url);
                                //Convert whitespaces and underscore to dash
                                $url = preg_replace("/[\s_]/", "-", $url);
                                // Delete php and jpg of product from database

                                $phpPage = "../producten/$url.php";
                                $jpgImage = "../images/$url.jpg";

                                // Use unlink() function to delete image
                                if (!unlink($jpgImage)) {
                            ?>
                                    <form class="change-form">
                                        <fieldset class="change-pers">
                                            <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                                <p>Door een error kon <?php echo htmlspecialchars(basename($jpgImage)); ?> niet verwijderd worden!</p>
                                            </span>
                                        </fieldset>
                                    </form>
                                <?php
                                } else {
                                ?>
                                    <form class="change-form">
                                        <fieldset class="change-pers">
                                            <span class="login-check-message"><img src="../images/check.svg" alt="Check Icon">
                                                <p>De foto <?php echo htmlspecialchars(basename($jpgImage)); ?> is verwijderd.</p>
                                            </span>
                                        </fieldset>
                                    </form>
                                <?php
                                }

                                // Use unlink() function to delete php page
                                if (!unlink($phpPage)) {
                                ?>
                                    <form class="change-form">
                                        <fieldset class="change-pers">
                                            <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                                <p>Door een error kon <?php echo htmlspecialchars(basename($phpPage)); ?> niet verwijderd worden!</p>
                                            </span>
                                        </fieldset>
                                    </form>
                                <?php
                                } else {
                                ?>
                                    <form class="change-form">
                                        <fieldset class="change-pers">
                                            <span class="login-check-message"><img src="../images/check.svg" alt="Check Icon">
                                                <p>De pagina <?php echo htmlspecialchars(basename($phpPage)); ?> is verwijderd.</p>
                                            </span>
                                        </fieldset>
                                    </form>
                                <?php
                                }


                                // Delete product from sales table
                                $stmt = $dsn->connect()->prepare("DELETE FROM sales WHERE idproduct = ?;");

                                $stmt->execute(array($_SESSION["action-uid"]));

                                $stmt = null;

                                // Delete product from products table
                                $stmt = $dsn->connect()->prepare("DELETE FROM products WHERE idproduct = ?;");

                                $stmt->execute(array($_SESSION["action-uid"]));

                                $stmt = null;

                                ?>
                                <form class="change-form">
                                    <fieldset class="change-pers">
                                        <span class="login-check-message"><img src="../images/check.svg" alt="Check Icon">
                                            <p>Het product met id <?php echo $_SESSION["action-uid"]; ?> is verwijderd uit de database.</p>
                                        </span>
                                    </fieldset>
                                </form>
                            <?php

                                unset($_SESSION["action"]);
                                unset($_SESSION["action-uid"]);
                            } else {
                            ?>
                                <form class="change-form">
                                    <fieldset class="change-pers">
                                        <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                            <p>Het product met id <?php echo $_SESSION["action-uid"]; ?> heeft bestellingen. Het product is niet verwijderd.</p>
                                        </span>
                                    </fieldset>
                                </form>
                            <?php
                            }

                            ?>

                        <?php
                        } elseif ($_SESSION["action"] == "hide-product") {
                        ?>
                            <form action="productmanager.php" method="post" class="change-form">
                                <fieldset class="change-pers">
                                    <h3>Verberg product</h3>
                                    <fieldset>
                                        <select name="hide" id="hide">
                                            <option value="0">Maak zichtbaar</option>
                                            <option value="1">Verberg</option>
                                        </select>
                                    </fieldset>
                                    <input type="submit" name="hideproduct" value="Pas toe">
                                </fieldset>
                            </form>
                        <?php
                        } elseif ($_SESSION["action"] == "edit-order") {

                        ?>
                            <form action="productmanager.php" method="post" class="change-form">
                                <fieldset class="change-pers">
                                    <h3>Pas orderrow aan</h3>
                                    <fieldset>
                                        <select name="idproduct" id="idproduct">
                                            <?php
                                            require_once '../php-includes/dbh.inc.php';
                                            $dsn = new Dbh;
                                            $stmt = $dsn->connect()->prepare("SELECT * FROM products;");
                                            $stmt->execute();
                                            foreach ($stmt as $row) {
                                                echo "<option value=\"" . $row["idproduct"] . "\">" . $row["name"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </fieldset>
                                    <fieldset>
                                        <input type="number" name="quantity" id="quantity" placeholder="Hoeveelheid" step="1" min="0" required>
                                    </fieldset>
                                    <input type="submit" name="changeorder" value="Pas Aan">
                                </fieldset>
                            </form>
                            <?php
                        } elseif ($_SESSION["action"] == "remove-order") {

                            require_once '../php-includes/dbh.inc.php';
                            $dsn = new Dbh;
                            $stmt = $dsn->connect()->prepare("SELECT * FROM orders WHERE idorder = ? AND shippeddate IS NULL;");
                            $stmt->execute(array($_SESSION["action-uid"]));

                            if ($stmt->rowCount() == 0) {
                            ?>
                                <form class="change-form">
                                    <fieldset class="change-pers">
                                        <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                            <p>Dit order is al verzonden. Order is niet verwijderd!</p>
                                        </span>
                                    </fieldset>
                                </form>
                            <?php
                            } else {

                                require_once '../php-includes/dbh.inc.php';
                                $dsn = new Dbh;

                                // Get all products from order
                                $stmt = $dsn->connect()->prepare("SELECT idproduct, quantity FROM orderrow WHERE idorder = ?;");

                                $stmt->execute(array($_SESSION["action-uid"]));

                                // Change sold/stock information for each product
                                foreach ($stmt as $row) {
                                    // Change product's stock
                                    $stmt1 = $dsn->connect()->prepare("UPDATE `sales` 
                                    SET `sales`.`stock` = `sales`.`stock` + ? 
                                    WHERE `sales`.`idproduct` = ?;");

                                    $stmt1->execute(array($row["quantity"], $row["idproduct"]));

                                    $stmt1 = null;

                                    // Change product's sales
                                    $stmt1 = $dsn->connect()->prepare("UPDATE `sales` 
                                    SET `sales`.`sold` = `sales`.`sold` - ? 
                                    WHERE `sales`.`idproduct` = ?;");

                                    $stmt1->execute(array($row["quantity"], $row["idproduct"]));

                                    $stmt1 = null;
                                }

                                // Remove orderrows containing order
                                $stmt = $dsn->connect()->prepare("DELETE FROM orderrow WHERE idorder = ?;");

                                $stmt->execute(array($_SESSION["action-uid"]));

                                $stmt = null;

                                // Remove order
                                $stmt = $dsn->connect()->prepare("DELETE FROM orders WHERE idorder = ?;");

                                $stmt->execute(array($_SESSION["action-uid"]));

                                $stmt = null;

                            ?>
                                <form class="change-form">
                                    <fieldset class="change-pers">
                                        <span class="login-check-message"><img src="../images/check.svg" alt="Check Icon">
                                            <p>Order met id <?php echo $_SESSION["action-uid"]; ?> is verwijderd uit de database.</p>
                                        </span>
                                    </fieldset>
                                </form>
                            <?php
                                unset($_SESSION["action"]);
                                unset($_SESSION["action-uid"]);
                            }
                        } elseif ($_SESSION["action"] == "change-stock") {

                            ?>
                            <form action="productmanager.php" method="post" class="change-form">
                                <fieldset class="change-pers">
                                    <h3>Pas voorraad aan</h3>
                                    <fieldset>
                                        <input type="number" name="quantity" id="quantity" placeholder="Hoeveelheid" step="1" min="0" required>
                                    </fieldset>
                                    <fieldset>
                                        <select name="calc" id="calc">
                                            <option value="add">Toevoegen aan vooraad</option>
                                            <option value="remove">Verwijderen uit vooraad</option>
                                        </select>
                                    </fieldset>
                                    <input type="submit" name="changestock" value="Pas Aan">
                                </fieldset>
                            </form>
                            <?php
                        } elseif ($_SESSION["action"] == "ship-order") {

                            require_once '../php-includes/dbh.inc.php';
                            $dsn = new Dbh;

                            // Check if order is shipped already
                            $stmt = $dsn->connect()->prepare("SELECT * FROM `orders` WHERE idorder = ? AND shippeddate IS NULL;");

                            $stmt->execute(array($_SESSION["action-uid"]));

                            if ($stmt->rowCount() == 0) {
                            ?>
                                <form class="change-form">
                                    <fieldset class="change-pers">
                                        <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                            <p>Dit order is al verzonden.</p>
                                        </span>
                                    </fieldset>
                                </form>
                            <?php
                            } else {
                                // Add shippeddate
                                $stmt = $dsn->connect()->prepare("UPDATE orders SET shippeddate = NOW() WHERE idorder = ?;");

                                $stmt->execute(array($_SESSION["action-uid"]));

                                $stmt = null;
                            ?>
                                <form class="change-form">
                                    <fieldset class="change-pers">
                                        <span class="login-check-message"><img src="../images/check.svg" alt="Check Icon">
                                            <p>Order met id <?php echo $_SESSION["action-uid"]; ?> is verzonden.</p>
                                        </span>
                                    </fieldset>
                                </form>
                <?php
                            }

                            unset($_SESSION["action"]);
                            unset($_SESSION["action-uid"]);
                        }
                    }
                }
                ?>
                <?php
                if (isset($_POST["producten"])) {
                ?>
                    <article class="account-content-table" id="account-content-table">
                        <table>
                            <thead>
                                <th>Acties</th>
                                <th>idproduct</th>
                                <th>name</th>
                                <th>sold</th>
                                <th>stock</th>
                                <th>hidden</th>
                                <th>idbrand</th>
                                <th>price</th>
                                <th>releasedate</th>
                                <th>screensize</th>
                                <th>color</th>
                            </thead>
                            <tbody>
                                <?php
                                require_once '../php-includes/dbh.inc.php';
                                $dsn = new Dbh;
                                $stmt = $dsn->connect()->prepare("SELECT products.*, sales.sold, sales.stock FROM products
                                JOIN sales ON products.idproduct = sales.idproduct");
                                $stmt->execute();
                                foreach ($stmt as $row) {
                                ?>
                                    <tr>
                                        <td>
                                            <form action="productmanager.php" method="post">
                                                <select name="actions" id="actions">
                                                    <option value="0" selected>Kies actie</option>
                                                    <option value="edit-product <?php echo $row["idproduct"]; ?>">Pas product aan</option>
                                                    <option value="remove-product <?php echo $row["idproduct"]; ?>">Verwijder product</option>
                                                    <option value="hide-product <?php echo $row["idproduct"]; ?>">Verberg/Maak zichtbaar</option>
                                                    <option value="change-stock <?php echo $row["idproduct"]; ?>">Pas voorraad aan</option>
                                                </select>
                                                <input type="submit" name="submit" value="Ga verder" class="usermanager-submit">
                                            </form>
                                        </td>
                                        <?php
                                        echo "<td>" . $row["idproduct"] . "</td>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["sold"] . "</td>";
                                        echo "<td>" . $row["stock"] . "</td>";
                                        echo "<td>";
                                        if ($row["hidden"] == 0) {
                                            echo "false";
                                        } else {
                                            echo "true";
                                        }
                                        echo "</td>";
                                        echo "<td>" . $row["idbrand"] . "</td>";
                                        echo "<td>" . $row["price"] . "</td>";
                                        echo "<td>" . $row["releasedate"] . "</td>";
                                        echo "<td>" . $row["screensize"] . "</td>";
                                        echo "<td>" . $row["color"] . "</td>";
                                        ?>
                                    </tr>
                                <?php
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </article>
                    <form action="productmanager.php" method="post" class="change-form">
                        <select name="actions" id="actions" class="hidden-select">
                            <option value="add-product ">Voeg product toe</option>
                        </select>
                        <input type="submit" name="submit" value="Voeg product toe" class="usermanager-submit">
                    </form>
                <?php
                }
                ?>
                <?php
                if (isset($_POST["bestellingen"])) {
                ?>
                    <article class="account-content-table" id="account-content-table">
                        <table>
                            <thead>
                                <th>Acties</th>
                                <th>idorderrow</th>
                                <th>idorder</th>
                                <th>idproduct</th>
                                <th>name</th>
                                <th>quantity</th>
                                <th>shippeddate</th>
                            </thead>
                            <tbody>
                                <?php
                                require_once '../php-includes/dbh.inc.php';
                                $dsn = new Dbh;
                                $stmt = $dsn->connect()->prepare("SELECT `orderrow`.*, `products`.*, `orders`.`shippeddate` FROM `orderrow` 
                                    JOIN `products` ON `orderrow`.`idproduct` = `products`.`idproduct`
                                    JOIN `orders` ON `orderrow`.`idorder` = `orders`.`idorder`
                                    ORDER BY `idorder`, `idorderrow` ASC");
                                $stmt->execute();
                                foreach ($stmt as $row) {
                                ?>
                                    <tr>
                                        <td>
                                            <form action="productmanager.php" method="post">
                                                <select name="actions" id="actions">
                                                    <option value="0" selected>Kies actie</option>
                                                    <option value="edit-order <?php echo $row["idorder"]; ?> <?php echo $row["idorderrow"]; ?> <?php echo $row["idproduct"]; ?> <?php echo $row["quantity"]; ?>">Pas orderrow aan</option>
                                                    <option value="remove-order <?php echo $row["idorder"]; ?>">Verwijder order</option>
                                                    <option value="ship-order <?php echo $row["idorder"]; ?>">Verzend order</option>
                                                </select>
                                                <input type="submit" name="submit" value="Ga verder" class="usermanager-submit">
                                            </form>
                                        </td>
                                        <?php
                                        echo "<td>" . $row["idorderrow"] . "</td>";
                                        echo "<td>" . $row["idorder"] . "</td>";
                                        echo "<td>" . $row["idproduct"] . "</td>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["quantity"] . "</td>";
                                        echo "<td>" . $row["shippeddate"] . "</td>";
                                        ?>
                                    </tr>
                                <?php
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </article>
                <?php
                }
                ?>
            </article>
            <script>
                function showPassword() {
                    var field = document.getElementById("password");
                    var showhide = document.getElementById("showhide");

                    if (field.type === "password") {
                        field.type = "text";
                        showhide.innerHTML = "Verberg Wachtwoord" +
                            "<svg viewBox=\"0 0 37.519 37.519\" version=\"1.1\">" +
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
                            "</svg>";
                    } else {
                        field.type = "password";
                        showhide.innerHTML = "Zie Wachtwoord" +
                            "<svg version=\"1.1\" viewBox=\"0 0 37.519 37.519\">" +
                            "<g>" +
                            "<path d=\"M37.087,17.705c-0.334-0.338-8.284-8.276-18.327-8.276S0.766,17.367,0.433,17.705c-0.577,0.584-0.577,1.523,0,2.107" +
                            "c0.333,0.34,8.284,8.277,18.327,8.277s17.993-7.938,18.327-8.275C37.662,19.23,37.662,18.29,37.087,17.705z M18.76,25.089" +
                            "c-6.721,0-12.604-4.291-15.022-6.332c2.411-2.04,8.281-6.328,15.022-6.328c6.72,0,12.604,4.292,15.021,6.332" +
                            "C31.369,20.802,25.501,25.089,18.76,25.089z M18.76,13.009c3.176,0,5.75,2.574,5.75,5.75c0,3.175-2.574,5.75-5.75,5.75" +
                            "c-3.177,0-5.75-2.574-5.75-5.75C13.01,15.584,15.583,13.009,18.76,13.009z\" />" +
                            "</g>" +
                            "</svg>";
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