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
                    file_put_contents("../producten/$url.php", $productPageCode);

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
                        $quantity = $_POST["quantity"];

                        require_once '../php-includes/dbh.inc.php';
                        $dsn = new Dbh;

                        // Change product informaation
                        $stmt = $dsn->connect()->prepare("UPDATE `orderrow` SET idproduct = ?, quantity = ?
                        WHERE `idorderrow` = ?;");

                        $stmt->execute(array($idproduct, $quantity, $_SESSION["orderrow-uid"]));

                        unset($_SESSION["action"]);
                        unset($_SESSION["action-uid"]);
                        unset($_SESSION["orderrow-uid"]);
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
                if (isset($_POST["submit"])) {

                    // Check if an action was chosen
                    if ($_POST["actions"] != 0) {

                        // Split into action and uid
                        $splitAction = explode(" ", $_POST["actions"]);
                        $_SESSION["action"] = $splitAction[0];
                        $_SESSION["action-uid"] = $splitAction[1];
                        $_SESSION["orderrow-uid"] = $splitAction[2] ?? "";

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
                                    echo "<h4>Order " . $_SESSION["action-uid"] . ", orderrow " . $_SESSION["orderrow-uid"] . " aanpassen.</h4>";
                                } elseif ($_SESSION["action"] == "remove-order") {
                                    echo "<h4>Order " . $_SESSION["action-uid"] . " verwijderen.</h4>";
                                }
                                ?>
                                <fieldset>
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
                            <form action="productmanager.php" method="post" class="change-form">
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

                                $stmt = $dsn->connect()->prepare("DELETE FROM sales WHERE idproduct = ?;");

                                $stmt->execute(array($_SESSION["action-uid"]));

                                $stmt = null;

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
                                <th>idbrand</th>
                                <th>price</th>
                                <th>releasedate</th>
                                <th>screensize</th>
                                <th>color</th>
                                <th>sold</th>
                                <th>stock</th>
                                <th>hidden</th>
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
                                                </select>
                                                <input type="submit" name="submit" value="Ga verder" class="usermanager-submit">
                                            </form>
                                        </td>
                                        <?php
                                        echo "<td>" . $row["idproduct"] . "</td>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["idbrand"] . "</td>";
                                        echo "<td>" . $row["price"] . "</td>";
                                        echo "<td>" . $row["releasedate"] . "</td>";
                                        echo "<td>" . $row["screensize"] . "</td>";
                                        echo "<td>" . $row["color"] . "</td>";
                                        echo "<td>" . $row["sold"] . "</td>";
                                        echo "<td>" . $row["stock"] . "</td>";
                                        echo "<td>" . $row["hidden"] . "</td>";
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
                                $stmt = $dsn->connect()->prepare("SELECT `orderrow`.*, `products`.`name`, `orders`.`shippeddate` FROM `orderrow` 
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
                                                    <option value="edit-order <?php echo $row["idorder"]; ?> <?php echo $row["idorderrow"]; ?>">Pas orderrow aan</option>
                                                    <option value="remove-order <?php echo $row["idorder"]; ?>">Verwijder order</option>
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
        </section>
    </main>
    <?php
    include '../footer.html';
    ?>
</body>

</html>