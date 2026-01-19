<?php
if (isset($_POST['upload'])) {
    $file = $_FILES['myfile']['name'];
    move_uploaded_file($_FILES['myfile']['tmp_name'], $file);
    echo "File uploaded successfully";
}
?>

<!DOCTYPE html>
<html>
<body>

<form method="post" enctype="multipart/form-data">
    Select File: <input type="file" name="myfile"><br><br>
    <button name="upload">Upload</button>
</form>

</body>
</html>
