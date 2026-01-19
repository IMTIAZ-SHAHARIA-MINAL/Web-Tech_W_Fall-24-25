<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];

    if ($name == "") {
        echo "Validation failed";
    } else {
        echo "Form submitted successfully";
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<form id="form">
    Name: <input type="text" id="name"><br><br>
    <button type="submit">Submit</button>
</form>

<p id="msg"></p>

<script>
document.getElementById("form").addEventListener("submit", function(e) {
    e.preventDefault();

    let name = document.getElementById("name").value;
    let xhttp = new XMLHttpRequest();

    xhttp.open("POST", "LT-3.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("msg").innerHTML = this.responseText;
        }
    };

    xhttp.send("name=" + name);
});
</script>

</body>
</html>
