<?php
session_start();
// Database connection
require_once 'db_connect.php'; 

// Check for facility_type filter
$facility_filter = $_GET['facility_type'] ?? null;
$where_clause = $facility_filter ? " WHERE facility_type = '" . mysqli_real_escape_string($conn, $facility_filter) . "'" : "";

// Fetch available grounds with optional filter
$sql = "SELECT * FROM facilities" . $where_clause;
$result = $conn->query($sql);

// Fetch user ID and username from session
$user_id = $_SESSION['user_id'] ?? null;
$username = $_SESSION['username'] ?? '';

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ground</title>
    <style>
        /* Layout */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            display: flex;
            gap: 50px;
            margin-top: 20px;
        }

        .available-grounds, .booking-form {
            flex: 1;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow-y: scroll;
            overflow-x: scroll;
        }

        h3 {
            margin-bottom: 20px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #34495e;
            color: white;
        }

        table tbody tr {
            cursor: pointer;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        img {
            max-width: 150px;
            max-height: 100px;
            object-fit: cover;
        }

        button:hover {
            background-color: #34495e;
        }

        .filter-info {
            margin-bottom: 10px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Book a Sports Ground</h1>
    <div class="container">
        <!-- Available Grounds -->
        <div class="available-grounds">
            <h3>Available Grounds</h3>
            <?php if ($facility_filter): ?>
                <div class="filter-info">Showing only: <?= htmlspecialchars($facility_filter) ?> <a href="book_ground.php">Show All</a></div>
            <?php endif; ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ground Name</th>
                        <th>Location</th>
                        <th>Facility Type</th>
                        <th>Available Duration</th>
                        <th>Fees</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr onclick="selectGround(this)">
                                <td><?= htmlspecialchars($row['id']); ?></td>
                                <td><?= htmlspecialchars($row['ground_name']); ?></td>
                                <td><?= htmlspecialchars($row['ground_location']); ?></td>
                                <td><?= htmlspecialchars($row['facility_type']); ?></td>
                                <td><?= htmlspecialchars($row['available_duration']); ?></td>
                                <td><?= htmlspecialchars($row['fees']); ?></td>
                                <td>
                                    <img src="<?= htmlspecialchars($row['ground_picture']); ?>" alt="Ground Image">
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No grounds available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Booking Form -->
        <div class="booking-form">
            <h3>Book a Ground</h3>
            <form action="booking_process.php" method="post" onsubmit="return validateBookingForm(event)">
                <label for="user_name">Your Name:</label>
                <input type="text" id="user_name" name="user_name" value="<?= htmlspecialchars($username) ?>" readonly required>

                <label for="id">Select Ground:</label>
                <select id="id" name="id" required>
                    <option value="">Select a Ground</option>
                    <?php
                    if ($result->num_rows > 0) {
                        $result->data_seek(0);
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['id']) . ' - ' . htmlspecialchars($row['ground_name']) . '</option>';
                        }
                    }
                    ?>
                </select>

                <label for="booking_date">Booking Date:</label>
                <input type="date" id="booking_date" name="booking_date" required>

                <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>" required>

                <button type="submit" name="book_ground">Book Ground</button>
                <button type="button" onclick="window.history.back()">Back</button>
            </form>

            <script>
                function selectGround(row) {
                    const groundId = row.cells[0].textContent.trim();
                    const selectElement = document.getElementById('id');
                    selectElement.value = groundId;
                    document.querySelector('.booking-form').scrollIntoView({ behavior: 'smooth' });
                }

                function validateBookingForm(event) {
                    let isValid = true;

                    const userName = document.getElementById('user_name').value.trim();
                    const groundId = document.getElementById('id').value;
                    const bookingDate = document.getElementById('booking_date').value;

                    if (!/^[a-zA-Z\s]+$/.test(userName)) {
                        alert("Name should only contain letters and spaces.");
                        document.getElementById('user_name').focus();
                        isValid = false;
                    }

                    if (!groundId || !/^\d+$/.test(groundId) || parseInt(groundId) <= 0) {
                        alert("Please select a valid ground.");
                        document.getElementById('id').focus();
                        isValid = false;
                    }

                    const today = new Date().toISOString().split('T')[0];
                    if (bookingDate < today) {
                        alert("Booking date cannot be in the past.");
                        document.getElementById('booking_date').focus();
                        isValid = false;
                    }

                    if (!isValid) {
                        event.preventDefault();
                        return false;
                    }

                    return true;
                }

                document.querySelector('form').addEventListener('submit', validateBookingForm);
            </script>
        </div>
    </div>
</body>
</html>