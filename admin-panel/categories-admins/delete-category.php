<?php 
require "../layouts/header.php"; 
require "../../config/config.php";

// Redirect to login if admin is not logged in
// Uncomment this block if session-based authentication is needed
// if (!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
//     exit;
// }

// Check if 'category_id' is passed and is numeric
if (isset($_GET['category_id']) && is_numeric($_GET['category_id'])) {
    $category_id = (int) $_GET['category_id']; // Cast to int for security

    // Fetch the category details
    $stmt = mysqli_prepare($conn, "SELECT * FROM categories WHERE category_id = ?");
    if ($stmt === false) {
        die('MySQL prepare error: ' . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "i", $category_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the category exists before proceeding
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_object($result);

        // Check if the image file exists and delete it
        $imagePath = "img-category/" . $data->image;
        if (file_exists($imagePath) && is_file($imagePath)) {
            unlink($imagePath); // Delete image from the folder
        }

        // Delete the category from the database
        $stmt_delete = mysqli_prepare($conn, "DELETE FROM categories WHERE category_id = ?");
        if ($stmt_delete === false) {
            die('MySQL prepare error: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt_delete, "i", $category_id);
        if (mysqli_stmt_execute($stmt_delete)) {
            echo "<script>alert('Category deleted successfully.'); window.location.href = '".ADMINURL."/categories-admins/show-categories.php'; </script>";
        } else {
            echo "<p>Error deleting category. Please try again.</p>";
        }

        mysqli_stmt_close($stmt_delete);
    } else {
        echo "<p>Category not found.</p>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "<p>Invalid category ID.</p>";
}
?>

<!-- Include additional CSS for page styling -->
<head>
    <link rel="stylesheet" href="delete-category.css">
</head>

<?php require "../layouts/footer.php"; ?>
