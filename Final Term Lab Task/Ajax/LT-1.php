<?php
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    if (strlen($username) < 5) {
        echo "Minimum 5 characters required";
    } elseif ($username == "admin") {
        echo "Username not available";
    } else {
        echo "Username available";
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<h3>Username Check</h3>
<input type="text" id="username" onkeyup="checkUsername()">
<p id="count"></p>
<p id="msg"></p>

<script>
function checkUsername() {
    let username = document.getElementById("username").value;
    document.getElementById("count").innerHTML = "Characters: " + username.length;

    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "LT-1.php?username=" + username, true);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("msg").innerHTML = this.responseText;
        }
    };
    xhttp.send();
}
</script>

</body>
</html>
