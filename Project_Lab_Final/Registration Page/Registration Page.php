<?php
// --------------------------------------
// Dummy database (NO REAL DB)
// --------------------------------------
$existing_emails = ["test@gmail.com", "user@yahoo.com"];
$existing_contacts = ["01700000000", "01800000000"];

$errors = [];
$fullname = $email = $password = $confirm_password = "";
$gender = $dob = $country = $contact = $address = "";

// --------------------------------------
// Form Submit Handler
// --------------------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // FULL NAME
    $fullname = trim($_POST["fullname"]);
    if (empty($fullname)) {
        $errors[] = "Full Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $fullname)) {
        $errors[] = "Full Name may only contain letters and spaces.";
    }

    // EMAIL
    $email = trim($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } elseif (in_array($email, $existing_emails)) {
        $errors[] = "Email already exists.";
    }

    // PASSWORD
    $password = $_POST["password"];
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    } elseif (!preg_match("/[A-Z]/", $password)) {
        $errors[] = "Password must include at least one uppercase letter.";
    } elseif (!preg_match("/[0-9]/", $password)) {
        $errors[] = "Password must include at least one number.";
    } elseif (!preg_match("/[\W]/", $password)) {
        $errors[] = "Password must include at least one special character.";
    }

    // CONFIRM PASSWORD
    $confirm_password = $_POST["confirm_password"];
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // GENDER
    if (empty($_POST["gender"])) {
        $errors[] = "Please select your gender.";
    } else {
        $gender = $_POST["gender"];
    }

    // DATE OF BIRTH
    $dob = $_POST["dob"];

    // COUNTRY
    $country = $_POST["country"];

    // CONTACT NUMBER
    $contact = trim($_POST["contact"]);
    if (!preg_match("/^[0-9]{11}$/", $contact)) {
        $errors[] = "Contact number must be exactly 11 digits.";
    } elseif (in_array($contact, $existing_contacts)) {
        $errors[] = "Contact number already exists.";
    }

    // ADDRESS
    $address = trim($_POST["address"]);
    if (empty($address)) {
        $errors[] = "Address cannot be empty.";
    }

    // TERMS
    if (!isset($_POST["terms"])) {
        $errors[] = "You must agree to the terms and conditions.";
    }

    // CAPTCHA (Dummy)
    if ($_POST["captcha"] !== "5") {
        $errors[] = "Invalid Captcha answer.";
    }

    if (empty($errors)) {
        echo "<script>alert('Registration Successful! (Demo mode - No DB)');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #eef3f7;
}

.container {
    width: 450px;
    margin: 40px auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

input, select {
    width: 100%;
    padding: 10px;
    margin-bottom: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Gender Layout Fix */
.gender-wrapper {
    display: flex;
    gap: 35px;
    align-items: center;
    margin-bottom: 15px;
}

.gender-item {
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Terms & Condition FIXED */
.terms-wrapper {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 8px 0 18px 0;
}

button {
    width: 100%;
    background: #007bff;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 17px;
}

button:hover {
    background: #0056b3;
}

.error-box {
    background: #ffdddd;
    border-left: 5px solid red;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
}
</style>
</head>

<body>

<div class="container">

<h2>Registration Form</h2>

<?php if (!empty($errors)): ?>
<div class="error-box">
    <?php foreach ($errors as $err): ?>
        <p>• <?= $err ?></p>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<form method="POST">

<label>Full Name:</label>
<input type="text" name="fullname" value="<?= $fullname ?>">

<label>Email:</label>
<input type="email" name="email" value="<?= $email ?>">

<label>Password:</label>
<input type="password" name="password">

<label>Confirm Password:</label>
<input type="password" name="confirm_password">

<label>Gender:</label>
<div class="gender-wrapper">
    <label class="gender-item">
        <input type="radio" name="gender" value="Male" <?= $gender=="Male" ? "checked" : "" ?>> Male
    </label>

    <label class="gender-item">
        <input type="radio" name="gender" value="Female" <?= $gender=="Female" ? "checked" : "" ?>> Female
    </label>
</div>

<label>Date of Birth:</label>
<input type="date" name="dob" value="<?= $dob ?>">

<label>Country:</label>
<select name="country">
    <option value="Bangladesh" <?= $country=="Bangladesh"?"selected":"" ?>>Bangladesh</option>
    <option value="India" <?= $country=="India"?"selected":"" ?>>India</option>
    <option value="Pakistan" <?= $country=="Pakistan"?"selected":"" ?>>Pakistan</option>
</select>

<label>Contact Number:</label>
<input type="text" name="contact" value="<?= $contact ?>" placeholder="11-digit number">

<label>Address:</label>
<input type="text" name="address" value="<?= $address ?>">

<label>Captcha: (2 + 3 = ?)</label>
<input type="text" name="captcha" placeholder="Enter 5">

<!-- FIXED TERMS CHECKBOX -->
<div class="terms-wrapper">
    <input type="checkbox" name="terms" <?= isset($_POST["terms"]) ? "checked" : "" ?>>
    <label>I agree to the terms and conditions.</label>
</div>

<button type="submit">Register</button>

</form>

</div>

</body>
</html>
