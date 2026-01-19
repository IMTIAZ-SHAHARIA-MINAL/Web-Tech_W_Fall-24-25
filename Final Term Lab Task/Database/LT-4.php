<?php
$conn = mysqli_connect("localhost", "root", "", "lab_db");

if (isset($_GET['search'])) {
    $name = $_GET['name'];
    $result = mysqli_query($conn, "SELECT * FROM students WHERE name='$name'");

    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['name']." - ".$row['email'];
    }
}
?>

<form method="get">
    Name: <input type="text" name="name">
    <button name="search">Search</button>
</form>
