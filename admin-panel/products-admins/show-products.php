<?php 
require "../layouts/header.php"; 
require "../../config/config.php"; 

// Check if admin is logged in
// if (!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href = '".ADMINURL."/admins/login-admins.php'; </script>";
// }

// Fetch products using MySQLi
$products = $conn->query("SELECT * FROM products");
?>
<!-- header.php -->
<head>
    <link rel="stylesheet" href="show-products.css">
</head>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Products</h5>
                <a href="<?php echo ADMINURL; ?>/products-admins/create-products.php" class="btn btn-primary mb-4 text-center float-right">Create Products</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price in $$</th>
                            <th scope="col">Expiration Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($product = $products->fetch_assoc()): ?>
                        <tr>
                            <th scope="row"><?php echo $product['id']; ?></th>
                            <td><?php echo $product['Title']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $product['exp_date']; ?></td>
                            <td>
                                <a href="<?php echo ADMINURL; ?>/products-admins/status.php?id=<?php echo $product['id']; ?>&status=<?php echo $product['status']; ?>" 
                                   class="btn <?php echo $product['status'] == 0 ? 'btn-danger' : 'btn-success'; ?>">
                                    <?php echo $product['status'] == 0 ? 'Unavailable' : 'Available'; ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo ADMINURL; ?>/products-admins/delete-products.php?id=<?php echo $product['id']; ?>" 
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
