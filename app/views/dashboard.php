<?php require_once "../partials/header.php"; ?>

<section class="mp">

	<div class="container">
	<h2>Welcome to Dashboard</h2>

	<div class="row">
		<div class="col-md-3">
		<button type="button" class="btn btn-primary btn-lg"><i class="far fa-images fa-2x"></i></button><span> Banner</span>
		</div>
		<div class="col-md-3">
		<a href="../controllers/aed-product.php"><button type="button" class="btn btn-primary btn-lg"><i class="fas fa-truck-loading fa-2x"></i></button></a><span> Product</span>
		
		</div>
		<div class="col-md-3">
		<button type="button" class="btn btn-primary btn-lg"><i class="fas fa-user-alt fa-2x"></i></button><span> Account</span>
		</div>
		<div class="col-md-3">
		<button type="button" class="btn btn-primary btn-lg"><i class="fab fa-creative-commons-share fa-2x"></i></button><span> Reports</span>
		</div>
	</div>
	</div>
</section>
<?php require_once "../partials/footer.php"; ?>