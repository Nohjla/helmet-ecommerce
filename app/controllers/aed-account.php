<?php require_once"../partials/header.php"; ?>

<section class="mp">
<div class="container">
	<div class="row">
		<h4>Transaction Checkout List</h4>
	</div>
	<div class="row">
		<div class="table-responsive-xl">
  			<table class="table table-bordered table-dark">
  				<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Email</th>
			      <th scope="col">Contact</th>
			      <th scope="col">Transaction Code</th>
			      <th scope="col">Purchase Date</th>
			      <th scope="col">Status</th>
			      <th scope="col">Checkout</th>
			    </tr>
			  	</thead>
			  	<tbody id="transInfo">
	<?php
	require_once"connection.php";

	$sql = "SELECT o.id 'id', o.transaction_code 'tcode',o.purchase_date 'pdate',s.name 'status', a.username 'email',a.contact 'contact' FROM tbl_orders o,tbl_status s,tbl_account a where o.user_id = a.id AND s.id = o.status_id AND s.name ='pending'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)){
		while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>
				<th scope='row'>$row[id]</th>
				<td>$row[email]</td>
				<td>$row[contact]</td>
				<td>$row[tcode]</td>
				<td>$row[pdate]</td>
				<td>$row[status]</td>
				<td class='text-center'><a href='#' class='text-info' onclick='updateStatus($row[id])'><i class='fas fa-marker'></i></a></td>
				</tr>";
		}
	}
	?>			
				</tbody>
			</table>
		</div>
	</div>
</div>
</section>
<?php require_once"../partials/footer.php"; ?>