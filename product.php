<?php

    session_start();
    include('database/connect.php');

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
    <!-- product start -->
    <section id="product">
        <div class="container">
            <div class="row text-center py-2 my-3 bg-color">
                <h2 class="fw-bold"><b class=" text-dark">Lastest </b>Product</h2>
            </div>
        </div>
        <div class="container mb-5 py-3">
            <div class="row text-center mb-3">
                <?php
                    $query = "SELECT * FROM food_store_product";
                    $statement = $connect->prepare($query);
                    $statement->execute();

                    $value = $statement->fetchAll(PDO::FETCH_ASSOC);
                ?>
                    <?php foreach($value as $row) :?>
                            <div class="col-sm-4 g-5 ">
                                <form method="post" action="order.php?id=<?= $row['id']; ?>">
                                            <img src="admin/img/<?= $row['image']; ?>" style="height: 200px;">
                                            <h5><?= $row['name'];?></h5>
                                            <h5>$<?= $row['price'];?></h5>
                                            <input type="hidden" name="name" value="<?= $row['name'];?>">
                                            <input type="hidden" value="<?= $row['price']; ?>" name="price">
                                            <input type="hidden" name="image" value="<?= $row['image'];?>">
                                            <input type="hidden" name="total" value="<?php 
                                            $row['price']; ?>">
                                            <input type="number" name="quality" class="text-center mx-auto form-control w-75" value="1">
                                            <input type="submit" name="add_to_cart" class="btn my-2 btn-warning btn-block" value="Add To Cart">
                                </form>
                            </div>
                    <?php endforeach;?>
            </div>
        </div>
    </section>
    <!-- product end -->

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