<?php

session_start();
session_unset();
session_destroy();

// Going back to home page
header("Location: ../login.php");

?>
