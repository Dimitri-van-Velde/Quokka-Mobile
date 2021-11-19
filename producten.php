<?php
    include_once 'php-includes/dbh.inc.php';
    include_once 'php-includes/search.inc.php';
    include_once 'php-includes/filter.inc.php';
    include_once 'php-includes/products.inc.php';
?>   

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
    <?php
        include 'head.html';
    ?>
</head>

<body>
    <?php
        include 'nav.html';
    ?>

    <main>
        <section class="product-container">
            <article class="filter-sidebar">
                <h2>Filter Producten</h2>
                <form action="producten.php" method="get" class="filter">
                    <h3>Kies Merk</h3>
                    <select name="brand">
                        <option value="0" selected disabled>Kies merk...</option>
                        <option value="1">Samsung</option>
                        <option value="2">Apple</option>
                        <option value="3">Huawei</option>
                        <option value="4">OnePlus</option>
                    </select>
                    <h3>Prijs Range</h3>
                    <input type="number" name="prijsmin" value="100">
                    <p>tot</p>
                    <input type="number" name="prijsmax" value="500">
                    <input type="submit">
                </form>
            </article>
            <article class="product">
                <ul>
                    <!-- <li>
                        <a href="#"><img src="images/logo.png" alt="Loungestoel Beton Grijs"></a>
                        <a href="#">Loungestoel (beton grijs)</a>
                        <p>€ 116,<sup>00</sup></p>
                    </li> -->
                    <?php

                        $object = new Products;
                        echo $object->getProducts();
            
                        // $object1 = new Search;
                        // echo $object1->searchResult();

                        // $object2 = new Filter;
                        // echo $object2->filterResult();

                    ?>
                </ul>
            </article>
        </section>
    </main>

    <?php
        include 'footer.html';
    ?>
    
</body>

</html>