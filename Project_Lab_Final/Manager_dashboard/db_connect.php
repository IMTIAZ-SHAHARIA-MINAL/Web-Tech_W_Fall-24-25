<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sfbs";   // আপনার database নাম

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
