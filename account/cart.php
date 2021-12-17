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
    <title><?php echo $_SESSION["firstname"] ?> | Winkelwagen (<?php if (isset($_SESSION["orderid"])) {
                                                                    require_once '../php-includes/dbh.inc.php';
                                                                    $dsn = new Dbh;
                                                                    $stmt = $dsn->connect()->prepare("SELECT * FROM `orderrow` WHERE `idorder` = ?;");

                                                                    $stmt->execute(array($_SESSION["orderid"]));

                                                                    $cartCount = $stmt->rowCount();

                                                                    echo $cartCount;
                                                                } else {
                                                                    echo 0;
                                                                } ?>)
    </title>
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
                        <a href="cart.php" class="account-current-page">
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
                <h2>Winkelwagen</h2>

                <?php

                // Send error messages
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyselect") {
                ?>
                        <form class="change-form">
                            <fieldset class="change-pers">
                                <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                    <p>U moet een verzender en betalingsmethod kiezen voordat u verder kunt.</p>
                                </span>
                            </fieldset>
                        </form>
                        <?php
                    }
                }

                // Delete orderrow from cart
                if (isset($_POST["deleterow"])) {
                    $stmt = $dsn->connect()->prepare("DELETE FROM `orderrow` WHERE `idorderrow` = ?;");
                    $stmt->execute(array($_POST["deleterow"]));

                    $stmt = null;

                    echo "<script>window.location.href = \"cart.php\";</script>";
                }

                // Process order
                if (isset($_POST["submit"])) {

                    // Check if all fields are selected
                    if ($_POST["shippingmethod"] == 0 || $_POST["paymentmethod"] == 0) {
                        echo "<script>window.location.href = \"cart.php?error=emptyselect\";</script>";
                    } else {

                        // Get lowest productid value in order
                        $stmt = $dsn->connect()->prepare("SELECT MIN(`idproduct`) AS 'minprod' FROM `orderrow` WHERE `idorder` = ?;");

                        $stmt->execute(array($_SESSION["orderid"]));

                        // Get highest productid value in order
                        $stmt1 = $dsn->connect()->prepare("SELECT MAX(`idproduct`) AS 'maxprod' FROM `orderrow` WHERE `idorder` = ?;");

                        $stmt1->execute(array($_SESSION["orderid"]));

                        $min = $stmt->fetchAll();
                        $max = $stmt1->fetchAll();

                        $stmt = null;
                        $stmt1 = null;

                        // Update sold and stock based on amount of products in order
                        for ($i = $min[0]["minprod"]; $i <= $max[0]["maxprod"]; $i++) {

                            $stmt = $dsn->connect()->prepare("SELECT SUM(`quantity`) AS 'totalsold' FROM `orderrow` WHERE `idorder` = ? AND `idproduct` = ?;");

                            $stmt->execute(array($_SESSION["orderid"], $i));

                            $data = $stmt->fetchAll();

                            $stmt1 = $dsn->connect()->prepare("SELECT SUM(`stock` - ?) AS 'stockresult', `products`.`name` FROM `sales` 
                                JOIN `products` ON `sales`.`idproduct` = `products`.`idproduct` 
                                WHERE `sales`.`idproduct` = ?;");

                            $stmt1->execute(array($data[0]["totalsold"], $i));

                            $data1 = $stmt1->fetchAll();

                            if ($data1[0]["stockresult"] < 0) {
                        ?>
                                <form class="change-form">
                                    <fieldset class="change-pers">
                                        <span class="login-error-message"><img src="../images/error.svg" alt="Error Icon">
                                            <p>
                                                U probeert <?php echo $data[0]["totalsold"]; ?> van de <?php echo $data1[0]["name"]; ?>
                                                te kopen. Maar we hebben er nog maar <?php echo $data[0]["totalsold"] - ($data1[0]["stockresult"] * -1); ?>
                                                in voorraad. Onze excuses hiervoor.
                                            </p>
                                        </span>
                                    </fieldset>
                                </form>
                    <?php
                            } else {

                                // Update stock
                                if ($data[0]["totalsold"] != null) {
                                    $stmt2 = $dsn->connect()->prepare("UPDATE `sales` 
                            SET `sales`.`stock` = `sales`.`stock` - ? 
                            WHERE `sales`.`idproduct` = ?;");

                                    $stmt2->execute(array($data[0]["totalsold"], $i));

                                    // Update sold
                                    $stmt3 = $dsn->connect()->prepare("UPDATE `sales` 
                            SET `sales`.`sold` = `sales`.`sold` + ? 
                            WHERE `sales`.`idproduct` = ?;");

                                    $stmt3->execute(array($data[0]["totalsold"], $i));
                                }
                            }
                        }

                        // Add shipping and payment method information to order
                        $stmt = $dsn->connect()->prepare("UPDATE `orders` SET `shippingmethod` = ?, `paymentmethod` = ? 
                        WHERE `idorder` = ?;");
                        $stmt->execute(array($_POST["shippingmethod"], $_POST["paymentmethod"], $_SESSION["orderid"]));

                        $stmt = null;

                        // Close order
                        unset($_SESSION["orderid"]);

                        echo "Uw bestelling is geplaatst.";
                        echo "<script>window.location.href = \"cart.php\";</script>";
                    }
                }

                // Do if there is an order ongoing
                if (isset($_SESSION["orderid"])) {
                    ?>
                    <article class="account-cart" id="account-cart">
                        <?php
                        require_once '../php-includes/dbh.inc.php';
                        $totalPrice = 0;
                        $dsn = new Dbh;
                        $stmt = $dsn->connect()->prepare("SELECT `orderrow`.*, `products`.*, `orders`.`iduser` FROM `orderrow` 
                                    INNER JOIN `products` ON `orderrow`.`idproduct` = `products`.`idproduct` 
                                    INNER JOIN `orders` ON `orders`.`idorder` = `orderrow`.`idorder`
                                    WHERE `iduser` = ? AND `orderrow`.`idorder` = ?;");
                        $stmt->execute(array($_SESSION["userid"], $_SESSION["orderid"]));

                        $i = 0;

                        // Show products in cart
                        foreach ($stmt as $row) {
                            $i++;
                            // Get image URL
                            $name = $row["name"];
                            // Make lower case
                            $url = strtolower($name);
                            //Make alphanumeric
                            $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
                            //Clean up multiple dashes or whitespaces
                            $url = preg_replace("/[\s-]+/", " ", $url);
                            //Convert whitespaces and underscore to dash
                            $url = preg_replace("/[\s_]/", "-", $url);
                        ?>
                            <article>
                                <img src="../images/<?php echo $url; ?>.jpg" alt="<?php echo $name; ?>">
                                <span>
                                    <p><?php echo $name; ?></p>
                                    Aantal

                                    <?php
                                    // Check what quantity is currently chosen
                                    switch ($row["quantity"]) {
                                        case 1:
                                    ?>
                                            <select name="quantity<?php echo $i; ?>" id="quantity<?php echo $i; ?>" onchange="(get_quantity<?php echo $i; ?>(this.value))">
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        <?php
                                            break;
                                        case 2:
                                        ?>
                                            <select name="quantity<?php echo $i; ?>" id="quantity<?php echo $i; ?>" onchange="(get_quantity<?php echo $i; ?>(this.value))">
                                                <option value="1">1</option>
                                                <option value="2" selected>2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        <?php
                                            break;
                                        case 3:
                                        ?>
                                            <select name="quantity<?php echo $i; ?>" id="quantity<?php echo $i; ?>" onchange="(get_quantity<?php echo $i; ?>(this.value))">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3" selected>3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        <?php
                                            break;
                                        case 4:
                                        ?>
                                            <select name="quantity<?php echo $i; ?>" id="quantity<?php echo $i; ?>" onchange="(get_quantity<?php echo $i; ?>(this.value))">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected>4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        <?php
                                            break;
                                        case 5:
                                        ?>
                                            <select name="quantity<?php echo $i; ?>" id="quantity<?php echo $i; ?>" onchange="(get_quantity<?php echo $i; ?>(this.value))">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected>5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        <?php
                                            break;
                                        case 6:
                                        ?>
                                            <select name="quantity<?php echo $i; ?>" id="quantity<?php echo $i; ?>" onchange="(get_quantity<?php echo $i; ?>(this.value))">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6" selected>6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        <?php
                                            break;
                                        case 7:
                                        ?>
                                            <select name="quantity<?php echo $i; ?>" id="quantity<?php echo $i; ?>" onchange="(get_quantity<?php echo $i; ?>(this.value))">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7" selected>7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        <?php
                                            break;
                                        case 8:
                                        ?>
                                            <select name="quantity<?php echo $i; ?>" id="quantity<?php echo $i; ?>" onchange="(get_quantity<?php echo $i; ?>(this.value))">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8" selected>8</option>
                                                <option value="9">9</option>
                                            </select>
                                        <?php
                                            break;
                                        case 9:
                                        ?>
                                            <select name="quantity<?php echo $i; ?>" id="quantity<?php echo $i; ?>" onchange="(get_quantity<?php echo $i; ?>(this.value))">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9" selected>9</option>
                                            </select>
                                    <?php
                                            break;
                                    }
                                    ?>
                                    <form action="cart.php" method="post">
                                        <button type="submit" name="deleterow" class="delete" value="<?php echo $row["idorderrow"]; ?>">
                                            <svg version="1.1" viewBox="0 0 14 14" aria-hidden="true" focusable="false">
                                                <path fill-rule="evenodd" d="M4 4l.484 7.752a.266.266 0 00.257.248H9.26a.262.262 0 00.257-.248L10 4h1l-.445 8.002c-.03.551-.493.998-1.058.998H4.503a1.07 1.07 0 01-1.058-.998L3 4h1zM2 3a1 1 0 01.999-1H6.04v-.003A.948.948 0 017 1c.552 0 1 .453 1 .997V2h2.99c.558 0 1.01.453 1.01 1H2zm3.5 1h1v5.509a.5.5 0 01-1 0V4zm2 0h1v5.509a.5.5 0 01-1 0V4z"></path>
                                            </svg>
                                            Verwijder
                                        </button>
                                    </form>
                                </span>
                                <p><?php echo number_format(($row["price"] * $row["quantity"]), 2, ",<sup>", ".");  ?></p>
                            </article>
                            <script>
                                function get_quantity<?php echo $i; ?>(quantity) {

                                    // Create FormData element
                                    var form_data = new FormData();
                                    form_data.append("quantity", quantity);
                                    form_data.append("idorderrow", <?php echo $row["idorderrow"]; ?>);

                                    // Open ajax connection to search.inc.php
                                    var ajax_request = new XMLHttpRequest();

                                    ajax_request.open("POST", "../php-includes/updatequantity.inc.php");
                                    ajax_request.send(form_data);

                                    ajax_request.onreadystatechange = function() {

                                        // Run code if connection was successful
                                        if (ajax_request.readyState == 4 && ajax_request.status == 200) {

                                            // Parse the returned JSON
                                            var response = ajax_request.responseText;

                                            // Check if something was found
                                            if (response.length > 0) {

                                                window.location.href = "cart.php";

                                            }
                                        }
                                    }
                                }
                            </script>
                        <?php
                            $totalPrice += $row["price"] * $row["quantity"];
                        }
                        ?>

                    </article>
                    <article class="account-cart-order">
                        <span>
                            <p class="pricetitle">Totaal artikelen: </p>
                            <p class="price">€<?php echo number_format($totalPrice, 2, ",<sup>", "."); ?></p>
                        </span>
                        <?php
                        $priceWithVAT = number_format(($totalPrice / 100 * 21) + $totalPrice, 2, ",<sup>", ".");
                        ?>
                        <span>
                            <p class="pricetitle">BTW: </p>
                            <p class="price">€<?php echo number_format((($totalPrice / 100 * 21) + $totalPrice) - $totalPrice, 2, ",<sup>", "."); ?></p>
                        </span>
                        <span>
                            <p class="pricetitle">Totaal (inc. btw): </p>
                            <p class="price">€<?php echo $priceWithVAT; ?></p>
                        </span>
                        <form action="cart.php" method="post">
                            <select name="shippingmethod" id="shippingmethod">
                                <option value="0">Kies Verzender</option>
                                <option value="postnl">PostNL</option>
                                <option value="dhl">DHL</option>
                                <option value="fedex">FedEx</option>
                            </select>
                            <select name="paymentmethod" id="paymentmethod">
                                <option value="0">Kies Betalingsmethode</option>
                                <option value="ideal">iDeal</option>
                                <option value="paypal">PayPal</option>
                            </select>
                            <input type="submit" value="Bestel" class="order-submit" name="submit">
                        </form>
                    </article>
                <?php
                }

                if (empty($_POST["submit"]) && empty($_SESSION["orderid"])) {
                    echo "Uw winkelwagen is leeg.";
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