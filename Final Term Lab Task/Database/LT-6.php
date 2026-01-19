<?php
$conn = mysqli_connect("localhost", "root", "", "lab_db");

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM students WHERE id=$id");
    echo "Data deleted";
}
?>

<form method="post">
    ID: <input type="text" name="id"><br><br>
    <button name="delete">Delete</button>
</form>
