<?php 
require_once"connection.php";

$id = $_POST['id'];
$description = $_POST['description'];

$sql = "UPDATE tbl_products set produc_description = '$description' WHERE id = '$id'";
$result = mysqli_query($con,$sql);

if($result){
	echo "<div class='col-md-12' id='descname'>
				<h5>Product Description:</h5>
				<div class='input-group mb-3'>
				  <textarea class='form-control' aria-label='Recipients username' aria-describedby='button-addon2' id='pdesc'>$description</textarea>
				  <div class='input-group-append'>
				    <a href='#' onclick='updateProductDesc($id)'><button class='btn btn-outline-secondary' type='button' id='button-addon2'>Update</button></a>
				  </div>
				</div>
				</div>";
}

?>