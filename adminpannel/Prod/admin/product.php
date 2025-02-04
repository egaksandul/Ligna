<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ligna - Carpenter Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="stylesheet" href="productscss.css">
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/Ligna/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/Ligna/css/style.css" rel="stylesheet">
</head>

<body>
 <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img src="/Ligna/img/logo.jpg" class="logo"></a>
			<style>
				.logo {
					width: 150px; /* Adjust width */
					height: auto; /* Maintain aspect ratio */
				}
			</style>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/Ligna/index.html" class="nav-item nav-link">Home</a>
                <a href="/Ligna/about.html" class="nav-item nav-link">About</a>
                <a href="/Ligna/service.html" class="nav-item nav-link">Service</a>
                <a href="/Ligna/adminpannel/Prod/admin/product.php" class="nav-item nav-link active">Product</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">More</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="/Ligna/feature.html" class="dropdown-item">Feature</a>
                        <a href="/Ligna/feedback.html" class="dropdown-item">Reviews & Feedback</a>
                    </div>
                </div>
                <a href="/Ligna/contact.html" class="nav-item nav-link">CONTACT</a>
            </div>
            <a href="/Ligna/login/login.html" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block"><i class=" fas fa-user-alt"></i></a>
            <a href="/Ligna/adminpannel/Prod/admin/view_cart.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block"><i class="fa fa-shopping-cart"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Product</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <main>
        <section id="products">
            <div class="product-row">
                <div class="product-container">
                    <?php
                    include 'db_connect.php';

                    $sql = "SELECT id, name, description, price, stock_quantity, image_url FROM products";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $productId = $row['id'];
                            $productName = strtolower(str_replace(' ', '', $row['name'])); // Convert product name to lowercase without spaces

                            echo "<div class='product-card'>";
                            echo "<img src='" . $row['image_url'] . "' alt='" . $row['name'] . "' class='product-image'>";
                            echo "<h2 class='product-name'>" . $row['name'] . "</h2>";
                            echo "<p class='product-description'>" . $row['description'] . "</p>";
                            echo "<p class='product-price'>Rs " . $row['price'] . "</p>";
                            echo "<p class='product-stock'>In Stock: " . $row['stock_quantity'] . "</p>";
                            echo "<a href='product.php' class='buy-button'>See More</a>"; // Redirect to product specific page
                            echo "<a href='add_to_cart.php?id=" . $row['id'] . "' class='add-to-cart-btn'><i class='fas fa-shopping-cart'></i></a>";
                            echo "</div>";
                        }
                    } else {
                        echo "No products available.";
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
        </section>
    </main>
    <!-- Projects End -->
        

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i> Level 13 C Station Rd, Colombo, Sri Lanka</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+94776069779</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>lignalk@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://x.com/i/flow/login"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/login.php/"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/account?noapp=1"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/login"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="http://localhost/Ligna/feedback.html">Custom Furniture Design</a>
                    <a class="btn btn-link" href="http://localhost/Ligna/feedback.html">Wooden Flooring Installation</a>
                    <a class="btn btn-link" href="http://localhost/Ligna/feedback.html">Cabinetry and Storage Solution</a>
                    <a class="btn btn-link" href="http://localhost/Ligna/feedback.html">Office Woodworks</a>
                    <a class="btn btn-link" href="http://localhost/Ligna/feedback.html">Repairs and Restoration</a>
                    <a class="btn btn-link" href="http://localhost/Ligna/feedback.html">Outdoor Woodwork</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="http://localhost/Ligna/index.html">Home</a>
                    <a class="btn btn-link" href="http://localhost/Ligna/about.html">About Us</a>
                    <a class="btn btn-link" href="http://localhost/Ligna/contact.html">Contact Us</a>
                    <a class="btn btn-link" href="http://localhost/Ligna/adminpannel/Prod/admin/product.php">Products</a>
                    <a class="btn btn-link" href="http://localhost/Ligna/feedback.html">Reviews & Feedback</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <h5 style="color:darkgray;">Stay Connected with Ligna</h5>
                    <p>Sign up for our newsletter to receive the latest updates on new designs, exclusive offers, and expert woodworking tips straight to your inbox</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <a class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2" href="login/signup.html">SignUp</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">ligna</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>