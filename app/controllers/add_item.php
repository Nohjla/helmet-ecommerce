<?php require_once "../partials/header.php";?>
<?php require_once "../controllers/connection.php"; ?>

<div class="container table-hover">
<form action="validate-add_item.php" method="POST" enctype="multipart/form-data">
	Choose brand:
	<div class="form-group">
	<select class="form-control" name="brand">
	<?php
		$sql ="SELECT * from tbl_categories";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo "<option value='$row[id]'>$row[name]</option>";
			}
		}
	?>
		
	</select>
	</div>
	<div class="form-group">
	Product Name: <input type="text" class="form-control" name="name">
	</div>
	<div class="form-group">
	Product Price: <input type="number" min="1" step="any" class="form-control" name="price">
	</div>
	<div class="form-group">
	Product Description<textarea class="form-control" name="product_description"></textarea>
	</div>
	<div class="form-group">
	Upload Image:<input type="file" class="form-control-file" name="file" id="fileToUpload">
	</div>
	<button type="submit" class="btn btn-primary" name="submit">submit</button>

</form>
</div>


<?php require_once "../";?>