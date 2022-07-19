<?php

    session_start();
    require_once('database/connect.php');
    if (!isset($_SESSION['user'])) {
        header('location:login.php');
        exit();
    }

    if (isset($_POST['add_to_cart'])) {
        $product_name = $_POST['name'];
		$price = $_POST['price'];
        $quality = $_POST['quality'];
        $image = $_POST['image'];
        $total = $_POST['price'] * $_POST['quality'];
	}

    if(isset($_POST['checkout'])){
        $fname = $_POST['fname'];
        $sname = $_POST['sname'];
        $username = $fname." ".$sname;
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $product_name = $_POST['name'];
        $price = $_POST['price'];
        $quality = $_POST['quality'];
        $total = $_POST['total'];
        $order_no = rand(100,1000);

        $orders = $connect->prepare("INSERT INTO food_store_orders(username,email,phone,address,city,country,product_name,price,quality,total,order_no) VALUES (:username,:email,:phone,:address,:city,:country,:product_name,:price,:quality,:total,:order_no)");

        $statement = $orders->execute([
            ':username' => $username,
            ':email' => $email,
            ':phone' => $phone,
            ':address' => $address,
            ':city' => $city,
            ':country' => $country,
            ':product_name' => $product_name,
            ':price' => $price,
            ':quality' => $quality,
            ':total' => $total,
            ':order_no' => $order_no
        ]);

        header("location:thanks.php?order_no=$order_no");
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

    <!-- billing start -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col col-md-7">
                    <h3 class="m-2 text-primary">Billing Address</h3>
                    <form action="order.php" method="post">
                        <div class="row my-2">
                            <div class="col-md-6">
                                <label for="fname" class="pb-2">First name:</label>
                                <input type="text" name="fname" id-="fname" required class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="sname" class="pb-2">Second name:</label>
                                <input type="text" class="form-control" required name="sname" id="sname" placeholder="Second Name">
                            </div>
                        </div>
                        <input type="hidden" name="name" value="<?= $_POST['name']?>">
                        <input type="hidden" name="price" value="<?= $_POST['price']?>">
                        <input type="hidden" name="quality" value="<?= $_POST['quality']?>">
                        <input type="hidden" name="total" value="<?= $_POST['price'] * $_POST['quality'];?>">
                        <label for="email" class="pb-2">Email:</label>
                        <input type="email" name="email" id="email" required class="form-control mb-2" placeholder="your@gmail.com">
                        <label for="phone" class="pb-2">Phone:</label>
                        <input type="text" name="phone" id="phone" required class="form-control mb-2" placeholder="09XXXXXX">
                        <label for="address" class="pb-2">Address:</label>
                        <input type="text" name="address" id="address" required class="form-control mb-2" placeholder="your address">
                        <div class="row my-2">
                            <div class="col-md-6">
                                <label for="city" class="pb-2">City:</label>
                                <input type="text" name="city" id-="city" required class="form-control" placeholder="City">
                            </div>
                            <div class="col-md-6">
                                <label for="country" class="pb-2">Country:</label>
                                <input type="text" class="form-control" required name="country" id="country" placeholder="Country">
                            </div>
                        </div>
                        <hr>
                        <h3 class="my-3 text-primary">Payment</h3>
                        <input type="radio" name="cash-on-delivery" required class="me-2 mb-2">Cash On Delivery
                        <hr>
                        <button class="btn btn-primary w-100" name="checkout">Continue to checkout</button>
                    </form>
                </div>
                <div class="col col-md-5">
                    <h3 class="m-2 text-primary" >Your cart</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <img src="admin/img/<?= $image;?>" style="height: 150px;">
                                </li>
                                <li class="list-group-item">Product Name: <?= $product_name;?></li>
                                <li class="list-group-item">Price: $<?= $price;?></li>
                                <li class="list-group-item">Quality: <?= $quality;?></li>
                                <li class="list-group-item">Total: $<?= $total;?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- billing end -->

    <!-- footer start -->
    <footer class='bg-dark py-3 text-center mt-4'>
        <div class=''>
            <h6 class='text-light'>&copy Developed by Arkarlin</h6>
        </div>
    </footer>
    <!-- footer end -->

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>