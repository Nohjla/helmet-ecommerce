<?php
require_once"connection.php";
$data = $_POST['brand'];
$trapping_data = strtoupper($data);
$trapping = "SELECT * from tbl_categories where name = '$trapping_data'";

$trapping_result = mysqli_query($con,$trapping);

if(mysqli_num_rows($trapping_result)> 0){
echo "<script>alert('Inputted data already exist')</script>";	
}
else
{
$sql = "INSERT INTO tbl_categories(name)VALUES('$data')";

$result = mysqli_query($con,$sql);
echo $data;
}
?>