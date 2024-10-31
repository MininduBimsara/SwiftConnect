<?php 
require "../layouts/header.php"; 
require "../../config/config.php"; 

// Check if the admin is logged in
// Uncomment the lines below if you want to enforce admin login
/*
if (!isset($_SESSION['adminname'])) {
    echo "<script> window.location.href ='" . ADMINURL . "/admins/login-admins.php'; </script>";
    exit();
}
*/

// Check if 'order_id' is provided in the URL
if (isset($_GET['order_id'])) {
    $id = $_GET['order_id'];

    // Validate the order_id to ensure it's a positive integer
    if (filter_var($id, FILTER_VALIDATE_INT) === false) {
        echo "<script>alert('Invalid order ID.'); window.location.href = '" . ADMINURL . "/orders-admins/show-orders.php'; </script>";
        exit();
    }

    // Prepare a delete statement
    $deleteQuery = "DELETE FROM orders WHERE order_id = ?";
    $stmt = $conn->prepare($deleteQuery);

    if ($stmt) {
        $stmt->bind_param('i', $id); // Bind the parameter as an integer

        if ($stmt->execute()) {
            echo "<script>alert('Order deleted successfully.'); window.location.href = '" . ADMINURL . "/orders-admins/show-orders.php'; </script>";
            exit();
        } else {
            echo "<script>alert('Error deleting order.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Failed to prepare statement.');</script>";
    }
} else {
    echo "<script>alert('No ID provided.');</script>";
}
?>
<!-- header.php -->

<head>
    <link rel="stylesheet" href="delete-order.css">
    <link rel="stylesheet" href="../layouts/header.css">
</head>

<?php require "../layouts/footer.php"; ?>
