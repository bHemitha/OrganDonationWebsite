<?php
session_start();
$_SESSION = array();
session_destroy();

// Redirect to login page or any other page as needed
header("Location: ./login.php");
exit;
?>