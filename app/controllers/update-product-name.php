<?php 
require_once"connection.php";

$id = $_POST['id'];
$name = $_POST['name'];

$sql = "UPDATE tbl_products set name = '$name' WHERE id = '$id'";
$result = mysqli_query($con,$sql);

if($result){
	echo "Successfully changed";
}

?>