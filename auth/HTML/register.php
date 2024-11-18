<?php include_once "../../includes/header.php"; ?>
<?php
    include_once "../../config/config.php";

    if (isset($_POST['submit'])) {
        $errors = [];

        // Check if fields are empty
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['username']) || empty($_POST['country']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            $errors[] = "All fields are required.";
        }

        // Validate name (letters only)
        if (!preg_match("/^[a-zA-Z\s]+$/", $_POST['name'])) {
            $errors[] = "Name must contain only letters.";
        }

        // Validate username (letters only)
        if (!preg_match("/^[a-zA-Z]+$/", $_POST['username'])) {
            $errors[] = "Username must contain only letters.";
        }

        // Validate email
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        // Check if passwords match
        if ($_POST['password'] !== $_POST['confirm_password']) {
            $errors[] = "Passwords do not match.";
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<script>alert('$error');</script>";
            }
        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            $country = $_POST['country'];

            // Check if username or email already exists
            $check_user_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            $result = mysqli_query($conn, $check_user_query);

            if (mysqli_num_rows($result) > 0) {
                echo "<script>alert('Username or email already exists!');</script>";
            } else {
                // Image upload
                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                $image_folder = "user_images/" . $image;
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

                $image_ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

                if (!in_array($image_ext, $allowed_extensions)) {
                    echo "<script>alert('Invalid image format. Only jpg, jpeg, png, and gif are allowed.');</script>";
                } else {
                    // Move image
                    if (move_uploaded_file($image_tmp, $image_folder)) {

                        // Insert user data into the database
                    $insert_query = "INSERT INTO users (username, name, email, password, country, image) 
                                    VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($insert_query);
                    $stmt->bind_param("ssssss", $username, $name, $email, $password_hashed, $country, $image); // Bind parameters
                    
                    if ($stmt->execute()) {
                            echo "<script>window.location.href = 'login1.php';</script>";
                        } else {
                            echo "<script>alert('Failed to create account.');</script>";
                        }
                    } else {
                        echo "<script>alert('Failed to upload image.');</script>";
                    }
                }
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../CSS/register.css">
    <link rel="stylesheet" href="../../includes/header.css">
    <link rel="stylesheet" href="../../includes/footer.css">
</head>

<body>
    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0"
                style="background-image: url('<?php echo APPURL;?>/assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">Register Page</h1>
                    <p class="lead">Create a new account</p>
                    <div class="card card-login mb-5">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="register.php"
                                enctype="multipart/form-data">
                                <!-- Full Name Input -->
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="name" type="text" required=""
                                            placeholder="Full Name">
                                        <span class="error-text" id="name-error"></span>
                                    </div>
                                </div>

                                <!-- Email Input -->
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="email" type="email" required=""
                                            placeholder="Email">
                                        <span class="error-text" id="email-error"></span>
                                    </div>
                                </div>

                                <!-- Username Input -->
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="username" type="text" required=""
                                            placeholder="Username">
                                        <span class="error-text" id="username-error"></span>
                                    </div>
                                </div>

                                <!-- Password Input -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="password" type="password" required=""
                                            placeholder="Password">
                                    </div>
                                </div>

                                <!-- Confirm Password Input -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="confirm_password" type="password" required=""
                                            placeholder="Confirm Password">
                                    </div>
                                </div>

                                <!-- Country Input -->
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="country" type="text" required=""
                                            placeholder="Country">
                                    </div>
                                </div>

                                <!-- Image Upload Input -->
                                <div class="form-group row file-upload-wrapper">
                                    <div class="col-md-12">
                                        <label for="image" class="file-upload-label file-upload-text">Upload profile
                                            image</label>
                                        <input class="form-control file-upload-input" name="image" type="file"
                                            required="">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group row text-center mt-4">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="butn btn-primary">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "../../includes/footer.php"; ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("form");
        const nameInput = document.querySelector("input[name='name']");
        const usernameInput = document.querySelector("input[name='username']");
        const emailInput = document.querySelector("input[name='email']");

        const nameError = document.getElementById("name-error");
        const usernameError = document.getElementById("username-error");
        const emailError = document.getElementById("email-error");

        nameInput.addEventListener("input", function() {
            if (!/^[a-zA-Z\s]+$/.test(nameInput.value)) {
                nameError.textContent = "Name must contain only letters.";
            } else {
                nameError.textContent = "";
            }
        });

        usernameInput.addEventListener("input", function() {
            if (!/^[a-zA-Z]+$/.test(usernameInput.value)) {
                usernameError.textContent = "Username must contain only letters.";
            } else {
                usernameError.textContent = "";
            }
        });

        emailInput.addEventListener("input", function() {
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
                emailError.textContent = "Invalid email format.";
            } else {
                emailError.textContent = "";
            }
        });
    });
    </script>
</body>

</html>