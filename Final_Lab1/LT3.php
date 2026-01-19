<?php
// ------------------------------------------
// For Loop: Print numbers from 1 to 20
// ------------------------------------------
echo "<h3>For Loop (1 to 20)</h3>";
for ($i = 1; $i <= 20; $i++) {
    echo $i . " ";
}

echo "<br><br>";


// ------------------------------------------
// While Loop: Print even numbers from 1 to 20
// ------------------------------------------
echo "<h3>While Loop (Even numbers from 1 to 20)</h3>";
$num = 1;

while ($num <= 20) {
    if ($num % 2 == 0) {
        echo $num . " ";
    }
    $num++;
}

echo "<br><br>";


// ------------------------------------------
// Associative Array of Fruits with Colors
// ------------------------------------------
$fruits = [
    "apple" => "red",
    "banana" => "yellow",
    "grape" => "purple",
    "orange" => "orange",
    "mango" => "green"
];


// ------------------------------------------
// Foreach Loop: Print fruit names with colors
// Stop after printing first 5 items using break
// ------------------------------------------
echo "<h3>Foreach Loop (Fruit and Colors)</h3>";

$count = 0;
foreach ($fruits as $fruit => $color) {
    echo "Fruit: $fruit — Color: $color <br>";
    $count++;

    if ($count == 5) {  
        break;          // Stop after 5 items
    }
}
?>
