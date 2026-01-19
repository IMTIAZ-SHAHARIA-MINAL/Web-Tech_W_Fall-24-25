<?php
$conn = mysqli_connect("localhost", "root", "", "lab_db");

$result = mysqli_query($conn, "SELECT * FROM students");

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['name']." - ".$row['email']."<br>";
}
?>
