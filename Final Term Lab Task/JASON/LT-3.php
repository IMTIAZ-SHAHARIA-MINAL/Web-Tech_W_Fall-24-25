<?php
$data = ["course"=>"Web Tech", "credit"=>3];
$json = json_encode($data);
$array = json_decode($json, true);
?>

<!DOCTYPE html>
<html>
<body>

<?php
echo "Course: ".$array['course']."<br>";
echo "Credit: ".$array['credit'];
?>

</body>
</html>
