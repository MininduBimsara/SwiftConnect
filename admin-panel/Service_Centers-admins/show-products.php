<?php 
require "../layouts/header.php"; 
require "../../config/config.php"; 

// Check if admin is logged in
// if (!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href = '".ADMINURL."/admins/login-admins.php'; </script>";
// }

// Fetch products using MySQLi
$service_center = $conn->query("SELECT * FROM servicecenter");
?>
<!-- header.php -->
<head>
    <link rel="stylesheet" href="show-products.css">
</head>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Service Centers</h5>
                <a href="<?php echo ADMINURL; ?>/Service_Centers-admins/create-products.php" class="btn btn-primary mb-4 text-center float-right">Create Products</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Country</th>
                            <th scope="col">City</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Rate</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($center = $service_center->fetch_assoc()): ?>
                        <tr>
                            <th scope="row"><?php echo $center['center_id']; ?></th>
                            <td><?php echo $center['center_name']; ?></td>
                            <td><?php echo $center['country']; ?></td>
                            <td><?php echo $center['city']; ?></td>
                            <td>
                                <?php echo $center['address']; ?>
                            </td>
                            <td>
                                <?php echo $center['contact_number']; ?>
                            </td>
                            <td>
                                <?php echo $center['center_rate']; ?>
                            </td>
                            <td>
                                <a href="<?php echo ADMINURL; ?>/Service_Centers-admins/delete-products.php?id=<?php echo $center['center_id']; ?>" 
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
