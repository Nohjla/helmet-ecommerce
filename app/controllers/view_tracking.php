<?php require_once "../partials/header.php"; ?>

<section class="mp">
<div class="container">
	<h4>Transaction Item <i class="fab fa-ethereum"></i></h4>
<table class="table table-bordered table-dark">
<thead>
<tr>
<th scope="col">Date of Purchase</th>
<th scope="col">Transaction Code</th>
<th scope="col">Status</th>
</tr>
</thead>
 <tbody>
	<?php
	require_once "connection.php";
	$id = $_SESSION['userid'];

	$sql = "SELECT o.id 'tid',o.purchase_date 'pdate', o.transaction_code 'tcode', s.name 'status' from tbl_orders o, tbl_status s where o.status_id = s.id AND user_id = '$id' ";

	$result = mysqli_query($con,$sql);

	if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>$row[pdate]</td>";
			echo "<td><a href='#' onclick='showTrans($row[tid])'>$row[tcode]</a></td>
			<td>$row[status]</td>
			</tr>";
		}
	}

	?>
</tbody>
</table>
</div>
</section>
<div class="container" id="transaction_item">
	
</div>
<?php require_once "../partials/footer.php"; ?>