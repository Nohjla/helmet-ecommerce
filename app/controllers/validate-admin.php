<?php 
session_start();
require_once "connection.php";

$admin_user = $_POST['admin_user'];
$admin_pass = sha1($_POST['admin_password']);

$sql = "SELECT * from tbl_admin WHERE admin_username = '$admin_user' && admin_password = '$admin_pass' ";

$result = mysqli_query($con,$sql);

if ($result) {
	$_SESSION["admin"] = "admin";
	header('Location: ../views/dashboard.php');
}
else{
	header('Location:../views/admin.php');
}

?>