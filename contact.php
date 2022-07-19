<?php

    session_start();
    include('database/connect.php');

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $query = "INSERT INTO food_store_users_feedback (name,email,subject,message) VALUES (:name,:email,:subject,:message)";

        $statement = $connect->prepare($query);
        $statement->execute([
            ':name' => $name,
            ':email' => $email,
            ':subject' => $subject,
            ':message' => $message
        ]);
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

    <!-- contact start -->
    <section id="contact">
		<div class="container">
			<div class="row" data-aos="fade-up">
				<div class="col text-center py-4">
					<h5 class="h3 fw-bold"> CONTACT </h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 main-map">
					<div class="py-3">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d817.0129510586505!2d96.34974482916732!3d16.767299283365293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x555dce68b0ba04c4!2zMTbCsDQ2JzAyLjMiTiA5NsKwMjEnMDEuMSJF!5e1!3m2!1sen!2sus!4v1652781156952!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
				<form action="contact.php" method="post" class="col-md-5 contact mx-auto pb-4">
					<div class="row d-flex mt-4 pt-1 g-3">
						<h5 class="text-center h3"> Contact </h5>
						<h2 class="text-center text-primary"> Get In Touch </h2>
						<div class="col-md-6">
							<input class="form-control" name="name" placeholder="Enter Name" type="text">
						</div>
						<div class="col-md-6">
							<input class="form-control" name="email" placeholder="Enter Email" type="email">
						</div>
						<div class="col-md-12">
							<input class="form-control" name="subject" placeholder="Enter Subject" type="text">
						</div>
						<div class="col-md-12">
							<textarea class="form-control " name="message" placeholder="Enter Message" ></textarea>
						</div>
						<div class="col-md-12 d-grid">
							<input type="submit" name="submit" class="btn btn-primary text-light" value="Contact">
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
    <!-- contact start -->

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