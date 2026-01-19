<?php
$conn = mysqli_connect("localhost", "root", "", "lab_db");

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $result = mysqli_query($conn,
        "SELECT * FROM users WHERE username='$user' AND password='$pass'");

    if (mysqli_num_rows($result) > 0) {
        echo "Login successful";
    } else {
        echo "Invalid login";
    }
}
?>

<form method="post">
    Username: <input type="text" name="user"><br><br>
    Password: <input type="password" name="pass"><br><br>
    <button name="login">Login</button>
</form>
