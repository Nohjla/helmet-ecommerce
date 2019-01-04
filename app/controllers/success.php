<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="icon" type="image/png/gif" href="../assets/images/logo/logo1.png">

    <title>Helms</title>
</head>
<body>
<?php

session_start();
require_once "connection.php";

$id = $_GET['paymentId'];
$email = $_SESSION['email'];
$date = date('j'."/".'m'."/".'o');
$transaction_code = $_SESSION['trans_code'];
$order_id = $_SESSION['order_item_id'];
if(isset($_SESSION['trans_code'])){
	$sql = "UPDATE tbl_orders set payment = '$id' where id = '$order_id'";

	echo "<section class='mp ml-2'>
      <div class='container'>

      <div class='row'>
      <i class='far fa-check-circle fa-7x text-success'></i>
      <h4>Transaction successfully completed.</h4>
      </div>

      <div class='row'>
      <p><strong>Transaction Code: </strong>$transaction_code</p>
      </div>

      <div class='row'>
      <p><strong>Payment ID: </strong>$id</p>
      </div>

      <div class='row'>
      <p><strong>Date of transaction: </strong>$date</p>
      </div>

      <div class='row'>
      <p><strong>Transaction sent to email: </strong>$email</p>
      </div>

      <div class='row'>
      <p><strong>Mode of payment: </strong>Paypal</p>
      </div>

      <div class='row'>
      <p><a href='../views/home.php'>Continue shopping.....</a></p>
      </div>

      </div>
      </section>";

	$result = mysqli_query($con,$sql);
	if($result){
		unset($_SESSION['trans_code']);
	}
}


require_once "../partials/footer.php";
?>