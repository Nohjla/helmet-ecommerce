<?php require_once "../partials/header.php"; ?>

<section class="mp">

	<div class="container">
	<h2>Welcome to Dashboard</h2>

	<div class="row">
		<div class="col-md-3">
		<button type="button" class="btn btn-primary btn-lg"><i class="far fa-images"></i></button><span> Edit Banner</span>
		</div>
		<div class="col-md-3">
		<a href="../controllers/aed-product.php"><button type="button" class="btn btn-primary btn-lg"><i class="fas fa-truck-loading"></i></button></a><span> Edit Product</span>
		
		</div>
		<div class="col-md-3">
		<button type="button" class="btn btn-primary btn-lg"><i class="fas fa-user-alt"></i></button><span> Edit Account</span>
		</div>
		<div class="col-md-3">
		<button type="button" class="btn btn-primary btn-lg"><i class="fab fa-creative-commons-share"></i></button><span> Reports</span>
		</div>
	</div>
	</div>
</section>
<?php require_once "../partials/footer.php"; ?>