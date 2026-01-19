<?php
session_start();

$_SESSION['user'] = "Admin";
?>

<!DOCTYPE html>
<html>
<body>

<?php
echo "Session User: " . $_SESSION['user'];
?>

</body>
</html>
