<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | Ramen House</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}

/* ===== FULL PAGE BACKGROUND ===== */
body{
    height:100vh;
    background:
        linear-gradient(
            rgba(0,0,0,0.55),
            rgba(0,0,0,0.55)
        ),
        url("/web_w_fall_code/Ramen-Shop/assets/login-bg.jpg") center center no-repeat;
    background-size: cover;

    display:flex;
    justify-content:center;
    align-items:center;
}

/* ===== LOGIN BOX ===== */
.login-box{
    width:400px;
    background: rgba(255,255,255,0.18);
    backdrop-filter: blur(8px);
    padding:35px;
    border-radius:10px;
    text-align:center;
    color:#fff;
}

.login-box h2{
    margin-bottom:25px;
    font-weight:600;
}

.login-box input{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:none;
    border-radius:5px;
    outline:none;
}

.login-box button{
    width:100%;
    padding:12px;
    background:#f57c00;
    border:none;
    border-radius:5px;
    color:#fff;
    font-size:16px;
    cursor:pointer;
}

.login-box button:hover{
    background:#ff9800;
}

.login-box p{
    margin-top:15px;
    font-size:14px;
}
</style>
</head>
<body>

<div class="login-box">
    <h2>Login to Your Account</h2>

    <form action="login_action.php" method="POST">
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">LOGIN</button>
    </form>

    <p>Don't have an account? Create Account</p>
</div>

</body>
</html>
