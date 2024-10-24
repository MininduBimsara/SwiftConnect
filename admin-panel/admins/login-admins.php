<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

// Redirect to admin dashboard if already logged in
// if (isset($_SESSION['adminname'])) {
//     echo "<script> window.location.href ='".ADMINURL."'; </script>";
//     exit;
// }

// Handle form submission
if (isset($_POST['submit'])) {
    // Check if email or password is empty
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "<script>alert('One or more inputs are empty');</script>";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // MySQLi query to find admin by email
        $query = "SELECT * FROM admins WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Validate email and password
        if ($result->num_rows > 0) {
            $fetch = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $fetch['mypassword'])) {
                $_SESSION['adminname'] = $fetch['adminname'];
                $_SESSION['email'] = $fetch['email'];
                $_SESSION['admin_id'] = $fetch['id'];

                // Redirect to admin dashboard
                echo "<script> window.location.href ='".ADMINURL."'; </script>";
            } else {
                echo "<script>alert('Email or password is wrong');</script>";
            }
        } else {
            echo "<script>alert('Email or password is wrong');</script>";
        }

        $stmt->close();
    }
}

?>
<!-- header.php -->
<head>
    <link rel="stylesheet" href="login-admins.css">
</head>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mt-5">Login</h5>
                <form method="POST" action="login-admins.php">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" class="form-control" placeholder="Email" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
