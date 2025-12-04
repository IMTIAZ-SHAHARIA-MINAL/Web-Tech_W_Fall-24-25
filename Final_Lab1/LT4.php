<?php

// 1. Sum function
function sum($a, $b) {
    return $a + $b;
}

echo "Sum of 5 and 10: " . sum(5, 10) . "<br>";


// 2. Factorial function (recursive)
function factorial($n) {
    if ($n == 0 || $n == 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

echo "Factorial of 5: " . factorial(5) . "<br>";


// 3. Function to check prime number
function is_prime($n) {
    if ($n <= 1) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

// Testing prime function
$numbers = [2, 4, 7, 10, 13];

foreach ($numbers as $num) {
    if (is_prime($num)) {
        echo "$num is a prime number.<br>";
    } else {
        echo "$num is NOT a prime number.<br>";
    }
}

?>
