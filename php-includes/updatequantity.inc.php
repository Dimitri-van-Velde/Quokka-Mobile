<?php

include_once 'dbh.inc.php';

$dbh = new Dbh;

if (isset($_POST["quantity"], $_POST["idorderrow"])) {

    require_once '../php-includes/dbh.inc.php';
    $dsn = new Dbh;
    $stmt = $dsn->connect()->prepare("UPDATE `orderrow` SET `quantity` = ? WHERE `idorderrow` = ?;");
    $stmt->execute(array($_POST["quantity"], $_POST["idorderrow"]));

    echo "<script>window.location.href = \"cart.php\";</script>";
}
