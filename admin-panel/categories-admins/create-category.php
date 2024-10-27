<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
// Redirect to login if admin is not logged in
// Uncomment if needed for session-based admin authentication
// if(!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
//     exit;
// }

// Handle form submission
if (isset($_POST['submit'])) {
    // Check if essential fields are empty
    if (empty($_POST['name']) || empty($_POST['dimensions'])) {
        echo "<script>alert('Name or Dimensions cannot be empty');</script>";
    } else {
        // Escape inputs to prevent SQL injection
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $dimensions = mysqli_real_escape_string($conn, $_POST['dimensions']);
        $image = $_FILES['image']['name'];
        $target_dir = "img-category/";

        // Ensure the target directory exists
        if (!is_dir($target_dir) && !mkdir($target_dir, 0777, true)) {
            echo "<script>alert('Failed to create upload directory');</script>";
            exit;
        }

        $target_file = $target_dir . basename($image);

        // Attempt to move the uploaded file and check if successful
        if ($image && move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Insert data into the database only if the file upload is successful
            $query = "INSERT INTO categories (name, image, dimensions) VALUES ('$name', '$image', '$dimensions')";
            if (mysqli_query($conn, $query)) {
                echo "<script> window.location.href = '".ADMINURL."/categories-admins/show-categories.php'; </script>";
            } else {
                echo "<script>alert('Error while creating the category in the database');</script>";
                // Optionally, remove the uploaded file if database insertion fails
                unlink($target_file);
            }
        } else {
            echo "<script>alert('Image upload failed. Check directory permissions and file type');</script>";
        }
    }
}
?>

<!-- header.php -->
<head>
    <link rel="stylesheet" href="create-category.css">
</head>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Categories</h5>
                <form method="POST" action="create-category.php" enctype="multipart/form-data">
                    <!-- Name input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="name" class="form-control" placeholder="Name" required />
                    </div>
                    
                    <!-- Dimensions input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="dimensions" class="form-control" placeholder="Dimensions (e.g., 25*35 cm)" required />
                    </div>
                    
                    <!-- Image input -->
                    <div class="form-outline mb-4 mt-4">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary mb-4">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
