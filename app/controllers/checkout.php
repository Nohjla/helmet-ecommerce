<?php
	require_once "../partials/header.php";
?>
<?php
  
  require_once "connection.php";
  if(!isset($_SESSION['email'])){
    echo "<script type='text/javascript'> document.location = '../views/register.php'; </script>";
  }
  $userid = $_SESSION['userid'];
  $date = date('j'."/".'m'."/".'o');
  $dateshuffle = date('j'.'m'.'o');
  $transaction_code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuuvwxxyz0123456789"),0,18) . $dateshuffle;

  // echo $userid."<br>";
  // echo $date."<br>";
  // echo $transaction_code."<br>";
?>

  <div class="container admin">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row mb-5">
          <div class="col-md-8">
              <h5>Shipping Area</h5>
              <div class="input-group">
                <textarea class="form-control" aria-label="With textarea" name="shipping_adress"></textarea>
              </div>
          </div>
          <div class="col-md-4">
              <h5>Payment Mode:</h5>
              <div class="input-group">
                <select class="custom-select" id="inputGroupSelect01" name="payment_mode">
                  <option selected value="no-input">Choose...</option>
                  <?php
                    $paymentquery = "SELECT * FROM tbl_payment_mode";
                    $results2 = mysqli_query($con,$paymentquery);
                    if(mysqli_num_rows($results2)>0){
                      while($row = mysqli_fetch_assoc($results2)){
                        echo "<option value='$row[id]'>$row[name]</option>";
                      }
                    }
                  ?>
                </select>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <h4>Check Out Items</h4>
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Product Name</th>
                      <th scope="col">Brand Name</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Price</th>
                      <th scope="col">Sub-total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      if(isset($_SESSION['cart']))
                    {

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
                                            echo "<tr>";
                                            echo "<td>";
                                            echo $row['name'];
                                            echo "</td>";
                                            echo "<td>";
                                            $sql2 = "SELECT * FROM tbl_categories where id = '$row[categories_id]' ";
                                            $result2 = mysqli_query($con, $sql2);
                                            if(mysqli_num_rows($result2) > 0){
                                              while($row2 = mysqli_fetch_assoc($result2)){
                                                echo $row2["name"];
                                              }
                                            }
                                            echo "</td>";
                                            echo "<td>";
                                            echo $quantity;
                                            echo "</td>";
                                            echo "<td>";
                                            echo $price;
                                            echo "</td>";
                                            echo "<td>";
                                            echo $subTotal;
                                            echo "</td>";
                                            echo "</tr>";

                                         }

                                     }
                      }


                    }

                    $shipping_adress = $_POST['shipping_adress'];
                    $payment_mode = $_POST['payment_mode'];
                    $sql_orders = "INSERT INTO tbl_orders(user_id,transaction_code,purchase_date,status_id,payment_mode_id,shipping_address) 
                    VALUES('$userid','$transaction_code','$date','1','$payment_mode','$shipping_adress')";

                    $result_orders = mysqli_query($con,$sql_orders);
                    
                    if ($result_orders) {
                      $last_order = mysqli_insert_id($con);
                      foreach($_SESSION['cart'] as $id => $quantity) {
                        $sql_cart = "SELECT * FROM tbl_products where id ='$id'";
                        $result_cart = mysqli_query($con,$sql_cart);
                        if (mysqli_num_rows($result_cart)>0) {
                            while ($crow = mysqli_fetch_assoc($result_cart)) {
                              // echo $last_order."<br>";
                              // echo $id."<br>";
                              // echo $quantity."<br>";
                              $price = $crow['price'];
                              $sql_order_items = "INSERT INTO tbl_order_items(orders_id,products_id,quantity,price) 
                              VALUES('$last_order','$id ','$quantity','$price')";
                              mysqli_query($con,$sql_order_items);
                            }
                        }
                      }
                      $_SESSION['cart'] = array();
                    }
                    unset($_SESSION['item_count']);
                    ?>                
              </tbody>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col">Grand Total:</th>
              <th scope="col"><?php echo $grand_total;?></th>
            </table>
          </div> <!-- end of col-md-8 -->
        </div>
        <div class="row">
          <div class="col-6"></div>
          <div class="col-3">
              <button type="submit" class="btn btn-warning">Place Order</button>
          </div>
        </div>
    </form>
  </div>

<?php
	require_once "../partials/footer.php";
?>