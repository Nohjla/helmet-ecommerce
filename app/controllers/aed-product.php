<?php require_once"../partials/header.php";	?>
<section class="mp">
<div class="container">
<div class="row">
<a href="add_item.php" class="text-success">Add New Product <i class="fas fa-plus"></i></a>
</div>
<div class="row">
<table class="table ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  
    <?php 
    require_once "connection.php";

    $sql = "SELECT * from tbl_products";

    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result)){
    	while ($row = mysqli_fetch_assoc($result)) {
    		echo "<tr class='text-center'>
    				<th scope='row' class='text-center'>$row[id]</th>
    				<td class='text-center'>
    				<div class='container'>
    				<div class='row'>
    				<div class='col-md-4'>
    				<img src='$row[image_path]' class='img-fluid'>
    				</div>
    				</div>
    				</div>
    				</td>
    				<td class='text-center'>$row[name]</td>
    				<td class='text-center'>$row[price]</td>
    				<td class='text-center'>$row[produc_description]</td>
    				<td class='text-center'>
    				<a href='#' class='text-warning'><i class='far fa-edit'></i></a>
    				</td>
    				<td class='text-center'>
    				<a href='#' class='text-danger'><i class='fas fa-trash-alt'></i></a>
    				</td>
    		 	</tr>";
    	}
    }

    ?>
  </tbody>
</table>
</div>
</div>
</section>
<?php require_once"../partials/footer.php";	?>