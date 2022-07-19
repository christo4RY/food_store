<?php
    error_reporting(1);
    session_start();
    include('../database/connect.php');

    if (isset($_POST['submit'])) {

        $image = $_FILES['file']['tmp_name'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $type  = $_FILES['file']['type'];
        $image_name  = $_FILES['file']['name'];

        if ($type === "image/jpeg" or $type === "image/png") {
            move_uploaded_file($image,"img/".$image_name);
            header('location:add_product.php?insert=1');
        }else{
            header('location:add_product.php?incorrect=1');
        }

        $query = "INSERT INTO food_store_product(name,price,image)VALUES('$name','$price','$image_name')";
        $connect->query($query);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodStore Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row g-0">
            <nav class="col-2 bg-light pe-3">
                <h1 class="h-4 py-3 text-center">
                    <i class="fa-brands fa-shopify text-danger me-2"></i>
                    <span class="d-none d-md-inline text-info">FoodStore Admin</span>
                </h1>
                <div class="list-group text-center text-md-start">
                    <span class="list-group-item d-none d-md-block">
                        <small>Admin Panel</small>
                    </span>
                    <a href="admin.php" class="list-group-item list-group-item-action ">
                        <i class="fas fa-home"></i>
                        <span class="d-none d-md-inline ms-1">Products</span>
                    </a>
                    <a href="add_product.php" class="list-group-item list-group-item-action ">
                        <i class="fa-solid fa-shop"></i>
                        <span class="d-none d-md-inline ms-1">Add Orders</span>
                    </a>
                    <a href="users_orders.php" class="list-group-item list-group-item-action ">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="d-none d-md-inline ms-1">Orders</span>
                    </a>
                    <a href="users_feedback.php" class="list-group-item list-group-item-action ">
                        <i class="fa-solid fa-message"></i>
                        <span class="d-none d-md-inline ms-1">Feedback</span>
                    </a>
                </div>
            </nav>
            <main class="col-10 bg-secondary">
                <nav class="navbar  navbar-expand-lg navbar-light bg-light">
                    <div class="flex-fill"></div>
                    <div class="navbar nav">
                        
                        <li class="nav-item dropdown me-3">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="admin_profile.php" class="dropdown-item">Profile</a>
                                </li>
                                <li>
                                    <a href="logout.php" class="dropdown-item">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </div>
                </nav>
                <div class="container">
                    <div class="row wrap text-center mb-3">
                        <div class="col">
                            <h2 class="text-info mb-4 pt-3">Add New Product</h2>
                            <h5 class="alert alert-success">Added New Product Successfully</h5>
                            <form action="add_product.php" enctype="multipart/form-data" method="post">
                                <label for="name" class="text-info">Product Name:</label>
                                <input type="text" required name="name" id="name" class="form-control">
                                <label for="price" class="text-info">Product Price:</label>
                                <input type="text" required name="price" id="price" class="form-control">
                                <input type="file" required name="file" class="form-control my-3">
                                <input type="submit" name="submit" value="Add Product" class="btn btn-primary w-100 mb-3">
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div> 
    </div>

    <!-- footer start -->
    <footer class="text-muted bg-light text-center py-3">
            &copy;Developed by Arkarlin
    </footer>
    <!-- footer start -->
    
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>