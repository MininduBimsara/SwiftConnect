<?php 
require "../layouts/header.php"; 
require "../../config/config.php"; 

// if (!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
// }

// Fetching Categories
$categoriesQuery = $conn->query("SELECT * FROM categories");
$allcategories = $categoriesQuery->fetch_all(MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
    if (empty($_POST['Title']) || empty($_POST['price']) || empty($_POST['description']) || empty($_POST['category_id']) || empty($_POST['exp_date'])) {
        echo "<script>alert('One or more inputs are empty');</script>";
    } else {
        $Title = $_POST['Title'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $exp_date = $_POST['exp_date'];
        $image = $_FILES['image']['name'];

        $dir = "img-products/" . basename($image);

        $insert = $conn->prepare("INSERT INTO products (Title, price, description, category_id, exp_date, image) VALUES (?, ?, ?, ?, ?, ?)");
        $insert->bind_param("sdssss", $Title, $price, $description, $category_id, $exp_date, $image);
        $insert->execute();

        if (move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
            echo "<script> window.location.href = '".ADMINURL."/products-admins/show-products.php'; </script>";
        }
    }
}
?>
<!-- header.php -->
<head>
    <link rel="stylesheet" href="create-products.css">
</head>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Products</h5>
                <form method="POST" action="create-products.php" enctype="multipart/form-data">
                    <!-- Title input -->
                    <div class="form-outline mb-4 mt-4">
                        <label>Title</label>
                        <input type="text" name="Title" class="form-control" placeholder="title" />
                    </div>

                    <!-- Price input -->
                    <div class="form-outline mb-4 mt-4">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" placeholder="price" />
                    </div>

                    <!-- Description input -->
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="description"></textarea>
                    </div>

                    <!-- Category input -->
                    <div class="form-group">
                        <label>Select Category</label>
                        <select name="category_id" class="form-control">
                            <option>--select category--</option>
                            <?php foreach($allcategories as $category): ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Expiration date input -->
                    <div class="form-group">
                        <label>Select Expiration Date</label>
                        <select name="exp_date" class="form-control">
                            <option>--select expiration date--</option>
                            <option>2024-11-11</option>
                            <option>2025-12-23</option>
                            <option>2026-06-23</option>
                        </select>
                    </div>

                    <!-- Image input -->
                    <div class="form-outline mb-4 mt-4">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary mb-4">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
