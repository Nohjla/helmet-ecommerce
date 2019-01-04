<?php
require_once "connection.php";

$id = $_POST['id'];

$sql = "SELECT * FROM tbl_products WHERE id = '$id'";

$result = mysqli_query($con,$sql);
$data = "";
if(mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result)) {
		$path = $row["image_path"];
		if(!unlink($path)){
			$data .= "you have an error";
		}
		else{
			$delete = "DELETE FROM tbl_products WHERE id = '$id'";
			$delete_result = mysqli_query($con,$delete);
			if($delete_result){
				$sql2 = "SELECT p.id 'id', p.name 'name', p.price 'price', p.produc_description 'produc_description',c.name 'brand' from tbl_products p,tbl_categories c where p.categories_id = c.id";

			    $result2 = mysqli_query($con,$sql2);

			    if(mysqli_num_rows($result2) > 0){
			    	while ($row = mysqli_fetch_assoc($result2)) {
			        $id = $row["id"];
			    		$data .= "<tr class='text-center'>
			    				<th scope='row' class='text-center'>$row[id]</th>
			    				<td class='text-center'>
			    				$row[brand]
			    				</td>
			    				<td class='text-center'>$row[name]</td>
			    				<td class='text-center'>$row[price]</td>
			    				<td class='text-center'>$row[produc_description]</td>
			    				<td class='text-center'>
			    				<a href='#' class='text-warning' onclick='updateProduct($id)'><i class='far fa-edit'></i></a>
			    				</td>
			    				<td class='text-center'>
			    				<a href='#' class='text-danger' onclick='deleteProduct($id)'><i class='fas fa-trash-alt'></i></a>
			    				</td>
			    		 	</tr>";
			    	}
			    }
			}
		}
	}
}

echo $data;
?>