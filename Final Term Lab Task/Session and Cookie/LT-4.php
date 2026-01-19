<?php
session_start();

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if ($user == "admin" && $pass == "1234") {
        $_SESSION['user'] = $user;
        echo "Login successful";
    } else {
        echo "Invalid login";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form method="post">
    Username: <input type="text" name="user"><br><br>
    Password: <input type="password" name="pass"><br><br>
    <button name="login">Login</button>
</form>

</body>
</html>
