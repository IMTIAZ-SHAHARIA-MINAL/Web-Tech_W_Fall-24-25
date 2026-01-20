<?php
session_start();

// Prevent direct access
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: book_ground.php");
    exit;
}

// Capture booking data
$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'];
$ground_id = $_POST['id'];
$booking_date = $_POST['booking_date'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Payment Gateway</title>

<style>
body {
    font-family: 'Inter', sans-serif;
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    background: white;
    padding: 25px;
    width: 400px;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.2);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.payment-option {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 6px;
    margin-bottom: 10px;
    cursor: pointer;
}

.payment-option input {
    transform: scale(1.2);
}

button {
    width: 100%;
    padding: 12px;
    margin-top: 15px;
    background: #667eea;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
}

button:hover {
    background: #5a67d8;
}
</style>
</head>

<body>

<div class="container">
    <h2>Payment Gateway</h2>

    <form action="booking_process.php" method="post">

        <!-- Pass booking data forward -->
        <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
        <input type="hidden" name="user_name" value="<?= htmlspecialchars($user_name) ?>">
        <input type="hidden" name="id" value="<?= htmlspecialchars($ground_id) ?>">
        <input type="hidden" name="booking_date" value="<?= htmlspecialchars($booking_date) ?>">

        <div class="payment-option">
            <input type="radio" name="payment_method" value="Card" required>
            <label>Credit / Debit Card</label>
        </div>

        <div class="payment-option">
            <input type="radio" name="payment_method" value="Bkash">
            <label>bKash</label>
        </div>

        <div class="payment-option">
            <input type="radio" name="payment_method" value="Rocket">
            <label>Rocket</label>
        </div>

        <div class="payment-option">
            <input type="radio" name="payment_method" value="Nagad">
            <label>Nagad</label>
        </div>

        <button type="submit" name="book_ground">
            Confirm Payment & Book Ground
        </button>
    </form>
</div>

</body>
</html>
