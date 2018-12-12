<?php require_once '../partials/header.php';
?>

<div class="container" style="margin-top: 50px;">
<p class="text-danger"><em>If you don't have account please fill up all required(*) information in this form to register.</em></p>

	<form action="" method="POST">
	  <div class="form-group">
	  	<div class="container-fluid">
		  	<div class="row">
		  		<div class="col-md-4">
				    <label for="lname">* Last Name </label>
				    <em></em>
				    <input type="text" class="form-control" id="lname" placeholder="Last Name">
				    
			    </div>
				<div class="col-md-4">
				    <label for="fname">* First Name </label>
				    <input type="text" class="form-control" id="fname" placeholder="First Name">
				    <span></span>
			    </div>
			    <div class="col-md-4">
				    <label for="mname">Middle Name </label>
				    <input type="text" class="form-control" id="mname" placeholder="Middle Name">
			    </div>
		    </div>
	    </div>
	  </div>

	  <div class="form-group">
	  	<div class="container-fluid">
		  	<div class="row">
		  		<div class="col-md-5">
		  			<label for="gender">* Gender</label> <span id="err_gender"></span>

		  				<div class="row">
						    <div class="col-md-4">
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="gender" value="male">
								  <label class="form-check-label" for="exampleRadios1">
								  male
								  </label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="gender" value="female">
								  <label class="form-check-label" for="exampleRadios2">
								    female
								  </label>
								</div>
							</div>
						</div>

			    </div>
			    <div class="col-md-1"></div>
				<div class="col-md-6">
				    <label for="bday">* Birthday</label>
				    <span></span>
				    <input type="date" class="form-control" id="bday" placeholder="00/00/0000">
				    <span></span>
			    </div>
		    </div>
	    </div>
	  </div>

	  <div class="form-group">
		  <div class="container">
		    <label for="contact">* Contact</label>
		    <span></span>
		    <input type="text" class="form-control" id="contact">
		    </input>
		    <span></span>
		  </div>
	  </div>



	  <div class="form-group">
	  	<div class="container">
		    <label for="address">* Address</label>
		    <span></span>
		    <textarea class="form-control" id="address"></textarea>
		    <span></span>
		</div>
	  </div>

	  <div class="form-group">
	  	<div class="container">
		    <label for="delivery_address">* Delivery Address</label>
		    <span></span>
		    <textarea class="form-control" id="delivery_address"></textarea>
		    <span></span>
	    </div>
	  </div>

	  <div class="form-group">
	  	<div class="container">
		    <label for="username">* Username</label>
		    <span></span>
		    <input type="email" class="form-control" id="username" placeholder="example@gmail.com">
		    <span id="result"></span>
	    </div>
	  </div>

	  <div class="form-group">
	  	<div class="container">
		    <label for="password">* Password</label>
		    <span></span>
		    <input type="password" class="form-control" id="password" placeholder="Password">
		    <span></span>
	    </div>
	  </div>

	  <div class="form-group">
	  	<div class="container">
		    <label for="cpassword">* Confirm Password</label>
		    <span></span>
		    <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password">
		    <span></span>
	    </div>
	  </div>
	  
	  <div class="container">
		  <button type="button" class="btn btn-success" id="btn_register">Register</button>
	  </div>
	</form>

</div>


<?php 
	require_once '../partials/footer.php';
?>