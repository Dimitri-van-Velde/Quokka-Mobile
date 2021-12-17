<?php
session_start();
include_once "../php-includes/dbh.inc.php";
include_once "../php-includes/getproduct.inc.php";

require_once '../php-includes/dbh.inc.php';
$dsn = new Dbh;
$stmt = $dsn->connect()->prepare("SELECT * FROM `products` WHERE `idproduct` = 4");
$stmt->execute();

$data = $stmt->fetchAll();

if ($data[0]["hidden"] == 1) {
    header("Location: ../producten.php?state=hidden");
}

// Call Class
$object = new GetProduct;
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple iPhone 12</title>
    <?php
    include '../head.html';
    ?>
</head>

<body>
    <?php
    include '../nav.php';
    ?>

    <main>
        <section class="product-page-container">

            <?php

            // Echo to screen
            // Set product id in ()
            echo $object->getSingleProduct(4);

            ?>

        </section>
    </main>

    <?php
    include '../footer.html';
    ?>

</body>

</html>