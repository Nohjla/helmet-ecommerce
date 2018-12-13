
<?php
	
	include 'connection.php';

	$categoryID = $_POST['fcategoryID'];
	$data = "";

	$sql = "SELECT * FROM tbl_products where name LIKE '%".$categoryID."%'";
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
			                  <input type='number' class ='form-control mb-3' min='1' value='1' id='quantity$row[id]' onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
			                  <button class='btn w-100 btn-primary mt-2 font-weight-bold' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-arrow-down'></i> Add to cart</button>
			                  </div>
			                </div>
			            </div>";
		}
	}
	else{
		$data = "no results found";
	}
	echo $data;
?>
<?php
	require_once '../partials/footer.php';
?>