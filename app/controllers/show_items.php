
<?php
	
	include 'connection.php';

	$categoryID = $_POST['categoryID'];
	$data = "";
	$sql = "SELECT * FROM tbl_products where categories_id = '$categoryID'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result)>0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$data.=" <div class='col-md-3 mb-3'>
						      				
						                    <div class='card h-100'>
						                       		<img src='$row[image_path]' class='img-fluid'>
						                          <div class='card-body'>
						                          	<div class='row'>
						                            <h6 class='card-title'><a href='product.php?id=$row[id]'>$row[name]</a></h6>
						                            </div>
						                            <div class='row'>
						                            <h5 class='price'>₱ $row[price]</h5>
						                            </div>
						                            <div class='row ml-1'>
						                            <div class='input-group'>
						                            <input type='button' value='-'' class='button-minus' data-field='quantity'>
  													<input type='number' step='1' max='10' value='1' name='quantity' class='quantity-field' id='quantity$row[id]' onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
  													<input type='button' value='+' class='button-plus' data-field='quantity'>
  													</div>
						                            
						                            </div>
						                          <a href='#' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-plus'></i> Add to Cart</a>
						                          <div class='row ml-1 mt-2'>
							                          <i class='far fa-star'></i>
							                          <i class='far fa-star'></i>
							                          <i class='far fa-star'></i>
							                          <i class='far fa-star'></i>
							                          <i class='far fa-star'></i>
						                          </div>
						                          </div>
						                    </div>
						                  </div>";
		}
	}
	echo $data;
?>
<script type="text/javascript" src="../assets/js/script.js"></script>