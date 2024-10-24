<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
// Redirect to login if admin is not logged in
// if(!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
//     exit;
// }

// Handle form submission
if (isset($_POST['submit'])) {
    if(empty($_POST['name']) || empty($_POST['icon']) || empty($_POST['description'])) {
        echo "<script>alert('One or more inputs are empty');</script>";
    } else {
        $name = $_POST['name'];
        $icon = $_POST['icon'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $target_dir = "img-category/" . basename($image);

        // Insert data using MySQLi
        $stmt = $conn->prepare("INSERT INTO categories (name, icon, description, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $icon, $description, $image);

        if($stmt->execute() && move_uploaded_file($_FILES['image']['tmp_name'], $target_dir)) {
            echo "<script> window.location.href = '".ADMINURL."/categories-admins/show-categories.php'; </script>";
        } else {
            echo "<script>alert('Error while creating the category');</script>";
        }

        $stmt->close();
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
                        <input type="text" name="name" class="form-control" placeholder="Name" />
                    </div>
                    <!-- Icon input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="icon" class="form-control" placeholder="Icon" />
                    </div>
                    <!-- Description input -->
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description"></textarea>
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
