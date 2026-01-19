<!DOCTYPE html>
<html>
<body>

<?php
$file = fopen("data.txt", "r");
while (!feof($file)) {
    echo fgets($file) . "<br>";
}
fclose($file);
?>

</body>
</html>
