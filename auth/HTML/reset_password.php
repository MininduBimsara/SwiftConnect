<?php

include "../../includes/header.php";
require "../../config/config.php";

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['new_password']) || empty($_POST['confirm_password'])) {
        echo "<script>alert('All fields are required');</script>";
    } else {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format');</script>";
            exit();
        }

        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Check if passwords match
        if ($new_password !== $confirm_password) {
            echo "<script>alert('Passwords do not match');</script>";
        } else {
            // Encrypt the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password in the database
            $query = "UPDATE users SET password = ? WHERE email = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'ss', $hashed_password, $email);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo "<script>alert('Password updated successfully!'); window.location.href='login1.php';</script>";
            } else {
                echo "<script>alert('Email not found or an error occurred');</script>";
            }

            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <link rel="stylesheet" href="../../includes/footer.css">
    <link rel="stylesheet" href="../CSS/reset_password.css">
    <link rel="stylesheet" href="../../includes/header.css">
</head>

<body>
    <!-- Centered Reset Form -->
    <div class="wrapper">
        <div class="reset-container">
            <h1>Reset Password</h1>
            <form method="post" action="">
                <!-- Email Field -->
                <input type="email" name="email" placeholder="Enter your email" required>

                <!-- New Password Field -->
                <input type="password" name="new_password" placeholder="Enter new password" required>

                <!-- Confirm Password Field -->
                <input type="password" name="confirm_password" placeholder="Confirm new password" required>

                <!-- Submit Button -->
                <button type="submit" name="submit">Submit Password</button>

                <!-- Back to Login -->
                <a href="login1.php" class="back-link">Back to Login</a>
            </form>
        </div>
    </div>
</body>

</html>