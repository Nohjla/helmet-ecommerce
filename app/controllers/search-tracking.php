<?php
	session_start();
	require_once "connection.php";

	$id = $_SESSION['userid'];
	$sdate = $_POST['sdate'];
	$edate = $_POST['edate'];
	$data = "";
	$sql = "SELECT o.id 'tid',o.purchase_date 'pdate', o.transaction_code 'tcode',o.payment 'payment', s.name 'status' from tbl_orders o, tbl_status s where o.status_id = s.id AND user_id = '$id' AND o.purchase_date BETWEEN '$sdate' AND '$edate' ";

	$result = mysqli_query($con,$sql);

	if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			$data .= "<tr><td>$row[pdate]</td>
			<td><a href='#' onclick='showTrans($row[tid])'>$row[tcode]</a></td>
			<td>$row[payment]</td>
			<td>$row[status]</td>
			</tr>";
		}
	}
	else{
		$data .="no item found";
	}
echo $data;
?>