<?php
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
    } else {
        echo "Valid email address";
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

Email: <input type="text" id="email">
<button onclick="checkEmail()">Check</button>
<p id="result"></p>

<script>
function checkEmail() {
    let email = document.getElementById("email").value;
    let xhttp = new XMLHttpRequest();

    xhttp.timeout = 5000;
    xhttp.ontimeout = function () {
        document.getElementById("result").innerHTML = "Request timeout";
    };

    xhttp.open("GET", "LT-2.php?email=" + email, true);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("result").innerHTML = this.responseText;
        }
    };
    xhttp.send();
}
</script>

</body>
</html>
