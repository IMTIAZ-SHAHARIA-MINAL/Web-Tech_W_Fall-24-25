<?php
$conn = mysqli_connect("localhost", "root", "", "lab_db");

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM students");
$row = mysqli_fetch_assoc($result);

echo "Total Students: " . $row['total'];
?>
