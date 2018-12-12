<?php
	require_once "../partials/header.php";
?>
<?php
  if(!isset($_SESSION['email'])){
    header("Location: ../views/register.php");
  }
?>
<div class="container">
<h1>Checkout Page</h1>
<hr>
<h3>Order Summary: P 8,000</h3>
  <table>
    <thead>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Sub-Total</th>
      </tr>
    </thead>
    <tbody>
                            <tr>
                              <td>Product 1</td>
                              <td id="price1"> 2000.00</td>
                              <td>1</td>
                              <td class="sub-total" id="subTotal1">2000</td>
                          </tr>
                          <tr>
                              <td>Product 2</td>
                              <td id="price2"> 1000.00</td>
                              <td>1</td>
                              <td class="sub-total" id="subTotal2">1000</td>
                          </tr>
                          <tr>
                              <td>Product 3</td>
                              <td id="price3"> 5000.00</td>
                              <td>1</td>
                              <td class="sub-total" id="subTotal3">5000</td>
                          </tr></tbody></table>

<hr>
<h3>Shipping Address: <input type="text" value="this is where the shipping address goes" size="50"></h3>
<hr>
<hr>
<h3>Payment Method:
<select>
  <option>COD</option>
  <option>PayPal</option>
</select>
</h3>
<hr>
<button>Place Order Now</button>
</div>
<?php
	require_once "../partials/footer.php";
?>