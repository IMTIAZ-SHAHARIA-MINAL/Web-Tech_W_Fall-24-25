<?php
if (isset($_GET['read'])) {
    $json = '{"city":"Dhaka","country":"Bangladesh"}';
    echo $json;
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<button onclick="readJSON()">Read JSON</button>
<p id="out"></p>

<script>
function readJSON() {
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "JSON-LT-4.php?read=1", true);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let obj = JSON.parse(this.responseText);
            document.getElementById("out").innerHTML =
                obj.city + ", " + obj.country;
        }
    };
    xhttp.send();
}
</script>

</body>
</html>
