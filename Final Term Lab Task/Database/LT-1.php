<?php
$conn = mysqli_connect("localhost", "root", "", "lab_db");

if (!$conn) {
    die("Connection failed");
}

echo "Database connected successfully";
?>
