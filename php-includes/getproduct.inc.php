<?php
session_start();

class GetProduct extends Dbh
{

    // Get Products Function
    public function getSingleProduct($productid)
    {

        // Check if searchbar is used

        // Database Query
        $stmt = $this->connect()->prepare("SELECT * FROM `products` WHERE `idproduct`" . " = " . ":productid");
        $parameters = array(":productid" => $productid);
        $stmt->execute($parameters);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Create product element
        for ($i = 0; $i < count($results); $i++) {

            // Variables
            $name = $results[$i]["name"];
            $price = $results[$i]["price"];
            $screenSize = $results[$i]["screensize"];
            $color = $results[$i]["color"];
            $releaseDate = $results[$i]["releasedate"];

            // Replace . with , in price
            $price = substr_replace($price, ",", strlen($price) - 3, 1);
            // Get numbers after comma
            $pricecomma = substr($price, -2);
            // Remove after comma
            $price = substr($price, 0, -2);


            // Get image and site URL
            // Make lower case
            $url = strtolower($name);
            //Make alphanumeric
            $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
            //Clean up multiple dashes or whitespaces
            $url = preg_replace("/[\s-]+/", " ", $url);
            //Convert whitespaces and underscore to dash
            $url = preg_replace("/[\s_]/", "-", $url);
?>
            <a href="javascript:window.history.go(-1)" class="back-arrow">&LeftArrow; Terug</a>
            <article class="product-page-image">
                <img src="../images/<?php echo $url; ?>.jpg" alt="$name">
            </article>
            <article class="product-page-info">
                <ul>
                    <li>Prijs: €<?php echo $price; ?><sup><?php echo $pricecomma; ?></sup></li>
                    <li>Schermgrootte: <?php echo $screenSize; ?> inch scherm</li>
                    <li>Kleur: <?php echo $color; ?></li>
                    <li>Releasedatum: <?php echo $releaseDate; ?></li>
                </ul>
                <form action="<?php echo $url; ?>.php" method="post">
                    <select name="quantity" id="quantity" class="quantity-select">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    <button type="submit" name="submit" class="order-submit">
                        <svg version="1.1" viewBox="0 0 14 14" aria-hidden="true" class="order-svg" focusable="false">
                            <path fill-rule="evenodd" d="M7 5.943a.5.5 0 110-1 .5.5 0 010 1zm-2 0a.5.5 0 110-1 .5.5 0 010 1zm4 .006a.5.5 0 110-1 .5.5 0 010 1zm2-.035a.5.5 0 110-1 .5.5 0 010 1zM6 7.94a.5.5 0 110-1 .5.5 0 010 1zm2 0a.5.5 0 110-1 .5.5 0 010 1zm2 0a.5.5 0 110-1 .5.5 0 010 1zM5.99 11a.988.988 0 01.99.982.989.989 0 01-1.98 0A.986.986 0 015.99 11zm4 0a.988.988 0 01.99.982.989.989 0 01-1.98 0A.986.986 0 019.99 11zm1.937-1.47a.766.766 0 01-.67.47H4.743c-.272 0-.572-.214-.67-.476L1.25 2H.508A.51.51 0 010 1.5c0-.276.214-.5.505-.5H2l3 8.012h6l2-5.01L5.5 4a.506.506 0 01-.5-.5c0-.276.222-.5.51-.5h7.98a.51.51 0 01.51.501v.501L11.927 9.53z"></path>
                        </svg>
                        In winkelwagen
                    </button>
                </form>
            </article>
<?php

            if (isset($_POST["submit"])) {
                if(empty($_SESSION["orderid"])) {
                    $stmt1 = $this->connect()->prepare("INSERT INTO orders (iduser) VALUES (?)");

                    if (!$stmt1->execute(array($_SESSION["userid"]))) {
                        $stmt1 = null;
                        header("Location: ../$url.php?error=stmtfailed");
                        exit();
                    }

                    $stmt1 = null;

                    $stmt1 = $this->connect()->query("SELECT LAST_INSERT_ID()");

                    $orderId = $stmt1->fetchColumn();

                    $_SESSION["orderid"] = $orderId;

                } elseif(isset($_SESSION["orderid"])) {
                    echo "Your current order ID is " . $_SESSION["orderid"];
                }
            }
        }
    }
}
