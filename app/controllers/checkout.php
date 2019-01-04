<?php
	require_once "../partials/header.php";
?>
<?php

  require_once "connection.php";
  if(!isset($_SESSION['email'])){
    echo "<script type='text/javascript'> document.location = '../views/register.php'; </script>";
  }


?>

  <div class="container admin">
    <form method="POST" action="order_confirmation.php">
        <div class="row mb-5">
          <div class="col-md-8">
              <h5>Shipping Area</h5>
              <div class="input-group">
                <?php 
                  $email = $_SESSION['email'];
                 $sqlshp = "SELECT address from tbl_account where username = '$email'";
                 $resultshp = mysqli_query($con,$sqlshp);
                 if (mysqli_num_rows($resultshp) > 0) {
                    while ($rowshp = mysqli_fetch_assoc($resultshp)) {
                      echo "<textarea class='form-control' aria-label='With textarea' name='shipping_adress' id='shipping_add'>$rowshp[address]</textarea>";
                    }
                 }
                ?>
                
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
              <button type="submit" class="btn btn-warning" >Place Order</button>
          </div>
        </div>
    </form>
  </div>

<?php
	require_once "../partials/footer.php";
?>