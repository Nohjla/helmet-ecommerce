<?php
	session_start();


	$itemId = $_POST['itemId'];
	unset($_SESSION['cart'][$itemId]);
	$_SESSION["item_count"] = array_sum($_SESSION["cart"]);

	echo "<span>".$_SESSION["item_count"]."</span>";

?>