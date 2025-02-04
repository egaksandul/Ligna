<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    echo "<p class='message'>You need to log in to view your cart.</p>";
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT cart_items.id, products.name, products.price, cart_items.quantity
        FROM cart_items
        JOIN products ON cart_items.product_id = products.id
        WHERE cart_items.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

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
            <a href="/Ligna/adminpannel/Prod/admin/view_cart.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block"><i class=" fas fa-user-alt"></i></a>
            <a href="/Ligna/adminpannel/Prod/admin/view_cart.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block"><i class="fa fa-shopping-cart"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="cart">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    
    <div class="container mt-5">
        <h1 class="text-center">Your Shopping Cart</h1>
        
        <?php if ($result->num_rows > 0): ?>
            <div class="cart-items">
                <?php $total = 0; ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="cart-item border p-3 mb-3">
                        <h2><?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                        <p>Price: Rs <?= number_format($row['price'], 2); ?></p>
                        <p>Quantity: <?= intval($row['quantity']); ?></p>
                        <p>Subtotal: Rs <?= number_format($row['price'] * $row['quantity'], 2); ?></p>
                        <a class='btn btn-danger' href='#?id=<?= intval($row['id']); ?>'>Remove</a>
                    </div>
                    <?php $total += $row['price'] * $row['quantity']; ?>
                <?php endwhile; ?>
            </div>
            <div class="cart-total text-center mt-4">
                <h3>Total: Rs <?= number_format($total, 2); ?></h3>
                <a class='btn btn-success' href='/Ligna/adminpannel/Prod/admin/payment.html'>Checkout</a>
            </div>
        <?php else: ?>
            <p class='text-center text-danger'>Your cart is empty.</p>
            <div class="cart-total text-center mt-4">
                <a class='btn btn-success' href='/Ligna/login/login.html'>Login</a>
            </div>
        <?php endif; ?>
        
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>