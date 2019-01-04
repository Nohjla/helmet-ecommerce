<?php require_once"../partials/header.php";	?>
<section class="mp">
<div class="container">
<div class="row m-5" id="productInfo">
  
</div>

<div class="row">
<a href="add_item.php" class="text-success m-2">Add New Product <i class="fas fa-plus"></i></a>
</div>
<div class="row">
<div class="table-responsive-md">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID#</th>
      <th scope="col">Brand</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody id="productInfoTable">
  
    <?php 
    require_once "connection.php";

    $sql = "SELECT p.id 'id', p.name 'name', p.price 'price', p.produc_description 'produc_description',c.name 'brand' from tbl_products p,tbl_categories c where p.categories_id = c.id";

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
  </tbody>
</table>
</div>
</div>
</div>
</section>
<?php require_once"../partials/footer.php";	?>