<?php
	require_once '../partials/header.php';
?>




<section id="cmt">
<div class="container">
	<div class="row mb-2">
		<div class="col-md-8"></div>
		<div class="col-md-4">
			<label class="sr-only" for="inlineFormInputGroup">Search</label>
		    <div class="input-group mb-2">
		    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" onchange="findCategories(value)">
			    <div class="input-group-prepend">
			    	<div class="input-group-text"><i class="fas fa-search"></i></div>
			    </div>
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 mb-2">
			<h1 id ="nowCategories">Helmets</h1>
				<div class="row text">
					<div class ='list-group w-100 text-center'>
				      <?php require_once '../controllers/connection.php';
				      	$sql = "SELECT * FROM tbl_categories";
				      	$result = mysqli_query($con, $sql);	
				      	if(mysqli_num_rows($result)>0){
				      		while ($row = mysqli_fetch_assoc($result)){
				            echo "<a href='#nowCategories' class = 'list-group-item' onclick='showCategories($row[id])'>$row[name]</a>";			                   
				      		}
				      	}
				      ?>
				      </div>
			     </div>
		</div>

		<div class="col-md-10">
			<div class="container-fluid">
				<div class="row" id="products">
					<!-- <div class="col-md-12" > -->
					<?php
						require_once '../controllers/connection.php';

						$sql = "SELECT * FROM tbl_products"; 

						$result = mysqli_query($con, $sql);

						echo "<div class='row'>";
						if(mysqli_num_rows($result) > 0){
						    while($row = mysqli_fetch_assoc($result)) {
						      // Rettieve products from the items table
						      echo " <div class='col-md-3 mb-3'>
						      				
						                    <div class='card h-100'>
						                       		<img src='$row[image_path]' class='img-fluid'>
						                          <div class='card-body'>
						                          	<div class='row'>
						                            <h6 class='card-title'><a href='product.php?id=$row[id]'>$row[name]</a></h6>
						                            </div>
						                            <div class='row'>
						                            <h5 class='price'>₱ $row[price]</h5>
						                            </div>
						                            <div class='row ml-1'>
						                            <div class='input-group'>
						                            <input type='button' value='-'' class='button-minus' data-field='quantity'>
  													<input type='number' step='1' max='10' value='1' name='quantity' class='quantity-field' id='quantity$row[id]' onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
  													<input type='button' value='+' class='button-plus' data-field='quantity'>
  													</div>
						                            
						                            </div>
						                          <a href='#' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-plus'></i> Add to Cart</a>
						                          <div class='row ml-1 mt-2'>
							                          <i class='far fa-star'></i>
							                          <i class='far fa-star'></i>
							                          <i class='far fa-star'></i>
							                          <i class='far fa-star'></i>
							                          <i class='far fa-star'></i>
						                          </div>
						                          </div>
						                    </div>
						                  </div>";
						    }
						}
						echo '</div>';

					?>
<!-- 					</div> -->
				</div>
			</div>
		</div>
	</div>
	</div>
</section>

<?php
	require_once '../partials/footer.php';
?>