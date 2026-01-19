<?php
// Declare variables
$temperature = 18;   // Example temperature (you can change)
$day = 3;            // Example day number (1 = Monday, ..., 7 = Sunday)

// Validate temperature
if (!is_numeric($temperature)) {
    echo "Invalid temperature value!<br>";
} else {
    // If-else for temperature range
    if ($temperature < 10) {
        echo "It's cold.<br>";
    } elseif ($temperature >= 10 && $temperature <= 25) {
        echo "It's warm.<br>";
    } else {
        echo "It's hot.<br>";
    }
}

// Validate day number (1–7)
if (!is_numeric($day) || $day < 1 || $day > 7) {
    echo "Invalid day value! Please enter a number between 1 and 7.<br>";
} else {
    // Switch-case to output day name
    switch ($day) {
        case 1:
            echo "Monday";
            break;
        case 2:
            echo "Tuesday";
            break;
        case 3:
            echo "Wednesday";
            break;
        case 4:
            echo "Thursday";
            break;
        case 5:
            echo "Friday";
            break;
        case 6:
            echo "Saturday";
            break;
        case 7:
            echo "Sunday";
            break;
    }
}
?>
