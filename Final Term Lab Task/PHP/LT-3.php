<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];

    if ($name == "") {
        echo "Name is required";
    } else {
        echo "Welcome, $name";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form method="post">
    Name: <input type="text" name="name">
    <button name="submit">Submit</button>
</form>

</body>
</html>
