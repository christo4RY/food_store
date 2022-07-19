<?php
    session_start();
    include('../database/connect.php');

    if (!isset($_SESSION['admin'])) {
        header('location:index.php?error=1');
        exit();
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
                    <div class="row text-center mb-3">
                    <?php
                    $query = "SELECT * FROM food_store_product";
                    $statement = $connect->prepare($query);

                    $statement->execute();
                    $value = $statement->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($value as $row) {?>
                        <div class="col-md-2 g-5 ">
                            <form method="post" action="product.php?id=<?= $row['id']; ?>">
                                        <img src="img/<?= $row['image']; ?>" style="height: 100px;">
                                        <h5 class="py-2"><?= $row['name'];?></h5>
                                        <h5 class="pb-2">$<?= $row['price'];?></h5>
                            </form>
                        </div>
                    <?php }?>
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