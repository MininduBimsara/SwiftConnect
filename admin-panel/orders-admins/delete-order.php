<?php 
    require "../layouts/header.php"; 
    require "../../config/config.php"; 

    session_start();
    // Check if the admin is logged in
    // if (!isset($_SESSION['adminname'])) {
    //     echo "<script> window.location.href ='" . ADMINURL . "/admins/login-admins.php'; </script>";
    //     exit();
    // }

    // Check if 'id' is provided in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Prepare a delete statement
        $deleteQuery = "DELETE FROM orders WHERE id = ?";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param('i', $id); // Bind the parameter as an integer

        if ($stmt->execute()) {
            echo "<script> window.location.href = '" . ADMINURL . "/orders-admins/show-orders.php'; </script>";
            exit();
        } else {
            echo "<script>alert('Error deleting order.');</script>";
        }
        $stmt->close();
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