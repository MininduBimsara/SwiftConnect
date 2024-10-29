<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
// Redirect to login if admin is not logged in
// Uncomment if session-based authentication is needed
// if (!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
//     exit;
// }
$query = "SELECT category_id, name FROM categories";
// Fetch categories using the mysqli connection from config.php
$categories = mysqli_query($conn,$query);

// Check if categories exist and fetch them into an associative array
$allcategories = [];
if ($categories && mysqli_num_rows($categories) > 0) {
    $allcategories = mysqli_fetch_all($categories, MYSQLI_ASSOC);
}
?>

<!-- header.php -->
<head>
    <link rel="stylesheet" href="show-categories.css">
</head>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Categories</h5>
                <a href="<?php echo ADMINURL; ?>/categories-admins/create-category.php"
                    class="btn btn-primary mb-4 float-right">Create Categories</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($allcategories)) : ?>
                            <?php foreach ($allcategories as $categorie): ?>
                                <tr>
                                    <!-- Display the category ID, or 'N/A' if undefined -->
                                    <th scope="row"><?php echo isset($categorie['category_id']) ? $categorie['category_id'] : 'N/A'; ?></th>
                                    <!-- Display the category name, or 'Unnamed' if undefined -->
                                    <td><?php echo isset($categorie['name']) ? $categorie['name'] : 'Unnamed'; ?></td>
                                    <td>
                                        <!-- Link to update the category, using '#' if ID is undefined -->
                                        <a href="update-category.php?id=<?php echo isset($categorie['category_id']) ? $categorie['category_id'] : '#'; ?>"
                                           class="btn btn-warning text-white">Update</a>
                                    </td>
                                    <td>
                                        <!-- Link to delete the category, using '#' if ID is undefined -->
                                        <a href="delete-category.php?category_id=<?php echo isset($categorie['category_id']) ? $categorie['category_id'] : '#'; ?>" 
                                        class="btn btn-danger">Delete</a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4" class="text-center">No categories found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
