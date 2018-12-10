<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$db_name = "db_helmets";

	$con = mysqli_connect($host,$user,$password,$db_name);

	if(!$con){
		echo "Connection failed".mysqli_connect_error();
	}


?>