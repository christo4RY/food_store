<?php

    session_start();
    include('../database/connect.php');

    $query = $connect->prepare("SELECT * FROM food_store_admin");
    $query->execute();
    $admins = $query->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST['upload'])){
        $name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $type = $_FILES['file']['type'];

        if($type === "image/jpeg" or $type === "image/png"){
            mkdir("admin_img");
            move_uploaded_file($tmp_name, "admin_img/admin.jpeg");
            header("location:admin_profile.php?upload=1");
        }else{
            header("location:admin_profile.php?incorrect=1");
        }
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
    <style type="text/css">
        .wrap{
            width: 100%;
            max-width: 500px;
            margin: auto;
        }
    </style>
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
                    <a href="admin.php" class="list-group-item list-group-item-action hover">
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
                    <div class="row wrap mb-3">
                        <div class="col-md-12">
                            <h1 class="text-center text-warning py-2">Admin Profile</h1>
                            <ul class="list-group">
                            <?php foreach($admins as $admin):?>
                                <li class="list-group-item text-center"><img src="admin_img/admin.jpeg" style="height: 350px; width: 100%;"></li>
                                <li class="list-group-item"><h5>Name: <?= $admin['name']?></h5></li>
                                <li class="list-group-item"><h5>Email: <?= $admin['email']?></h5></li>
                            <?php endforeach?>
                            </ul>
                            <form action="admin_profile.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="file" class="form-control my-2">
                                <button class="btn btn-primary form-control" name="upload">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        <!-- footer start -->
    <footer class="text-muted bg-light text-center py-3">
            &copy;Developed by Arkarlin
    </footer>
    <!-- footer start -->

    <script src="../js/bootstrap.bundle.min.js"></script>
    </body>
</html>