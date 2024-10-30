<?php 
require "../layouts/header.php"; 
require "../../config/config.php"; 

// if (!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
// }

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch product details
    $select = $conn->query("SELECT * FROM products WHERE id='$id'");
    $data = $select->fetch_assoc();

    // Delete product image
    if (file_exists("img-products/" . $data['image'])) {
        unlink("img-products/" . $data['image']);
    }

    // Delete product record from database
    $delete = $conn->query("DELETE FROM products WHERE id='$id'");
    
    if ($delete) {
        echo "<script> window.location.href = '".ADMINURL."/products-admins/show-Service_Centers.php'; </script>";
    } else {
        echo "<script>alert('Failed to delete product');</script>";
    }
}
?>
<!-- header.php -->

<head>
    <link rel="stylesheet" href="delete-Service_Centers.css">
    <link rel="stylesheet" href="../layouts/header.css">

</head>
<?php require "../layouts/footer.php"; ?>