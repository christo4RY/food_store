
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodStore</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/style.css">
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
                        <a href="#about" class="nav-link"> About </a>
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
    <!-- Carousel -->
    <div id="slide" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#slide" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#slide" data-bs-slide-to="1"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active ">
                <img src="admin/img/store1(2)(1).jpg" alt="" class="d-block store w-100">
            </div>
            <div class="carousel-item">
                <img src="admin/img/store2.png" alt="" class="d-block store w-100">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#slide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slide" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- carousel end -->

    <!-- about start -->
    <section id="about">
        <div class="container bg-color">
            <div class="row my-3">
                <div class="col">
                    <h2 class="fw-bold py-2 text-center"> <b style="color:#E84393;"> About </b> Us </h2>
                </div>
            </div>
        </div>
        <div class="container bg-light">
            <div class="row mb-3 p-3 g-4">
                <div class="col-md-6">
                    <div class="video-container position-relative" style="overflow:hidden;">
                        <video src="admin/img/foodstore.mp4" style="height:300px;width:100%;object-fit: cover;box-shadow:0 .5rem 1rem rgba(0,0,0,.1);border:1.5rem solid rgb(255, 237, 246);border-radius:10px;" loop autoplay muted></video>
                        <h3 class="position-absolute py-1" style="top:50%;
                        transform: translateY(-50%);
                        font-size: 2.5rem;
                        background:#fff;
                        width:100%;
                        text-align: center;
                        mix-blend-mode: screen;">Foodstore</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service">
                        <h1>Why Choose Us?</h1>
                        <p class="text-muted h5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita ipsa reprehenderit unde aperiam commodi odit suscipit sapiente voluptate magnam perferendis corporis odio amet, animi libero voluptatem possimus hic adipisci incidunt!</p><br>
                        <p class="text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio veritatis facilis iure, deleniti numquam placeat nemo totam nobis aliquid, officia, nesciunt qui ipsam architecto suscipit quibusdam. Iste ipsa aspernatur aliquid.</p>
                        <a href="product.php" class="btn rounded-pill w-50 mb-2">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about end -->

    <!-- footer start -->
		<footer class="bg-dark">
			<div class="container">
				<div class="row">
					<div class="col-md-3 py-5">
						<h3 class=" pt-1 pb-3">FoodStore Services</h3>
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti accusantium saepe aliquid optio corporis ut.</p>
					</div>
					<div class="col-md-3 pt-5 pb-4 ps-5">
						<h5 class="mb-2"> Links </h5>
						<div class="d-flex footer">
							<i class='fa-solid fa-house'></i>
							<a  class="ms-2" href="#home"> HOME </a>
						</div>
						<div class="d-flex footer">
                            <i class="fa-solid fa-circle-chevron-right"></i>
							<a  class="ms-2" href="#about"> About </a>
						</div>
						<div class="d-flex footer">
                            <i class="fa-solid fa-circle-chevron-right"></i>
							<a  class="ms-2" href="#product"> Products </a>
						</div>
						<div class="d-flex footer">
                            <i class="fa-solid fa-registered"></i>
							<a  class="ms-2" href="register.php"> Register </a>
						</div>
						<div class="d-flex footer">
                            <i class="fa-solid fa-address-book"></i>
							<a  class="ms-2" href="#contact"> Contact </a>
						</div>
					</div>

					<div class="col-md-3 pt-5 pb-4 ps-5">
						<h5> Contact Us </h5>
						<div class="d-flex contact-footer">
                            <i id="icon" class="fa-solid fa-location-pin"></i>
							<p class="ms-2"> Baw Tha Pyay Kan, Thanlyin, Yangon,Myanmar </p>
						</div>
						<div class="d-flex contact-footer">
                        <i id="icon" class="fa-solid fa-at"></i>
							<p class="ms-2"> arkarlin486@gmail.com </p>
						</div>						
						<div class="d-flex contact-footer">
                            <i id="icon" class="fa-solid fa-phone"></i>
							<p class="ms-2"> +959 756 820 141 </p>
						</div>
					</div>

					<div class="col-md-3 pt-5 pb-4 ps-5">
						<h5 class="mb-3"> Follow Us </h5>
						<div class="d-flex follow">
							<div class="me-2 i">
                            <a href="https://www.facebook.com/arkarlin.486">
                            <i class="fa-brands fa-facebook"></i>
							</a>
                            </div>
                            <div class="me-2 i">
							<a href="https://youtube.com/channel/UCpDl5x23O04">
                            <i class="fa-brands fa-youtube"></i>
							</a>
                            </div>
                            <div class="me-2 i">
							<a href="https://twitter.com/ArKarLi03710634?t=RoHMqyJZ_hT1ODw7WOQHNQ&s=09">
                            <i class="fa-brands fa-twitter"></i>
							</a>
                            </div>
                            <div class="me-2 i" >
							<a href="https://www.facebook.com/arkarlin.486">
                            <i class="fa-brands fa-instagram"></i>
							</a>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- footer end-->

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>