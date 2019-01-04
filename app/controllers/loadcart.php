<?php
require_once 'connection.php';



session_start();
$grand_total = 0;
if(!isset($_SESSION["cart"])){
  $count = 0;
}
else
{
  $count = array_sum($_SESSION["cart"]);
}

if($count != 0)
{
$data ="<div class='container'>
        <h3>MY CART <i class='fas fa-shopping-cart'></i></h3>";

foreach($_SESSION['cart'] as $id=> $quantity) {
   $sql = "SELECT * FROM tbl_products where id = '$id' ";
             $result = mysqli_query($con, $sql);

               if(mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_assoc($result)){
                     $name = $row["name"];
                     $description = $row["produc_description"];
                     $price = $row["price"];

                       //For computing the sub total and grand total
                       $subTotal = $quantity * $price;
                       $grand_total += $subTotal;

                       $data .=
                         "<hr>
                         <div class='row'>
                            <div class='col-md-3'>
                                <img src='$row[image_path]' class='img-fluid'>
                               <div class='row mt-2 ml-2'>
                                  <a href='#' class='ml-3 mr-3' onclick='deleteItem($id)' ><i class='fas fa-trash-alt text-danger'> Remove</i></a>
                               </div>
                            </div>
                            <div class='col-md-3 mt-3'>
                                   <h5>$row[name]</h5>
                                  <span>$row[produc_description]</span>
                            </div>
                            <div class='col-md-3 mt-3'>
                              <div class='row'>
                                <div class='col-md-6'>
                                    <strong>
                                   <span>&#8369</span>
                                    <span id='price$id'> $price</span>
                                    </strong>
                                </div>
                                <div class='col-md-6'>
                                    <input type='number' onkeypress='return event.charCode >= 48 && event.charCode <= 57' class ='form-control' value = '$quantity' id='quantity$id'  min='1' size='5' onchange='changeNoItems($id)'>
                                </div>
                              </div>
                            </div>

                             <div class='col-md-3 mt-3'>
                             <strong>
                             <span>&#8369</span>
                             <span class='sub-total' id='subTotal$id'>$subTotal</span>
                             </strong>
                             </div>
                         </div>";
                   }
               }
}

$data .="   <hr>
             <h3 align='right'>Total: &#x20B1; <span id='grandTotal'>$grand_total </span><br><a href='../controllers/checkout.php'><button class='btn btn-success'>Check Out</button></a></h3></div>";
}
else
{
  $data ="<h3 class='text-warning'>Cart is empty <i class='fas fa-cart-plus'></i></h3>
          <img src='../assets/images/admin/tenor.gif'>";
}
echo $data;
?>
