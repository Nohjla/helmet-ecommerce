<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="icon" type="image/png/gif" href="../assets/images/logo/logo1.png">

    <title>Helms</title>
</head>
<body>
  <?php session_start(); error_reporting(0);?>

      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php  if(isset($_SESSION["admin"])){
          echo "<a class='navbar-brand' href='../views/dashboard.php'><i class='fas fa-home' style='color:white;'> Dashboard</i></a>";
        }
         else{     
        ?>

        <a class="navbar-brand" href="../views/index.php"><i class="fas fa-home" style="color:white;"></i></a>
        <?php }?>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-5">

          <?php  if(isset($_SESSION["admin"])){

              echo "<li class='nav-item pr-3'>
                    <a class='nav-link' href='#'><i class='fab fa-product-hunt'></i> Banner</a>
                    </li>
                    <li class='nav-item pr-3'>
                    <a class='nav-link' href='../controllers/aed-product.php'><i class='fab fa-product-hunt'></i> Product</a>
                    </li>
                    <li class='nav-item pr-3'>
                    <a class='nav-link' href='#'><i class='fab fa-product-hunt'></i> Account</a>
                    </li>
                    <li class='nav-item pr-3'>
                    <a class='nav-link' href='../controllers/logout.php'><i class='fas fa-hiking'></i> Log Out</a>
                    </li>
                    ";

            }
            else{
            ?>
            <li class="nav-item pr-3">
              <a class="nav-link" href="../views/home.php"><i class="fab fa-product-hunt"></i> Products</a>
            </li>
            <li class="nav-item pr-3">
              <a class="nav-link" href="../views/cart.php"><i class="fas fa-shopping-cart"></i><strong id="icart" class="badge badge-pill badge-secondary"><?php echo array_sum($_SESSION['cart']);?></strong>Cart</a>
            </li>
            <li class="nav-item pr-3">
              <a class="nav-link " href="#"><i class="fas fa-person-booth"></i> About us</a>
            </li>
             <?php 

              if (isset($_SESSION['email'])) {
                echo "<li class='nav-item dropdown'>
                      <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup=''true' aria-expanded='false'>Account</a>
              <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownMenuLink'>
              <a class='dropdown-item' href='#' data-toggle='modal' data-target='#exampleModalCenter1'><i class='fas fa-cog'></i> Change Password</a>
              <a class='dropdown-item' href='../controllers/logout.php'><i class='fas fa-hiking'></i> Logout</a>
              </div>
            </li>";
              }
              else
              {
                echo "<li class='nav-item pr-3'>
              <a class='nav-link' href='#' data-toggle='modal' data-target='#exampleModalCenter'><i class='fas fa-user'></i> Sign In</a>
            </li>
            <li class='nav-item pr-3'>
              <a class='nav-link' href='register.php'><i class='fas fa-american-sign-language-interpreting'></i>  Register</a>
            </li>";
              }

            ?>
            <?php }?>
          </ul>
        </div>
      </nav>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form action="" method="POST">
            <div class="container">
              <label for="password">Change Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
          </form>
        </div>

        <div class="form-group">
          <div class="container">
            <label for="cpassword">Confirm Change Password</label>
            <span></span>
            <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" onchange="confirmPass()">
            <em><span id="passconf"></span></em>
          </div>
        </div>
        
        <div class="container">
          <button type="button" class="btn btn-warning" id="btn_changepass">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-user"></i> Sign-In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="../controllers/validate-login.php">
          <div class="form-group">
            <div class="container">
                <label for="email">Username</label>
                <input type="text" name="email" placeholder="email" class="form-control"><br>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="password" class="form-control">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" id="btn_login">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


