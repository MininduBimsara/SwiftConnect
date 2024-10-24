<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
// Redirect to login if admin is not logged in
// if (!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
//     exit;
// }

// Fetch categories using MySQLi
$categories = $conn->query("SELECT * FROM categories");

// Check if categories exist
if ($categories->num_rows > 0) {
    $allcategories = $categories->fetch_all(MYSQLI_ASSOC);
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
                                <th scope="row"><?php echo $categorie['id']; ?></th>
                                <td><?php echo $categorie['name']; ?></td>
                                <td>
                                    <a href="update-category.php?id=<?php echo $categorie['id']; ?>"
                                        class="btn btn-warning text-white">Update</a>
                                </td>
                                <td>
                                    <a href="delete-category.php?id=<?php echo $categorie['id']; ?>"
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
