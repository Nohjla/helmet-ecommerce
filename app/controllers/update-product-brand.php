<?php 
require_once"connection.php";

$id = $_POST['id'];
$brand_id = $_POST['brand'];

$sql = "UPDATE tbl_products set categories_id = '$brand_id' WHERE id = '$id'";
$result = mysqli_query($con,$sql);

if($result){
	echo "Successfully changed";
}

?>