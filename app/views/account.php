<?php require_once "../partials/header.php"; 
if(!isset($_SESSION['email'])){
    echo "<script type='text/javascript'> document.location = '../views/error404.php'; </script>";
  }
?>

<div class="section mp">
	<div class="container" id="upaccount">
		<h4>Account Details</h4>
			  		<?php 
			  		require_once "../controllers/connection.php";
			  		$id = $_SESSION['userid'];
			  		$sql = "SELECT * from tbl_account where id = '$id'";
			  		$result = mysqli_query($con,$sql);
			  		if(mysqli_num_rows($result) > 0){
			  			while ($row = mysqli_fetch_assoc($result)) {
			  				echo "<form action='' method='POST'>
			  				<div class='form-group'>
				  		<div class='row'>
					  		<div class='col-md-4'>
							    <label for='lname'>Last Name </label>
							    <em></em>
							    <input type='text' class='form-control' id='Updatelname' placeholder='Last Name' value='$row[lname]'>
							    
						    </div>
							<div class='col-md-4'>
							    <label for='fname'>First Name </label>
							    <input type='text' class='form-control' id='Updatefname' placeholder='First Name' value='$row[fname]'>
							    <span></span>
						    </div>
						    <div class='col-md-4'>
							    <label for='mname'>Middle Name </label>
							    <input type='text' class='form-control' id='Updatemname' placeholder='Middle Name' value='$row[mname]'>
						    </div>
				    	</div>
			 		 </div>

			  <div class='form-group'>
				  	<div class='row'>
				  		<div class='col-md-5'>
				  			<label for='gender'>Gender</label> <span id='Updateerr_gender'></span>

				  				<div class='row'>
								    <div class='col-md-4'>
										<div class='form-check'>
										  <input class='form-check-input' type='radio' name='Updategender' value='male'>
										  <label class='form-check-label' for='exampleRadios1'>
										  male
										  </label>
										</div>
									</div>
									<div class='col-md-4'>
										<div class='form-check'>
										  <input class='form-check-input' type='radio' name='Updategender' value='female'>
										  <label class='form-check-label' for='exampleRadios2'>
										    female
										  </label>
										</div>
									</div>
								</div>

					    </div>
					    <div class='col-md-1'></div>
						<div class='col-md-6'>
						    <label for='bday'>Birthday</label>
						    <span></span>
						    <input type='date' class='form-control' id='Updatebday' placeholder='00/00/0000' value='$row[bday]'>
						    <span></span>
					    </div>
				    </div>
			  </div>

			  <div class='form-group'>
			  	<div class='row'>
			  		<div class='col-md-12'>
				    <label for='contact'>Contact</label>
				    <span></span>
				    <input type='text' class='form-control' id='Updatecontact' value='$row[contact]'>
				    </input>
				    <span></span>
				    </div>
				</div>
			  </div>



			  <div class='form-group'>
			  	<div class='row'>
			  		<div class='col-md-12'>
				    <label for='address'>Address </label>
				    <span></span>
				    <textarea class='form-control' id='Updateaddress'>$row[address]</textarea>
				    <span></span>
				    </div>
				</div>
			  </div>

			  <div class='form-group'>
			  	<div class='row'>
			  		<div class='col-md-12'>
				    <label for='username'> Username</label>
				    <span></span>
				    <input type='email' class='form-control' id='Updateusername' placeholder='example@gmail.com' value='$row[username]'>
				    <span id='Updateresult'></span>
				    </div>
			    </div>
			  </div>
			  
			  <div class='row'>
			  	  <div class='col-md-12'>
				  <button type='button' class='btn btn-success' id='btn_updateAccount'>Update</button>
				  </div>
			  </div>
			</form>";
			  			}
			  		}

					?>
					

	</div>
</div>




<?php require_once "../partials/footer.php"; ?>