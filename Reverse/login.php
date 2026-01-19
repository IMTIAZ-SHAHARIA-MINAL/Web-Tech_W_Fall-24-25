

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="login.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<title>Login Page</title>
</head>
<body>
<div class="container">
    <div class="image-half"></div>
    <div class="text-half">
    <h1>Login</h1>
    <form action="../Controller/loginCheck.php" method = 'post' onsubmit="return validate()">
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" id="username" name="username" value=""></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" id="password" name="password" value=""></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
            <td colspan="2" id="table"></td>
            </tr>
            <tr>
                <td><a href="forgetPassword.php" style="color: red;">Forget Password</a></td>
                <td style="text-align: right;"><input type="submit" id="submit" name="submit" value="Login"></td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="2"><a href="signup.php" style="color: blue; font-weight: bold;">Create a new account</a></td>
            </tr>
        </table>
    </form>
    <script src="../Controller/login.js"></script>
    </div>
</div>
</body>
</html>
    
