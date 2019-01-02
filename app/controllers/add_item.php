<?php require_once "../partials/header.php";?>
<?php require_once "../controllers/connection.php"; ?>
<section class="mp">
<div class="container table-hover">

  <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Add New Brand

  </a>
  <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
    Add New Brand
  </a>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    <form >
    	<div class="form-group">
		  <div class="container">
		    <label for="contact">* Contact</label>
		    <span></span>
		    <input type="text" class="form-control" id="contact">
		    </input>
		    <span></span>
		  </div>
	  	</div>

    	<button type="button" class="btn btn-success" id="btn_addItem">Register</button>
    </form>
  </div>
</div>
<div class="collapse" id="collapseExample1">
  <div class="card card-body">
    <form >
    	b
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