<?php
if (isset($_GET['bad'])) {
    echo '{name:"Rahim"}'; // invalid JSON
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<button onclick="load()">Load JSON</button>
<p id="msg"></p>

<script>
function load() {
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "JSON-LT-5.php?bad=1", true);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                let obj = JSON.parse(this.responseText);
                document.getElementById("msg").innerHTML = obj.name;
            } catch {
                document.getElementById("msg").innerHTML = "Invalid JSON data";
            }
        }
    };
    xhttp.send();
}
</script>

</body>
</html>
