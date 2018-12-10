<?php
	
	include 'connection.php';

	$categoryID = $_POST['categoryID'];
	$data = "";

	$sql = "SELECT * FROM tbl_product where id = '$categoryID'";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result)>0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$data.="<div class='col-md-4 mb-2 mt-2'>
			                	<div class='card h-100'>
			                  <img src='$row[image_path]'>
			                  <div class='card-body'>
			                  <h4 class='card-title font-weight-bold'><a href='product.php?id=$row[id]'>$row[name]</a></h4>
			                  <h5>$row[price]</h5>
			                  <p class='card-text'>
			                  $row[produc_description]</p>
			                  </div>
			                  <div class='card-footer'>
			                  <input class='form-control w-100' type='number'>
			                  <button class='btn w-100 btn-primary mt-2 font-weight-bold'><i class='fas fa-cart-arrow-down'></i> Add to cart</button>
			                  </div>
			                </div>
			            </div>";
		}
	}
	echo $data;
?>