<?php 
    require "../layouts/header.php"; 
    require "../../config/config.php"; 

    // Start session and check for admin login

    // if (!isset($_SESSION['adminname'])) {
    //     echo "<script> window.location.href ='" . ADMINURL . "/admins/login-admins.php'; </script>";
    // }

    // MySQLi query for fetching orders
    $query = "SELECT * FROM orders";
    $result = $conn->query($query);

    if ($result === false) {
        die("Error: " . $conn->error);
    }

    $allOrders = $result->fetch_all(MYSQLI_ASSOC); // Fetch all orders as associative array
?>
<!-- header.php -->

<head>
    <link rel="stylesheet" href="show-orders.css">
    <link rel="stylesheet" href="../layouts/header.css">

</head>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Orders</h5>
                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Country</th>
                            <th scope="col">Status</th>
                            <th scope="col">Price in USD</th>
                            <th scope="col">Date</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allOrders as $Order) : ?>
                        <tr>
                            <th scope="row"><?php echo $Order['id']; ?></th>
                            <td><?php echo htmlspecialchars($Order['name']); ?></td>
                            <td><?php echo htmlspecialchars($Order['lname']); ?></td>
                            <td><?php echo htmlspecialchars($Order['email']); ?></td>
                            <td><?php echo htmlspecialchars($Order['country']); ?></td>
                            <td><?php echo htmlspecialchars($Order['status']); ?></td>
                            <td><?php echo htmlspecialchars($Order['price']); ?></td>
                            <td><?php echo htmlspecialchars($Order['created_at']); ?></td>
                            <td>
                                <a href="<?php echo ADMINURL; ?>/orders-admins/update-orders.php?id=<?php echo $Order['id']; ?>"
                                    class="btn btn-warning text-white mb-4">Update</a>
                            </td>
                            <td>
                                <a href="delete-order.php?id=<?php echo $Order['id']; ?>"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>