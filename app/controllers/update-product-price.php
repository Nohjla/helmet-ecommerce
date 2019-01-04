<?php 
require_once"connection.php";

$id = $_POST['id'];
$price = $_POST['price'];

$sql = "UPDATE tbl_products set price = '$price' WHERE id = '$id'";
$result = mysqli_query($con,$sql);

if($result){
	echo "Successfully changed";
}

?>