<?php
require_once "connection.php";
session_start();
$id = $_SESSION['userid'];
$npass = sha1($_POST['npass']);
		if(isset($_POST['npass'])){
			$sql = "UPDATE tbl_account set password='$npass' where id = '$id' ";
			$result = mysqli_query($con,$sql);
			if($result){
			echo "Successfully Changed";
			}
		}
		else{
			echo "Something went wrong";
		}
?>