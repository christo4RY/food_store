<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header("location:product.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodStore</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>
<body>
    <nav class="navbar navbar-expand-md shadow-sm sticky-top navbar-light bg-light" id="home">
        <div class="container d-flex flex-sm-row">

        <a href="index.php" class="navbar-brand d-flex justify-content-between align-items-center">
                <i class="fa-brands fa-shopify text-warning"></i>
                <h2 class="ms-2">FoodStore</h2>
        </a>
            

        <button class="btn navbar-toggler" data-bs-target="#navbar" data-bs-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse text-center" id="navbar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php#about" class="nav-link"> About </a>
                    </li>
                    <li class="nav-item">
                        <a href="product.php" class="nav-link"> Product </a>
                    </li>
                    <li class="nav-item">
                        <a href="register.php" class="nav-link"> Register </a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link"> Contact </a>
                    </li>
                </ul>

                <div class="btns d-flex">
                    <a href="product.php"  class="btn"><i class="fa-solid fa-cart-shopping text-info"></i>
                    </a>
                    <div class="dropdown">
                        <a href="" class="btn dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-user text-primary"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="login.php" class="dropdown-item">Singin</a></li>
                            <li><a href="logout.php" class="dropdown-item">Logout</a></li>
                        </ul>
                    </div>
                </div> 
            </div>
        </div>
    </nav>

    <!-- Thanks start -->
    <section>
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center my-3">
                    <div class="py-4 wrap">
                        <h3 class="text-success">Thank you for shopping with us</h3>
                        <h5>You're Order Successfully!</h5>
                        <h4>You're Order No.<?= "<h2 class='text-info'>".$_REQUEST['order_no']."</h2>"?></h4>
                        <h6>Thank you. Please come again.</h6>
                        <div class="mt-4">
                            <a href="product.php" class="btn btn-warning me-2">Buy Again</a>
                            <a href="index.php" class="btn btn-warning">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Thanks end -->

    <!-- footer start -->
    <footer class='bg-dark py-3 text-center'>
        <div class=''>
            <h6 class='text-light'>&copy Developed by Arkarlin</h6>
        </div>
    </footer>
    <!-- footer end -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>