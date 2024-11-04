<?php 
require "../layouts/header.php"; 
require "../../config/config.php"; 

// if (!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
// }

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch service certer details
    $select = $conn->query("SELECT * FROM servicecenter WHERE center_id='$id'");
    $data = $select->fetch_assoc();

    // Delete product record from database
    $delete = $conn->query("DELETE FROM servicecenter WHERE center_id='$id'");
    
    if ($delete) {
        echo "<script> window.location.href = '".ADMINURL."/Service_Centers-admins/show-Service_Centers.php'; </script>";
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