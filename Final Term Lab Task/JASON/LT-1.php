<?php
if (isset($_GET['json'])) {
    $data = [
        "name" => "Rahim",
        "id" => 101,
        "dept" => "CSE"
    ];
    echo json_encode($data);
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<button onclick="loadJSON()">Load JSON</button>
<p id="output"></p>

<script>
function loadJSON() {
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "JSON-LT-1.php?json=1", true);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let obj = JSON.parse(this.responseText);
            document.getElementById("output").innerHTML =
                obj.name + " | " + obj.id + " | " + obj.dept;
        }
    };
    xhttp.send();
}
</script>

</body>
</html>
