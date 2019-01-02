<?php
	require_once '../partials/header.php';
?>
<div class="parent-class" id="langind-page">
</div>



<div class="container-fluid">
	<div class="row">
	<?php 
		require_once "../controllers/connection.php";


		$sql = "SELECT * from tbl_products ORDER BY id DESC LIMIT 4";

		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_assoc($result)) {
				echo "<div class='col-md-3'>
				<img src='$row[image_path]' class='img-fluid'> 
				<span class='badge badge-danger'>Hot</span>
				<p class='text-center'><strong>New Arrivals</strong></p>
				</div>";
			}
		}

	?>
	</div>
</div>

<div class="container-fluid">
	<div class="row mt-2">
		<div class="col-md-6 col-sm-6 mt-2">
			<a href="home.php"><img src="../assets/images/brand/AGV.jpg" class="img-fluid"></a>
		</div>
		<div class="col-md-6 col-sm-5 mt-2">
			<a href="home.php"><img src="../assets/images/brand/Shark.jpg" class="img-fluid"></a>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-6 col-sm-6 mt-2">
			<a href="home.php"><img src="../assets/images/brand/Spyder.jpg" class="img-fluid"></a>
		</div>
		<div class="col-md-6 col-sm-6 mt-2">
			<a href="home.php"><img src="../assets/images/brand/HJC.jpg" class="img-fluid"></a>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-12 col-sm-12 mt-2">
			<a href="home.php"><img src="../assets/images/brand/KYT.jpg" class="img-fluid"></a>
		</div>
	</div>
</div>





<?php 
	require_once '../partials/footer.php';
?>
