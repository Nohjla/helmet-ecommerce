<?php 
require_once "connection.php";

$id = $_POST['id'];

$data = "";

$sql = "SELECT * FROM tbl_products WHERE id = '$id'";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$pid = $row["id"];
		$data .= "<div class='col-md-6'>
						<form action='update-product-img.php' method='POST' enctype='multipart/form-data'>
						<div class='form-group'>
						<span>Upload New Image:</span>
						<input type='hidden' class='form-control' value='$id' name='imgid'>
						<input type='hidden' class='form-control' value='$row[image_path]' name='imgpt'>
						<input type='file' class='form-control-file' name='file' id='fileToUpload'>
						</div>
						<button type='submit' class='btn btn-primary' name='submit'>Save File</button>
						</form>
					</div>

				<div class='col-md-12' id='ename'>
					<h5 class ='mt-5'>Product Name:</h5>
				  <div class='input-group mb-3'>
				  <input type='text' class='form-control' value='$row[name]' id='pname' aria-label='Recipients username' aria-describedby='button-addon2'>
				  <div class='input-group-append'>
				    <a href='#' onclick='updateProductName($pid)'><button class='btn btn-outline-secondary' type='button' id='button-addon2'>Update</button></a>
				  </div>
				</div>
				</div>

				<div class='col-md-12' id='prname'>
				<h5>Product Price:</h5>
				<div class='input-group mb-3'>
				  <input type='number' class='form-control' value='$row[price]' id='pprice'  aria-label='Recipients username' aria-describedby='button-addon2'>
				  <div class='input-group-append'>
				    <a href='#' onclick='updateProductPrice($pid)'><button class='btn btn-outline-secondary' type='button' id='button-addon2'>Update</button></a>
				  </div>
				</div>
				</div>

				<div class='col-md-12' id='descname'>
				<h5>Product Description:</h5>
				<div class='input-group mb-3'>
				  <textarea class='form-control' aria-label='Recipients username' aria-describedby='button-addon2' id='pdesc'>$row[produc_description]</textarea>
				  <div class='input-group-append'>
				    <a href='#' onclick='updateProductDesc($pid)'><button class='btn btn-outline-secondary' type='button' id='button-addon2'>Update</button></a>
				  </div>
				</div>
				</div>

				";
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
					    <a href='#' onclick='updateProductBrand($pid)'><button class='btn btn-outline-secondary' type='button'>Update</button></a>
					  </div>
					</div>
					</div>"; 
		}		
		
	}
}
echo $data;
?>

  