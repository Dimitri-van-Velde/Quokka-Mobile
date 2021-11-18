<?php
    include_once 'includes/dbh.inc.php';
    include_once 'includes/product.inc.php';
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
        <?php
            
            $object = new User;
            echo $object->getAllProducts();

        ?>

        <section>
            <article class="product">
                <ul>
                    <!-- <li>
                        <a href="#"><img src="images/logo.png" alt="Loungestoel Beton Grijs"></a>
                        <a href="#">Loungestoel (beton grijs)</a>
                        <p>€ 116,<sup>00</sup></p>
                    </li> -->
                    
                </ul>
            </article>
        </section>
    </main>

    <?php
        include 'footer.html';
    ?>
    
</body>

</html>