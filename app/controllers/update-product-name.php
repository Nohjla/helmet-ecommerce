<?php 
require_once"connection.php";

$id = $_POST['id'];
$name = $_POST['name'];

$sql = "UPDATE tbl_products set name = '$name' WHERE id = '$id'";
$result = mysqli_query($con,$sql);

if($result){
	echo "	<div class='col-md-12' id='ename'>
					<h5 class ='mt-5'>Product Name:</h5>
				  <div class='input-group mb-3'>
				  <input type='text' class='form-control' value='$name' id='pname' aria-label='Recipients username' aria-describedby='button-addon2'>
				  <div class='input-group-append'>
				    <a href='#' onclick='updateProductName($id)'><button class='btn btn-outline-secondary' type='button' id='button-addon2'>Update</button></a>
				  </div>
				</div>
				</div>";
}

?>