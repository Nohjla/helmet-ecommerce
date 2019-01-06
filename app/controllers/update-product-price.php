<?php 
require_once"connection.php";

$id = $_POST['id'];
$price = $_POST['price'];

$sql = "UPDATE tbl_products set price = '$price' WHERE id = '$id'";
$result = mysqli_query($con,$sql);

if($result){
	echo "<div class='col-md-12' id='prname'>
				<h5>Product Price:</h5>
				<div class='input-group mb-3'>
				  <input type='number' class='form-control' value='$price' id='pprice'  aria-label='Recipients username' aria-describedby='button-addon2'>
				  <div class='input-group-append'>
				    <a href='#' onclick='updateProductPrice($id)'><button class='btn btn-outline-secondary' type='button' id='button-addon2'>Update</button></a>
				  </div>
				</div>
			</div>";
}

?>