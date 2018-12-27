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
$data ="<table class='table table-hover'>
           <thead>
             <tr>
               <th scope'col'>Product</th>
               <th scope='col'>Price</th>
               <th scope='col'>Quantity</th>
               <th scope='col'>Sub-total</th>
             </tr>
           </thead>
           <tbody>";

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
                         "<tr>
                             <td><img src='$row[image_path]' width='25%' height='25%'></td>
                             <td id='price$id'> $price</td>
                             <td>
                             <input type='number' onkeypress='return event.charCode >= 48 && event.charCode <= 57' class ='form-control' value = '$quantity' id='quantity$id'  min='1' size='5' onchange='changeNoItems($id)'>
                             </td>
                             <td class='sub-total' id='subTotal$id'>$subTotal</td>
                             <td><button class='btn btn-danger' onclick='deleteItem($id)' >Remove</button></td>
                         </tr>";
                   }
               }
}

$data .="</tbody></table>
             <h3 align='right'>Total: &#x20B1; <span id='grandTotal'>$grand_total </span><br><a href='../controllers/checkout.php'><button class='btn btn-success'>Check Out</button></a></h3>";
}
else
{
  $data ="<h3 class='text-warning'>Cart is empty <i class='fas fa-cart-plus'></i></h3>
          <img src='../assets/images/admin/tenor.gif'>";
}
echo $data;
?>
