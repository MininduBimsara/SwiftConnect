<?php 
require "../layouts/header.php"; 
require "../../config/config.php"; 

// Check if the id and status are set
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    // Prepare the MySQLi query to update the status
    if ($status == 0) {
        $update = $conn->query("UPDATE products SET status = 1 WHERE id='$id'");
    } else {
        $update = $conn->query("UPDATE products SET status = 0 WHERE id='$id'");
    }

    // Redirect after updating the status
    echo "<script> window.location.href = '".ADMINURL."/products-admins/show-products.php'; </script>";
}
?>
