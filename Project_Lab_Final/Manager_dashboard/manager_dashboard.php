<?php
require_once 'db_connect.php';

$result = $conn->query("SELECT * FROM facilities");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manager Dashboard</title>
    <style>
        body{margin:0;font-family:Arial;display:flex}
        .sidebar{width:230px;background:#2c3e50;color:white;padding:20px}
        .sidebar a{display:block;color:white;padding:10px;margin:5px 0;
        background:#34495e;text-decoration:none;border-radius:5px}
        .logout{background:#e74c3c}
        .main{flex:1;padding:20px;background:#f4f4f9}
        table{width:100%;border-collapse:collapse}
        th,td{padding:10px;border-bottom:1px solid #ccc}
        th{background:#34495e;color:white}
        img{width:90px;height:70px;object-fit:cover}
    </style>
</head>

<body>

<div class="sidebar">
    <h2>Manager</h2>
    <a href="user_information.php">User Information</a>
    <a href="add_facilities.php">Add Facilities</a>
    <a href="booking_history.php">Booking History</a>
    <a href="logout.php" class="logout">Logout</a>
</div>

<div class="main">
    <h2>Facilities List</h2>

    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Location</th>
            <th>Type</th><th>Time</th><th>Fees</th><th>Image</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['ground_name'] ?></td>
            <td><?= $row['ground_location'] ?></td>
            <td><?= $row['facility_type'] ?></td>
            <td><?= $row['available_duration'] ?></td>
            <td><?= $row['fees'] ?></td>
            <td><img src="<?= $row['ground_picture'] ?>"></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
