<?php 
require_once"connection.php";

$id = $_POST['id'];
$brand_id = $_POST['brand'];

$sql = "UPDATE tbl_products set categories_id = '$brand_id' WHERE id = '$id'";
$result = mysqli_query($con,$sql);
$data ="";
if($result){
	$sql2 = "SELECT * FROM tbl_categories";
		$result2 = mysqli_query($con,$sql2);
		if(mysqli_num_rows($result2)>0){
			$data.= "
			<div class='col-md-12'id='brname'>
			<h5>Product Brand:</h5>
			<div class='input-group'>
		  <select class='custom-select' id='brand' aria-label='Example select with button addon'>";
			while ($row2 = mysqli_fetch_assoc($result2)) {
				$data .="<option value='$row2[id]'>$row2[name]</option>";
			}
			$data .="</select>
					  <div class='input-group-append'>
					    <a href='#' onclick='updateProductBrand($id)'><button class='btn btn-outline-secondary' type='button'>Update</button></a>
					  </div>
					</div>
					</div>";
}
}
echo $data;
?>