<?php 
	session_start();
	require_once "connection.php";
	$id = $_SESSION['userid'];
	$user = $_SESSION['email'];

	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$gender = $_POST['gender'];
	$bday = $_POST['bday'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$username = $_POST['username'];

	if($user == $username){
		
		$sql2 = "UPDATE tbl_account set fname ='$fname',mname ='$mname',lname ='$lname',gender ='$gender',address ='$address',contact = '$contact',bday ='$bday',username ='$username' where id = '$id'";
		$result2 = mysqli_query($con,$sql2);

		if(!$result2){
			echo "there is something wrong";
		}
		else{
			echo "Successfully changed";
		}
	}
	else{
		$fsql = "SELECT * FROM tbl_account where username = '$username'";
		$fresult = mysqli_query($con,$fsql);

		if(mysqli_num_rows($fresult) > 0)
		{
			echo "Email already Exists";
		}
		else{

		$sql2 = "UPDATE tbl_account set fname ='$fname',mname ='$mname',lname ='$lname',gender ='$gender',address ='$address',contact = '$contact',bday ='$bday',username ='$username' where id = '$id'";
		$result2 = mysqli_query($con,$sql2);

		if(!$result2){
			echo "there is something wrong";
		}
		else{
			echo "Successfully changed";
		}
		}
	}
	
	
?>