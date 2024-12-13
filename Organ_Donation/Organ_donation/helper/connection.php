<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "organ_donation";
$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>