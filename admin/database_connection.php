<?php
// database_connection.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supercar";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>
