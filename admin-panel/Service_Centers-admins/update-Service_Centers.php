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
        $service_center = $select->fetch_assoc(); // Fetch category details
    } else {
        // If no category is found, set categories as null and display a message later
        $service_center = null;
    }

    // Update category when form is submitted
    if (isset($_POST['submit'])) {
        
        if(empty($_POST['center_name']) || empty($_POST['country']) || empty($_POST['city']) || empty($_POST['address']) || empty($_POST['contact_number']) || empty($_POST['center_rate'])){
            echo "<script>alert('One or more inputs are empty');</script>";
        } else {
            $center_name = $_POST['center_name'];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $address = $_POST['address'];
            $contact_number = $_POST['contact_number'];
            $center_rate = $_POST['center_rate'];

            // Update query using MySQLi
            $update = $conn->prepare("UPDATE servicecenter SET center_name=?, country=?, city=?, address=?, contact_number=?, center_rate=? WHERE center_id =?");
            $update->bind_param("sssi", $center_name, $country, $city, $address, $contact_number, $center_rate, $center_id);

            if ($update->execute()) {
                echo "<script> window.location.href = '".ADMINURL."/categories-admins/show-Service_Centers.php'; </script>";
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
                <h5 class="card-title mb-5 d-inline">Update Service Center</h5>

                <?php if($service_center): ?>
                <form method="POST" action="update-Service_Centers.php?id=<?php echo $center_id; ?>">
                    <!-- Name input -->
                    <div class="form-outline mb-4 mt-4">
                        <label>Center Name</label>
                        <input type="text" name="name" value="<?php echo $service_center['center_name']; ?>" class="form-control" placeholder="Name" />
                    </div>

                    <!-- country input -->
                    <div class="form-outline mb-4 mt-4">
                        <label>Country</label>
                        <input type="text" name="country" value="<?php echo $service_center['country']; ?>" class="form-control" placeholder="country" />
                    </div>

                    <!-- city input -->
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" value="<?php echo $service_center['city']; ?>" class="form-control" placeholder="city"></input>
                    </div>
                    <!-- Address input -->
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" value="<?php echo $service_center['address']; ?>" class="form-control" rows="3" placeholder="address"></textarea>
                    </div>

                    <!-- contact number input -->
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="contact_number" value="<?php echo $service_center['contact_number']; ?>" class="form-control" placeholder="Contact number"></input>
                    </div>

                    <!-- rate input -->
                    <div class="form-group">
                        <label>Center Rate</label>
                        <input type="text" name="center_rate" value="<?php echo $service_center['center_rate']; ?>" class="form-control" placeholder="Center Rate"></input>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="submit" value="<?php echo $service_center['center_name']; ?>" class="btn btn-primary mb-4">Update</button>
                </form>
                <?php else: ?>
                    <p class="text-danger">Category not found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
