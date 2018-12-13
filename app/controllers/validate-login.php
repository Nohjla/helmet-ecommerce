<?php 
	session_start();
	require_once 'connection.php';
	//Get values from login form
	$email = $_POST['email'];
	$password = sha1($_POST['password']);

	// Check if we are getting the correct values
	// echo $email. " - " .$password;

	$sql = "SELECT * FROM tbl_account WHERE username = '$email' && password = '$password'";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
			// echo $row['lname'];
			// echo "<br>";
			// echo $row['fname'];
			$_SESSION['userid'] = $row['id'];
			$_SESSION['email'] = $row['username'];
			$_SESSION['lastname'] = $row['lname'];
			$_SESSION['firstname'] = $row['fname'];
		}
		header("Location: ../views/home.php");
	}
	else{
		header("Location: ../views/register.php");
	}


?>