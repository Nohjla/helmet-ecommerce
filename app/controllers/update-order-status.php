<?php
require_once"connection.php";

$id = $_POST['id'];

$sql = "UPDATE tbl_orders set status_id = 2 where id = '$id' ";
$result = mysqli_query($con,$sql);
$data = "";
if($result){
	$sql2 = "SELECT o.id 'id', o.transaction_code 'tcode',o.purchase_date 'pdate',s.name 'status', a.username 'email',a.contact 'contact' FROM tbl_orders o,tbl_status s,tbl_account a where o.user_id = a.id AND s.id = o.status_id AND s.name ='pending'";
	$result2 = mysqli_query($con,$sql2);
	if(mysqli_num_rows($result2)){
		while ($row = mysqli_fetch_assoc($result2)) {
		$data .="<tr>
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
}
else
{
	$data  .= "failed";
}
echo $data;
?>