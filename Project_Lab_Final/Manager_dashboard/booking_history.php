<?php
require_once 'db_connect.php';
$result = $conn->query("SELECT * FROM bookings");
?>

<!DOCTYPE html>
<html>
<head><title>Booking History</title></head>
<body>
<h2>Booking History</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>User</th>
    <th>Facility</th>
    <th>Date</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['user_id'] ?></td>
    <td><?= $row['facility_id'] ?></td>
    <td><?= $row['booking_date'] ?></td>
</tr>
<?php endwhile; ?>

</table>
</body>
</html>
