<?php
$conn = mysqli_connect("localhost", "root", "", "lab_db");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];

    mysqli_query($conn, "UPDATE students SET email='$email' WHERE id=$id");
    echo "Data updated";
}
?>

<form method="post">
    ID: <input type="text" name="id"><br><br>
    New Email: <input type="email" name="email"><br><br>
    <button name="update">Update</button>
</form>
