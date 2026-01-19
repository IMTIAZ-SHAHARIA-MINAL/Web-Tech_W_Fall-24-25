<!DOCTYPE html>
<html>
<body>

<?php
if (isset($_COOKIE['course'])) {
    echo "Course: " . $_COOKIE['course'];
} else {
    echo "Cookie not found";
}
?>

</body>
</html>
