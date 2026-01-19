<!DOCTYPE html>
<html>
<body>

<?php
function divide($a, $b) {
    if ($b == 0) {
        throw new Exception("Division by zero error");
    }
    return $a / $b;
}

try {
    echo divide(10, 0);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

</body>
</html>
