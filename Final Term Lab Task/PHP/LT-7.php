<?php
setcookie("course", "Web Technology", time() + 3600);
?>

<!DOCTYPE html>
<html>
<body>

<?php
if (isset($_COOKIE['course'])) {
    echo "Course: " . $_COOKIE['course'];
}
?>

</body>
</html>
