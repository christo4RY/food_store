<?php 
    session_start();
    include('database/connect.php');

    if (isset($_POST['submit'])) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            header("index.php?error=1");
            }else{
                $query = "SELECT * FROM food_store_users WHERE email = :email AND password = :password";

                $statement = $connect->prepare($query);
                $statement->execute([
                    ':email' => $email,
                    ':password' => $password
                ]);

                $count = $statement->fetch(PDO::FETCH_ASSOC);
                if ($count > 0 ) {
                    $_SESSION['user'] = $email;
                    header('location:index.php');
                }else{
                    header('location:login.php?error=1');
                }
            }
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

    <!-- Login start -->
    <section id="login">
        <div class="container bg-light">
            <div class="row mb-4 wrap">
                <div class="col">
                    <h2 class="my-3">Login Form</h2>
                    <?php 
                        if (isset($_GET['error'])) :
                    ?>
                        <h6 class="alert alert-danger">Wroung email and password.</h6>
                    <?php endif;?>
                    <form action="login.php" method="post">
                        <label for="email">Email: </label>
                        <input type="email" id="email" name="email" required class="form-control my-2">
                        <label for="password">Passwod: </label>
                        <input type="password" id="password" required name="password" class="form-control my-2">
                        <input type="submit" name="submit" value="Login" class="btn btn-primary w-100 my-2">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Login end-->

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