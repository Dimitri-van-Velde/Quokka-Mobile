<?php

// Terminate session
session_start();
session_unset();
session_destroy();

// Sending user to login page
header("Location: ../login.php");

?>
