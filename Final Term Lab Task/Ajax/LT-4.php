<?php
if (isset($_GET['time'])) {
    echo "Server Time: " . date("Y-m-d H:i:s");
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<button onclick="loadTime()">Get Server Time</button>
<p id="time"></p>

<script>
function loadTime() {
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "LT-4.php?time=1", true);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                document.getElementById("time").innerHTML = this.responseText;
            } else {
                document.getElementById("time").innerHTML = "Error loading data";
            }
        }
    };
    xhttp.send();
}
</script>

</body>
</html>
