<?php
require_once 'db_connect.php';

// Fetch booking history using correct relationships
$sql = "
    SELECT
        b.booking_id AS booking_id,
        u.username,
        f.ground_name,
        b.booking_date,
        b.created_at
    FROM bookings b
    JOIN users u ON b.user_id = u.id
    JOIN facilities f ON b.ground_id = f.id
    ORDER BY b.created_at DESC
";

$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #34495e;
            color: white;
        }
    </style>
</head>
<body>

<div style="margin-bottom: 15px;">
    <a href="admin_dashboard.php" style="text-decoration: none;">
        <button type="button" style="background-color: #2980b9; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            ⬅ Back to Dashboard
        </button>
    </a>
</div>


<h1>Booking History</h1>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Booking ID</th>
            <th>User Name</th>
            <th>Ground</th>
            <th>Booking Date</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            $counter = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$counter}</td>";
                echo "<td>" . htmlspecialchars($row['booking_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ground_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['booking_date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                echo "</tr>";
                $counter++;
            }
        } else {
            echo "<tr><td colspan='6'>No bookings found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
