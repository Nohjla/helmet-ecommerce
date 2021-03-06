<?php 
    require_once "connection.php";

    $sql = "SELECT p.id 'id', p.name 'name', p.price 'price', p.produc_description 'produc_description',p.image_path 'image_path',c.name 'brand' from tbl_products p,tbl_categories c where p.categories_id = c.id";

    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) > 0){
    	while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
    		echo "<tr class='text-center'>
    				<th scope='row' class='text-center'>$row[id]</th>
    				<td class='text-center'>
    				$row[brand]
    				</td>
    				<td class='text-center'>$row[name]</td>
    				<td class='text-center'>$row[price]</td>
                    <td class='text-center'>$row[produc_description]</td>
    				<td class='text-center'><img src='$row[image_path]' class='img-fluid'></td>
    				<td class='text-center'>
    				<a href='#' class='text-warning' onclick='updateProduct($id)'><i class='far fa-edit'></i></a>
    				</td>
    				<td class='text-center'>
    				<a href='#' class='text-danger' onclick='deleteProduct($id)'><i class='fas fa-trash-alt'></i></a>
    				</td>
    		 	</tr>";
    	}
    }

    ?>