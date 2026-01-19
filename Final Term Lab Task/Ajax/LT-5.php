<?php
if (isset($_GET['data'])) {
    echo json_encode(["message" => "JSON data loaded successfully"]);
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<button onclick="loadData()">Load Data</button>
<p id="output"></p>

<script>
function loadData() {
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "LT-5.php?data=1", true);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                let data = JSON.parse(this.responseText);
                document.getElementById("output").innerHTML = data.message;
            } catch {
                document.getElementById("output").innerHTML = "Invalid JSON";
            }
        }
    };

    xhttp.onerror = function () {
        document.getElementById("output").innerHTML = "AJAX request failed";
    };

    xhttp.send();
}
</script>

</body>
</html>
