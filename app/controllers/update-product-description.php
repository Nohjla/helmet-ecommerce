<?php 
require_once"connection.php";

$id = $_POST['id'];
$description = $_POST['description'];

$sql = "UPDATE tbl_products set produc_description = '$description' WHERE id = '$id'";
$result = mysqli_query($con,$sql);

if($result){
	echo "Successfully changed";
}

?>