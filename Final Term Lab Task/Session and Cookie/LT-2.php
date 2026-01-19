<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
if (isset($_SESSION['username'])) {
    echo "Username: " . $_SESSION['username'];
} else {
    echo "Session not set";
}
?>

</body>
</html>
