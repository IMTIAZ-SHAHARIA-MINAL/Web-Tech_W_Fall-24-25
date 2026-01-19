<?php
$conn = mysqli_connect("localhost", "root", "", "lab_db");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students(name, email) VALUES('$name', '$email')";
    mysqli_query($conn, $sql);
    echo "Data inserted";
}
?>

<form method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    <button name="submit">Insert</button>
</form>
