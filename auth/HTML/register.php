<?php
    include_once "../../config/config.php";
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['username']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            echo "<script>alert('One or more inputs are empty');</script>";
        } else {
            if ($_POST['password'] == $_POST['confirm_password']) {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password_hashed = password_hash($password, PASSWORD_DEFAULT);

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
                            $insert_query = "INSERT INTO users (username, name, email, password, image) 
                                            VALUES ('$username', '$name', '$email', '$password_hashed', '$image')";
                            $result_insert = mysqli_query($conn, $insert_query);
                            if($result_insert) {
                                echo "<script>window.location.href = 'login.php';</script>";
                            } else {
                                echo "<script>alert('Failed to create account.');</script>";
                            }

                        } else {
                            echo "<script>alert('Failed to upload image.');</script>";
                        }
                    }
                }

            } else {
                echo "<script>alert('Passwords do not match!');</script>";
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
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="../../includes/header.css">
    <link rel="stylesheet" href="../../includes/footer.css">
<<<<<<< HEAD
   
    
=======
>>>>>>> 69f9663f2f78baba8a3cd0eb460883fd542f8097

</head>

<body>

    <?php include_once "../../includes/header.php"; ?>

    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0"
                style="background-image: url('<?php echo APPURL;?>/assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Register Page
                    </h1>
                    <p class="lead">
                        Create a new account
                    </p>

                    <div class="card card-login mb-5">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="register.php" enctype="multipart/form-data">
                                <!-- Full Name Input -->
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
<<<<<<< HEAD
                                        
                                        <input class="form-control" name="fullname" type=" text" required="" 
=======
                                        <input class="form-control" name="name" type="text" required=""
>>>>>>> 69f9663f2f78baba8a3cd0eb460883fd542f8097
                                            placeholder="Full Name">
                                    </div>
                                </div>

                                <!-- Email Input -->
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="email" type="email" required=""  
                                            placeholder="Email">
                                    </div>
                                </div>

                                <!-- Username Input -->
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="username" type="text" required=""
                                            placeholder="Username">
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

                                <!-- Image Upload Input -->
                                <div class="form-group row file-upload-wrapper">
                                    <div class="col-md-12">
                                        <label for="image" class="file-upload-label file-upload-text">Upload profile image</label>
                                        <input class="form-control file-upload-input" name="image" type="file" required="">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group row text-center mt-4">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit"
                                            class="btn btn-primary btn-block text-uppercase">Register</button>
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

</body>
</html>
