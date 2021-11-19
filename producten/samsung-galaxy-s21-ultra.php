<?php
    include_once "../php-includes/dbh.inc.php";
    include_once "../php-includes/getproduct.inc.php";

    // Call Class
    $object = new GetProduct;
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samsung Galaxy S21 Ultra</title>
    <?php
        include 'head.html';
    ?>
</head>

<body>
    <?php
        include 'nav.html';
    ?>

    <main>
        <section class="product-page-container">

            <?php

                // Echo to screen
                // Set product id in ()
                echo $object->getSingleProduct(9);

            ?>
                 
        </section>
    </main>

    <?php
        include 'footer.html';
    ?>

</body>

</html>