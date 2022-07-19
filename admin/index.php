<?php

    session_start();
    include('../database/connect.php');

    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM food_store_admin WHERE email = :email AND password = :password ";
        $statement = $connect->prepare($query);
        $statement->execute([
                ':email' => $email,
                ':password' => $password
        ]);

        $row = $statement->fetch();

        if ($row > 0) {
            $_SESSION['admin'] = $email;
            header('location:admin.php');
        }else{
            header('location:index.php?incorrect=1');
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
    <style>
        .wrap {
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
        }
    </style>

</head>
<body class="text-center bg-info">
    <div class="wrap">
        <h5 class="fw-bold h1">FoodStore</h5>
        <h1 class="h1 mb-3 ">Admin Login</h1>
        <?php if ( isset($_GET['incorrect']) ) : ?>
            <div class="alert alert-warning">
                Incorrect Email or Password
                </div>
        <?php endif ?>
        <?php if ( isset($_GET['error']) ) : ?>
            <div class="alert alert-danger">
                No Found Admin Account
                </div>
        <?php endif ?>
            <form action="index.php" method="post">
                <input type="email" name="email" class="form-control mb-2" placeholder="Email" required >
                <input type="password" name="password" class="form-control mb-2" placeholder="Password" required >
                <button type="submit" name="submit" class="w-100 btn btn-lg btn-primary">
                    Login
                </button>
        `   </form>
    </div>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>