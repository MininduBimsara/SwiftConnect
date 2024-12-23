<?php require "../config/config.php"; ?>

<?php
// Redirect to login if admin not logged in
// if(!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
//     exit;
// }

// Fetch number of products
// $productQuery = "SELECT COUNT(*) as products_num FROM products";
// $productResult = $conn->query($productQuery);
// $num_products = $productResult->fetch_assoc();

// Fetch number of orders
$orderQuery = "SELECT COUNT(*) as orders_num FROM orders";
$orderResult = $conn->query($orderQuery);
$num_orders = $orderResult->fetch_assoc();

// Fetch number of categories
$categoryQuery = "SELECT COUNT(*) as categories_num FROM categories";
$categoryResult = $conn->query($categoryQuery);
$num_categories = $categoryResult->fetch_assoc();

// Fetch number of admins
$adminQuery = "SELECT COUNT(*) as admins_num FROM admins";
$adminResult = $conn->query($adminQuery);
$num_admins = $adminResult->fetch_assoc();

// Fetch number of categories
$centerQuery = "SELECT COUNT(*) as serviceCenters_num FROM servicecenter";
$centerResult = $conn->query($centerQuery);
$num_centers = $centerResult->fetch_assoc();

?>
<!-- header.php -->

<head>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="layouts/header.css">
     
</head>


<body>
    <?php require "layouts/header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Service Centers</h5>
                        <p class="card-text">Number of Service Centers: <?php echo $num_centers['serviceCenters_num']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Orders</h5>
                        <p class="card-text">Number of orders: <?php echo $num_orders['orders_num']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text">Number of categories: <?php echo $num_categories['categories_num']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Admins</h5>
                        <p class="card-text">Number of admins: <?php echo $num_admins['admins_num']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require "layouts/footer.php"; ?>

</body>