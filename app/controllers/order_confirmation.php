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
if(!isset($_SESSION['email'])){
  echo "<script type='text/javascript'> document.location = '../views/error404.php'; </script>";
}
require_once "connection.php";
  require "../../vendor/autoload.php";
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
  require "../../vendor/phpmailer/phpmailer/src/PHPMailer.php";
  require "../../vendor/phpmailer/phpmailer/src/Exception.php";

$userid = $_SESSION['userid'];
$date = date('o'."-".'m'."-".'d');
$dateshuffle = date('j'.'m'.'o');
$transaction_code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuuvwxxyz0123456789"),0,18) . $dateshuffle;


$shipping_adress = $_POST['shipping_adress'];
$payment_mode = $_POST['payment_mode'];

$apiContext = new \PayPal\Rest\ApiContext(
  new \PayPal\Auth\OAuthTokenCredential(
    'ATlz2wTIFk6S5G8wtVGqgOhIW5h8YiLNvIFDofcTswl5t7CQ_nyeVrMyLSMRg3jsC_5juJbfPUDxLT3P',
    'EJdDYitYYuNt5cRCRmWLKhX2WiqyfKMJddg_fTFET7i4WhEkMcg7Rr_gq1be38LjNDCSMS4JF-L9aqM0'
  )
);
$payer = new Payer();
$payer->setPaymentMethod('paypal');

//Create array to contain indiviadual items
$items = []; //on loop: $items += [];
$grand_total = 0;

if($payment_mode == 2)
{
$_SESSION['trans_code'] = $transaction_code;
$sql_orders = "INSERT INTO tbl_orders(user_id,transaction_code,purchase_date,status_id,payment_mode_id,payment,shipping_address) 
VALUES('$userid','$transaction_code','$date','1','$payment_mode','none','$shipping_adress')";
$result_orders = mysqli_query($con,$sql_orders);
                    
                    if ($result_orders) {
                      $last_order = mysqli_insert_id($con);
                      $_SESSION['order_item_id'] = $last_order;
                      foreach($_SESSION['cart'] as $id => $quantity) {
                        $sql_cart = "SELECT * FROM tbl_products where id ='$id'";
                        $result_cart = mysqli_query($con,$sql_cart);
                        if (mysqli_num_rows($result_cart)>0) {
                            while ($crow = mysqli_fetch_assoc($result_cart)) {
                              $name = $crow["name"];
                              $price = $crow['price'];
                              $subTotal = $quantity * $price;
                              $grand_total += $subTotal;
$indiv_item = new Item();
$indiv_item ->setName($name)
      ->setCurrency("PHP")
      ->setQuantity($quantity)
      ->setPrice($price); //per item
$items[] = $indiv_item;
                              $sql_order_items = "INSERT INTO tbl_order_items(orders_id,products_id,quantity,price) 
                              VALUES('$last_order','$id ','$quantity','$price')";
                              mysqli_query($con,$sql_order_items);
                              
                            }
                        }
                      }
     }
$item_list  = new ItemList();
$item_list  ->setItems($items);

$amount = new Amount();
$amount ->setCurrency("PHP")
    	->setTotal($grand_total); //grand total

//Create transaction
$transaction = new Transaction();
$transaction ->setAmount($amount)
       ->setItemList($item_list)
       ->setDescription("Transaction from your shop")
       ->setInvoiceNumber(uniqid("demoStoreNew-"));  
                    
$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$staff_email = "theracquetscience@gmail.com"; // where the email is comming from
$users_email =  $_SESSION['email']; //Where the email will go
$email_subject = "Your transaction code : $transaction_code";
$email_body = "
		<h1>Thank you for shopping!</h1>

		<p>Your order will be delivered in 3-4 days after confirmation</p>

		<small>Transaction reference:$transaction_code</small>
		<br>
		<small>Transaction date:$date</small>
		<br>
		<small>Grand Total: &#x20B1; $grand_total.00</small>
		<br>

		<p><strong>Order Support Team</strong></p>


	";

try{
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = $staff_email;
$mail->Password = "Orders1120";
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->setFrom($staff_email,"Order Support");
$mail->addAddress($users_email);
$mail->isHTML(true);
$mail->Subject = $email_subject;
$mail->Body = $email_body;
$mail->send();

}catch(Exception $e){
echo "message sending failed!".$mail->ErrorInfo;
}

//where to go after\
$redirectUrls = new RedirectUrls();
$redirectUrls
  //Create successful file
  ->setReturnUrl('https://localhost/helmet-ecommerce/app/controllers/success.php')
  //Create unsuccessful file
  ->setCancelUrl('https://localhost/helmet-ecommerce/app/controllers/failed.php');

$payment = new Payment();
$payment ->setIntent("sale")
     ->setPayer($payer)
     ->setRedirectUrls($redirectUrls)
     ->setTransactions([$transaction]);

try{
  $payment->create($apiContext);
}catch(Exception $e){
  die($e->getData());
}

$approvalUrl = $payment->getApprovalLink();
header('location: '.$approvalUrl);
unset($_SESSION['item_count'],$_SESSION['cart']); 
}
elseif($payment_mode == 1)
{
$_SESSION['trans_code'] = $transaction_code;
$sql_orders = "INSERT INTO tbl_orders(user_id,transaction_code,purchase_date,status_id,payment_mode_id,payment,shipping_address) 
VALUES('$userid','$transaction_code','$date','1','$payment_mode','cash','$shipping_adress')";

$result_orders = mysqli_query($con,$sql_orders);
                    
                    if ($result_orders) {
                      $last_order = mysqli_insert_id($con);
                      foreach($_SESSION['cart'] as $id => $quantity) {
                        $sql_cart = "SELECT * FROM tbl_products where id ='$id'";
                        $result_cart = mysqli_query($con,$sql_cart);
                        if (mysqli_num_rows($result_cart)>0) {
                            while ($crow = mysqli_fetch_assoc($result_cart)) {
                              $name = $crow["name"];
                              $price = $crow['price'];
                              $subTotal = $quantity * $price;
                              $grand_total += $subTotal;
                              $sql_order_items = "INSERT INTO tbl_order_items(orders_id,products_id,quantity,price) 
                              VALUES('$last_order','$id ','$quantity','$price')";
                              mysqli_query($con,$sql_order_items);
                            }
                        }
                      }
                    }

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$staff_email = "theracquetscience@gmail.com"; // where the email is comming from
$users_email =  $_SESSION['email']; //Where the email will go
$email_subject = "Your transaction code : $transaction_code";
$email_body = "
		<h1>Thank you for shopping!</h1>

		<p>Your order will be delivered in 3-4 days after confirmation</p>

		<small>Transaction reference:$transaction_code</small>
		<br>
		<small>Transaction date:$date</small>
		<br>
		<small>Grand Total: &#x20B1; $grand_total.00</small>
		<br>

		<p><strong>Order Support Team</strong></p>


	";

try{
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = $staff_email;
$mail->Password = "Orders1120";
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->setFrom($staff_email,"Order Support");
$mail->addAddress($users_email);
$mail->isHTML(true);
$mail->Subject = $email_subject;
$mail->Body = $email_body;
$mail->send();

}catch(Exception $e){
}
unset($_SESSION['item_count'],$_SESSION['cart']);
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
      <p><strong>Date of transaction: </strong>$date</p>
      </div>

      <div class='row'>
      <p><strong>Transaction sent to email: </strong>$_SESSION[email]</p>
      </div>

      <div class='row'>
      <p><strong>Mode of payment: </strong>Cash on delivery</p>
      </div>

      <div class='row'>
      <p><a href='../views/home.php'>Continue shopping...</a></p>
      </div>

      </div>
      </section>";
}
else{
  echo "<script>alert('Please choose mode of payment!')</script>";
  echo "<script type='text/javascript'> document.location = '../controllers/checkout.php'; </script>";
}


require_once"../partials/footer.php";
?>