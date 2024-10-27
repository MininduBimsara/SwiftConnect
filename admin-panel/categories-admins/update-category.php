<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 

// if (!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
//     exit;
// }

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];

    // Fetch category using MySQLi
    $select = $conn->query("SELECT * FROM categories WHERE category_id='$id'");

    // Check if any category is found
    if ($select && $select->num_rows > 0) {
        $category = $select->fetch_assoc(); // Fetch category details
    } else {
        echo "<p class='text-danger'>Category not found.</p>";
        exit;
    }

    // Update category when form is submitted
    if (isset($_POST['submit'])) {
        
        if (empty($_POST['name']) || empty($_POST['dimensions'])) {
            echo "<script>alert('Name or Dimensions cannot be empty');</script>";
        } else {
            $name = $_POST['name'];
            $dimensions = $_POST['dimensions'];

            if (!empty($_FILES['image']['name'])) {
                $image = $_FILES['image']['name'];
                $target_dir = "img-category/";
                $target_file = $target_dir . basename($image);

                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $old_image = $category['image'];
                    if ($old_image && file_exists($target_dir . $old_image)) {
                        unlink($target_dir . $old_image);
                    }
                } else {
                    echo "<script>alert('Image upload failed');</script>";
                    exit;
                }
            } else {
                $image = $category['image'];
            }

            // Update query using MySQLi
            $update = $conn->prepare("UPDATE categories SET name=?, image=?, dimensions=? WHERE category_id=?");
            $update->bind_param("sssi", $name, $image, $dimensions, $id);
            if ($update->execute()) {
                echo "<script> window.location.href = '".ADMINURL."/categories-admins/show-categories.php'; </script>";
            } else {
                echo "<script>alert('Error updating category');</script>";
            }
        }
    }
}
?>

<head>
    <link rel="stylesheet" href="update-category.css">
</head>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Update Category</h5>
                <?php if ($category): ?>
                <form method="POST" action="update-category.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                    <!-- Name input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="name" value="<?php echo htmlspecialchars($category['name']); ?>" class="form-control" placeholder="Name" />
                    </div>

                     <!-- Dimensions input -->
                     <div class="form-outline mb-4 mt-4">
                        <input type="text" name="dimensions" value="<?php echo htmlspecialchars($category['dimensions']); ?>" class="form-control" placeholder="Dimensions" />
                    </div>

                    <!-- Image input -->
                    <div class="form-outline mb-4 mt-4">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" />
                    </div>
                   
                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary mb-4">Update</button>
                </form>
                <?php else: ?>
                    <p class="text-danger">Category not found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
