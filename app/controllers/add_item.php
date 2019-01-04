<?php require_once "../partials/header.php";?>
<?php require_once "../controllers/connection.php"; ?>
<section class="mp">
<div class="container table-hover">

  <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="text-dark">
    Add New Brand Here <i class="fas fa-angle-down"></i>
  </a>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
  	<form action="" method="POST">
  		<input type="text" class="form-control" id="brand" placeholder="Brand">

  		<button type="button" class="btn btn-success mt-2" id="btn_addBrand">Register</button>
  	</form>

  </div>
</div>



<form action="validate-add_item.php" method="POST" enctype="multipart/form-data">
	Choose Existing brand:

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
</section>


<?php require_once "../partials/footer.php";?>