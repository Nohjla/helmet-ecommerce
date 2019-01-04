<?php
require_once "connection.php";

$id = $_POST['id'];
$data ="<div class='container-fluid'>";

$sql = "SELECT * from tbl_products where id = '$id'";

$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$data.= "<div class='row'>
				 <div class='col-md-4'>
					<h4>$row[name]</h4>
					<img src='$row[image_path]' class='img-fluid'>
				</div>
				<div class='col-md-7'>
					<div class='row'>
					<p class='desc'>$row[produc_description]</p>
					</div>
					<div class='row'>
						<div class='col-md-6'>
							<div class='input-group'>
			                <input type='button' value='-'' class='button-minus' data-field='quantity'>
								<input type='number' step='1' min='1' max='10' value='1' name='quantity' class='quantity-field' id='quantity$row[id]' onkeypress='return event.charCode >= 48 && event.charCode <= 57' disabled>
								<input type='button' value='+' class='button-plus' data-field='quantity'>
							</div>
						</div>
						<div class='col-md-6 mt-4'>
							<p class='m-1'>
							<a href='#' class='adc' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-plus'></i> Add to Cart</a>
							</p>
							<i class='far fa-star ml-2'></i>
	                        <i class='far fa-star'></i>
	                        <i class='far fa-star'></i>
	                        <i class='far fa-star'></i>
	                        <i class='far fa-star'></i>
						</div>
					</div>
					<div class='row'>
						
					</div>

				</div>
				</div>


		";


		;
	}
	$data .= "</div>";
}
echo $data;

?>
<script type="text/javascript" src="../assets/js/script.js"></script>