<?php
// Declare and initialize variables
$stringVar = "Hello PHP";
$intVar = 10;
$floatVar = 5.5;
$boolVar = true;

// Arithmetic operations
$sum = $intVar + $floatVar;
$sub = $intVar - $floatVar;
$mul = $intVar * $floatVar;
$div = $intVar / $floatVar;

// Output results
echo "String Variable: $stringVar<br>";
echo "Integer Variable: $intVar<br>";
echo "Float Variable: $floatVar<br>";
echo "Boolean Variable: " . ($boolVar ? 'true' : 'false') . "<br><br>";

echo "Addition: $sum<br>";
echo "Subtraction: $sub<br>";
echo "Multiplication: $mul<br>";
echo "Division: $div<br><br>";

// Sum using echo and print
$number1 = 20;
$number2 = 30;
echo "Sum using echo: " . ($number1 + $number2) . "<br>";
print "Sum using print: " . ($number1 + $number2) . "<br>";

// Using var_dump()
echo "<br><br>--- Using var_dump() ---<br>";
var_dump($stringVar); echo "<br>";
var_dump($intVar); echo "<br>";
var_dump($floatVar); echo "<br>";
var_dump($boolVar); echo "<br>";
?>
