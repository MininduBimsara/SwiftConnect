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
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .reset-container {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    .reset-container h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .reset-container input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .reset-container button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
    }

    .reset-container button:hover {
        background-color: #0056b3;
    }

    .reset-container .back-link {
        text-align: center;
        display: block;
        margin-top: 10px;
        color: #007bff;
        text-decoration: none;
    }

    .reset-container .back-link:hover {
        text-decoration: underline;
    }
    </style>

    <link rel="stylesheet" href="../../includes/footer.css">
    <link rel="stylesheet" href="../../includes/header.css">
</head>

<body>
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
</body>

</html>