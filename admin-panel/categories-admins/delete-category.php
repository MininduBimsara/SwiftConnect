<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
// Redirect to login if admin is not logged in
// if (!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
//     exit;
// }

// Check if 'id' is passed through GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the category details using MySQLi
    $stmt = $conn->prepare("SELECT * FROM categories WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_object();

    // Delete image from the folder
    if (file_exists("img-category/" . $data->image)) {
        unlink("img-category/" . $data->image);
    }

    // Delete the category from the database
    $stmt_delete = $conn->prepare("DELETE FROM categories WHERE id=?");
    $stmt_delete->bind_param("i", $id);
    $stmt_delete->execute();

    echo "<script> window.location.href = '".ADMINURL."/categories-admins/show-categories.php'; </script>";
}
?>
<!-- header.php -->
<head>
    <link rel="stylesheet" href="delete-category.css">
</head>

<?php require "../layouts/footer.php"; ?>
