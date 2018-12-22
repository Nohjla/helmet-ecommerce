<?php 
	require_once "connection.php";

	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$gender = $_POST['gender'];
	$bday = $_POST['bday'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	$date_c = date('Y-m-d');

	$fsql = "SELECT * FROM tbl_account where username = '$username'";
	$fresult = mysqli_query($con,$fsql);

	if(mysqli_num_rows($fresult) > 0)
	{
		echo "Email already Exists";
	}
	else{

	$sql = "INSERT tbl_account(fname,mname,lname,gender,address,contact,date_created,bday,username,password)VALUES('$fname','$mname','$lname','$gender','$address','$contact','$date_c','$bday','$username','$password')";
	$result = mysqli_query($con,$sql);

	if(!$result){
		echo "there is something wrong";
		// header("Location:../views/index.php");
	}
	else{
		echo "Account Created";
	}
	}
?>