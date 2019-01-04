<?php require_once "../partials/header.php"; ?>

<section class="mp">
<div class="container">
	<div class="row">
		<div class="col-md-6 mt-2">
		<h4>Transaction Item <i class="fab fa-ethereum"></i></h4>
		</div>
		<div class="col-md-6 mt-2">
			<span class="text-info"><em>Input range of date and then click search</em></span>
			<div class="row m-2">
			<label for="startDate">Start Date</label>
		    <span></span>
		    <input type="date" class="form-control" id="startDate" placeholder="00/00/0000">
		    </div>
			<div class="row m-2">
			<label for="endDate">End Date</label>
			<span></span>
			<input type="date" class="form-control" id="endDate" placeholder="00/00/0000">
			</div>
			<div class="row m-2">
				<a href="#" class="text-info" onclick="viewTracking()"> <i class="fab fa-searchengin fa-2x"> search</i></a>

			</div>
		</div>
	</div>
<div class="row">
<div class="table-responsive">
<table class="table table-bordered table-dark">
<thead>
<tr>
<th scope="col">Date of Purchase</th>
<th scope="col">Transaction Code</th>
<th scope="col">Payment</th>
<th scope="col">Status</th>
</tr>
</thead>
 <tbody id="trackingDiv">
	<?php
	require_once "connection.php";
	$id = $_SESSION['userid'];

	$sql = "SELECT o.id 'tid',o.purchase_date 'pdate', o.transaction_code 'tcode',o.payment 'payment', s.name 'status' from tbl_orders o, tbl_status s where o.status_id = s.id AND user_id = '$id' ";

	$result = mysqli_query($con,$sql);

	if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>$row[pdate]</td>";
			echo "<td><a href='#' onclick='showTrans($row[tid])'>$row[tcode]</a></td>
			<td>$row[payment]</td>
			<td>$row[status]</td>
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
<div class="container" id="transaction_item">
	
</div>
<?php require_once "../partials/footer.php"; ?>