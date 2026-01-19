<?php
if (isset($_GET['data'])) {
    $students = [
        ["name"=>"Rahim", "cgpa"=>3.5],
        ["name"=>"Karim", "cgpa"=>3.8]
    ];
    echo json_encode($students);
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<button onclick="showData()">Show Students</button>
<p id="result"></p>

<script>
function showData() {
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "JSON-LT-2.php?data=1", true);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let arr = JSON.parse(this.responseText);
            let txt = "";

            for (let i = 0; i < arr.length; i++) {
                txt += arr[i].name + " - " + arr[i].cgpa + "<br>";
            }
            document.getElementById("result").innerHTML = txt;
        }
    };
    xhttp.send();
}
</script>

</body>
</html>
