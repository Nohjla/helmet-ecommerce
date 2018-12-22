<?php require_once "../partials/header.php";?>


<div class="container admin">

	<form action="../controllers/validate-admin.php" method="POST">
		<h4>Admin Portal</h4>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Username</label>
	    <input type="email" name="admin_user" class="form-control" aria-describedby="emailHelp" placeholder="Enter username">
	    <small id="emailHelp" class="form-text text-muted">Never share your account with anyone else.</small>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" name="admin_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

<?php require_once "../partials/footer.php";?>