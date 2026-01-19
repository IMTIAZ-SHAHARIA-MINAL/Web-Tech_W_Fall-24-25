<?php
require_once 'db_connect.php';
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head><title>User Information</title></head>
<body>
<h2>Users</h2>

<table border="1" cellpadding="10">
<tr><th>ID</th><th>Name</th><th>Email</th></tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
</tr>
<?php endwhile; ?>

</table>
</body>
</html>
