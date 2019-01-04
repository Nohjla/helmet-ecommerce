<?php
require_once "connection.php";

$id = $_POST['id'];
$data ="";
$sql = "SELECT o.price 'price', t.transaction_code 'code',t.purchase_date 'pdate',t.shipping_address 'address',p.name 'pname',p.produc_description 'description',p.image_path 'image',s.name 'status' FROM tbl_order_items o, tbl_orders t, tbl_products p, tbl_status s WHERE o.products_id = p.id AND o.orders_id = t.id AND t.status_id = s.id AND t.id = $id";
	$result = mysqli_query($con,$sql);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$data .="<hr>
			<div class='row m-2'>
			<div class='col-md-6'>
			<img src='$row[image]' class='img-fluid'>
			</div>
			<div class='col-md-6'>
			<div class='row'>
			<p class='border p-2 rounded bg-dark text-light'><em>$row[description]</em></p>
			</div>

			<div class='row'>
			<div class='col'>
			<p><strong>Product Name:</strong> $row[pname]</p>
			</div>
			<div class='col'>
			<p><strong>Price:</strong> $row[price]</p>
			</div>
			</div>

			<div class='row'>
			<div class='col'>
			<p><strong>Transaction code:</strong> $row[code]</p>
			</div>
			<div class='col'>
		   	<p><strong>Purchase date:</strong> $row[pdate]</p>
		   	</div>
		   	</div>

		   	<div class='row'>
		   	<div class='col'>
			<p><strong>Shipping address:</strong> $row[address]</p>
			</div>
			</div>

			</div>
			</div>
			";
		}
	}

echo $data;

?>