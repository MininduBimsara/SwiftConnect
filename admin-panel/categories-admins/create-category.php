<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
// Handle form submission
if (isset($_POST['submit'])) {
    // Check if essential fields are empty
    if (empty($_POST['name'])) {
        echo "<script>alert('Name cannot be empty');</script>";
    } else {
        // Escape inputs to prevent SQL injection
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $dimensions = $_POST['dimensions'];

        // Validate dimensions format (e.g., "25*35 cm" or "50*40*20 cm")
        if (empty($dimensions) || !preg_match('/^\d+(\*\d+){1,2}\s*cm$/', $dimensions)) {
            echo "<script>alert('Dimensions format is invalid. Please use the format: <width>*<height> cm or <width>*<height>*<depth> cm');</script>";
        } else {
            $dimensions = mysqli_real_escape_string($conn, $dimensions);
            $image = $_FILES['image']['name'];
            $target_dir = "img-category/";
            $target_file = $target_dir . basename($image);

            // Ensure the target directory exists
            if (!is_dir($target_dir)) {
                if (!mkdir($target_dir, 0777, true)) {
                    echo "<script>alert('Failed to create upload directory');</script>";
                    exit;
                }
            }

            // Attempt to move the uploaded file and check if successful
            if ($image && move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                // Insert data into the database only if the file upload is successful
                $query = "INSERT INTO categories (name, image, dimensions) VALUES ('$name', '$image', '$dimensions')";
                if (mysqli_query($conn, $query)) {
                    echo "<script> window.location.href = '".ADMINURL."/categories-admins/show-categories.php'; </script>";
                } else {
                    echo "<script>alert('Error while creating the category in the database: " . mysqli_error($conn) . "');</script>";
                    // Optionally, remove the uploaded file if database insertion fails
                    unlink($target_file);
                }
            } else {
                echo "<script>alert('Image upload failed. Check directory permissions and file type.');</script>";
            }
        }
    }
}
?>

<!-- header.php -->

<head>
    <link rel="stylesheet" href="create-category.css">
    <link rel="stylesheet" href="../layouts/header.css">
    <script>
    // Function to validate dimensions input
    function validateForm() {
        var dimensions = document.forms["categoryForm"]["dimensions"].value;
        var regex = /^\d+(\*\d+){1,2}\s*cm$/;
        if (!regex.test(dimensions)) {
            alert(
                "Dimensions format is invalid. Please use the format: <width>*<height> cm or <width>*<height>*<depth> cm"
            );
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
    </script>
</head>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Categories</h5>
                <form name="categoryForm" method="POST" action="create-category.php" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    <!-- Name input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="name" class="form-control" placeholder="Name" />
                    </div>

                    <!-- Dimensions input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="dimensions" class="form-control"
                            placeholder="Dimensions (e.g., 25*35 cm)" required pattern="^\d+(\*\d+){1,2}\s*cm$"
                            title="Format: <width>*<height> cm or <width>*<height>*<depth> cm" />
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