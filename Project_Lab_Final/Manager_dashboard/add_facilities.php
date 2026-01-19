<?php
require_once 'db_connect.php';

if(isset($_POST['add'])){
    $name = $_POST['ground_name'];
    $location = $_POST['ground_location'];
    $type = $_POST['facility_type'];
    $time = $_POST['available_duration'];
    $fees = $_POST['fees'];

    $img = $_FILES['ground_picture']['name'];
    $path = "uploads/".$img;

    move_uploaded_file($_FILES['ground_picture']['tmp_name'], $path);

    $sql = "INSERT INTO facilities 
    (ground_name, ground_location, facility_type, available_duration, fees, ground_picture)
    VALUES ('$name','$location','$type','$time','$fees','$path')";

    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Facilities</title></head>
<body>
<h2>Add Facility</h2>

<form method="POST" enctype="multipart/form-data">
    <input name="ground_name" placeholder="Ground Name" required><br><br>
    <input name="ground_location" placeholder="Location" required><br><br>

    <select name="facility_type">
        <option>Football</option>
        <option>Cricket</option>
        <option>Badminton</option>
    </select><br><br>

    <input name="available_duration" placeholder="Time"><br><br>
    <input name="fees" placeholder="Fees"><br><br>

    <input type="file" name="ground_picture" required><br><br>

    <button name="add">Add Facility</button>
</form>
</body>
</html>
