<!DOCTYPE html>
<html>
<body>

<?php
class Student {
    public $name;
    public $id;

    function setData($n, $i) {
        $this->name = $n;
        $this->id = $i;
    }

    function showData() {
        echo "Name: " . $this->name . "<br>";
        echo "ID: " . $this->id;
    }
}

$st = new Student();
$st->setData("Rahim", 101);
$st->showData();
?>

</body>
</html>
