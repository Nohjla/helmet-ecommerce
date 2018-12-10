<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

     <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <title>Capstone 2</title>
</head>
<body>
  <?php session_start(); error_reporting(0);?>
  <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php"><strong>Helms</strong></a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link" href="../views/home.php"><i class="fab fa-product-hunt"></i> Products</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../views/cart.php"><i class="fas fa-shopping-cart"></i><strong id="icart" class="badge badge-pill badge-secondary"><?php echo $_SESSION['item_count'];?></strong>Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#"><i class="fas fa-person-booth"></i> About us</a>
            </li>
             <?php 

              if (isset($_SESSION['email'])) {
                echo "<li class='nav-item'>
              <a class='nav-link' href='../controllers/logout.php'><i class='fas fa-hiking'></i> Logout</a>
            </li>";
              }
              else
              {
                echo "<li class='nav-item'>
              <a class='nav-link' href='#' data-toggle='modal' data-target='#exampleModalCenter'><i class='fas fa-user'></i> Sign In</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='register.php'><i class='fas fa-american-sign-language-interpreting'></i>  Register</a>
            </li>";
              }

            ?>
            
          </ul>
        </div>
      </nav>
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