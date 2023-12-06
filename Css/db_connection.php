<?php
$servername = "mysql-felania.alwaysdata.net";
$username = "felania_v";
$password = "BonjourMam@nJ$Vais TeRendre7ier!!!";
$database_name = "felania__";

$conn = new mysqli($servername, $username, $password, $database_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
