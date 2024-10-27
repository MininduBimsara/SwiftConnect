<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 

// if(!isset($_SESSION['adminname'])){
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
//     exit;
// }

if(isset($_GET['id'])) {
    
    $id = $_GET['id'];

    // Fetch category using MySQLi
    $select = $conn->query("SELECT * FROM servicecenter WHERE center_id='$id'");

    // Check if any category is found
    if ($select->num_rows > 0) {
        $categories = $select->fetch_assoc(); // Fetch category details
    } else {
        // If no category is found, set categories as null and display a message later
        $categories = null;
    }

    // Update category when form is submitted
    if (isset($_POST['submit'])) {
        
        if(empty($_POST['name']) || empty($_POST['image']) || empty($_POST['dimentions'])){
            echo "<script>alert('One or more inputs are empty');</script>";
        } else {
            $name = $_POST['name'];
            $image = $_POST['image'];
            $dimentions = $_POST['dimentions'];

            // Update query using MySQLi
            $update = $conn->prepare("UPDATE categories SET name=?, image=?, dimentions=? WHERE category_id=?");
            $update->bind_param("sssi", $name, $image, $dimentions, $id);

            if ($update->execute()) {
                echo "<script> window.location.href = '".ADMINURL."/categories-admins/show-categories.php'; </script>";
            } else {
                echo "<script>alert('Error updating category');</script>";
            }
        }
    }
}
?>
<!-- header.php -->
<head>
    <link rel="stylesheet" href="update-category.css">
</head>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Update Category</h5>
                <?php if($categories): ?>
                <form method="POST" action="update-category.php?id=<?php echo $id; ?>">
                    <!-- Name input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="name" value="<?php echo $categories['name']; ?>" class="form-control" placeholder="Name" />
                    </div>

                    <!-- Icon input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="image" value="<?php echo $categories['image']; ?>" class="form-control" placeholder="Image" />
                    </div>

                    <!-- Description input -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="dimentions" placeholder="Description" class="form-control" id="dimentions" rows="3"><?php echo $categories['dimentions']; ?></textarea>
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
