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
    if (empty($_POST['center_name']) || empty($_POST['country']) || empty($_POST['city']) || empty($_POST['address']) || empty($_POST['contact_number']) || empty($_POST['center_rate'])) {
        echo "<script>alert('One or more inputs are empty');</script>";
    } else {
        $center_name = $_POST['center_name'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $center_rate = $_POST['center_rate'];

        $insert = $conn->prepare("INSERT INTO servicecenter (center_name, country, city, address, contact_number, center_rate) VALUES (?, ?, ?, ?, ?, ?)");
        
        $insert->bind_param("ssssii", $center_name, $country, $city, $address, $contact_number, $center_rate);

        if ($insert->execute()) {
            echo "<script>alert('Record inserted successfully');</script>";
            echo "<script> window.location.href = '".ADMINURL."/Service_Centers-admins/show-Service_Centers.php'; </script>";
        } else {
            echo "<script>alert('Error inserting record');</script>";
        }

        $insert->close();
    }
}

?>
<!-- header.php -->

<head>
    <link rel="stylesheet" href="create-Service_Centers.css">
    <link rel="stylesheet" href="../layouts/header.css">

</head>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Service Centers</h5>
                <form method="POST" action="create-Service_Centers.php" enctype="multipart/form-data">

                    <!-- Center input -->
                    <div class="form-outline mb-4 mt-4">
                        <label>Center Name</label>
                        <input type="text" name="center_name" class="form-control" placeholder="center name" />
                    </div>

                    <!-- country input -->
                    <div class="form-outline mb-4 mt-4">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" placeholder="country" />
                    </div>

                    <!-- city input -->
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" placeholder="city"></input>
                    </div>
                    <!-- Address input -->
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="3" placeholder="address"></textarea>
                    </div>

                    <!-- contact number input -->
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="contact_number" class="form-control"
                            placeholder="Contact number"></input>
                    </div>

                    <!-- rate input -->
                    <div class="form-group">
                        <label>Center Rate</label>
                        <input type="text" name="center_rate" class="form-control" placeholder="Center Rate"></input>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary mb-4">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>