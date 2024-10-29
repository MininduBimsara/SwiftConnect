<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 
// Check if admin is logged in
// if (!isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
//     exit;
// }

// Handle form submission
if (isset($_POST['submit'])) {
    // Check if any input is empty
    if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['adminname'])) {
        echo "<script>alert('One or more inputs are empty');</script>";
    } else {
        // Get form values
        $email = $_POST['email'];
        $adminname = $_POST['adminname'];
        $password = $_POST['password'];

        // Insert data into MySQL using MySQLi
        $query = "INSERT INTO admins (email, name, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $email, $adminname, $hashedPassword);
        
        if ($stmt->execute()) {
            // Redirect to the admins page
            echo "<script> window.location.href = '".ADMINURL."/admins/admins.php'; </script>";
        } else {
            echo "<script>alert('Error creating admin');</script>";
        }

        $stmt->close();
    }
}
?>
<!-- header.php -->

<head>
    <link rel="stylesheet" href="create-admins.css">
    <link rel="stylesheet" href="../layouts/header.css">

</head>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Admins</h5>
                <form method="POST" action="create-admins.php">
                    <!-- Email input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                    </div>

                    <!-- Admin Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="adminname" id="form2Example2" class="form-control"
                            placeholder="Admin Name" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example3" class="form-control"
                            placeholder="Password" />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>