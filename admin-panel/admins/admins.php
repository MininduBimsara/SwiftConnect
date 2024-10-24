<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
// Check if the admin is logged in
// if (!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
//     exit;
// }

// MySQLi query to get all admins
$query = "SELECT * FROM admins";
$result = $conn->query($query);

// Check if the query returned any results
if ($result->num_rows > 0) {
    $alladmins = $result->fetch_all(MYSQLI_ASSOC); // Fetch all data as an associative array
} else {
    $alladmins = [];
}
?>
<!-- header.php -->
<head>
    <link rel="stylesheet" href="admins.css">
</head>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Admins</h5>
                <a href="<?php echo ADMINURL; ?>/admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Admin Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($alladmins)) : ?>
                            <?php foreach ($alladmins as $admin) : ?>
                                <tr>
                                    <th scope="row"><?php echo $admin['admin_id']; ?></th>
                                    <td><?php echo $admin['name']; ?></td>
                                    <td><?php echo $admin['email']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3" class="text-center">No admins found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
