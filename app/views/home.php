<?php
	require_once '../partials/header.php';
?>




<section id="cmt">
<div class="container">
	<div class="row">
		<div class="col-md-2">
			<h1 id ="nowCategories">Helmets</h1>
				<div class="row text">
					<div class ='list-group w-100 text-center'>
				      <?php require_once '../controllers/connection.php';
				      	$sql = "SELECT * FROM tbl_product";
				      	$result = mysqli_query($con, $sql);	

				      	if(mysqli_num_rows($result)>0){
				      		while ($row = mysqli_fetch_assoc($result)){
				            echo "<a href='#nowCategories' class = 'list-group-item' onclick='showCategories($row[id])'>$row[brandname]</a>";			                   
				      		}
				      	}
				      ?>
				      </div>
			     </div>
		</div>

		<div class="col-md-10" id="products">
			<div class="container-fluid">
				<div class="row">
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
					<div class="col-md-12">
					<?php
						require_once '../controllers/connection.php';

						$sql = "SELECT * FROM tbl_product"; 

						$result = mysqli_query($con, $sql);

						echo "<div class='row'>";
						if(mysqli_num_rows($result) > 0){
						    while($row = mysqli_fetch_assoc($result)) {
						      // Rettieve products from the items table
						      echo " <div class='col-md-4 mb-3'>
						                    <div class='card h-100'>
						                       <img src='$row[image_path]'>
						                          <div class='card-body'>
						                            <h4 class='card-title'><a href='product.php?id=$row[id]'>$row[name]</a></h4>
						                            <h5 class='price'>₱ $row[price]</h5>
						                            <input type='number' class ='form-control mb-3' min='1' value='1' id='quantity$row[id]' onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
						                          <button class='btn btn-block btn-primary' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-plus'></i> Add to Cart</button>
						                          </div>
						                    </div>
						                  </div>";
						    }
						}
						echo '</div>';

					?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>

<?php
	require_once '../partials/footer.php';
?>