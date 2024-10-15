<?php



require "../../config/config.php";  


if (isset($_SESSION['username'])) {
    echo "<script> window.location.href ='" . APPURL . "'; </script>";
}

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "<script>alert('One or more inputs are empty');</script>";
    } else {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        $login = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $login->bind_param("s", $email);
        $login->execute();
        $result = $login->get_result();

        if ($result->num_rows > 0) {
            $fetch = $result->fetch_assoc();

            if (password_verify($password, $fetch['mypassword'])) {
                $_SESSION['username'] = $fetch['username'];
                $_SESSION['email'] = $fetch['email'];
                $_SESSION['user_id'] = $fetch['id'];
                $_SESSION['image'] = $fetch['image'];
                echo "<script> window.location.href ='" . APPURL . "'; </script>";
            } else {
                echo "<script>alert('Email or password is wrong');</script>";
            }
        } else {
            echo "<script>alert('Email or password is incorrect');</script>";
        }

        $login->close();
    }
}
?>

<?php 

include "../../includes/header.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../../includes/footer.css">
    <link rel="stylesheet" href="../../includes/header.css">
    <link rel="stylesheet" href="../CSS/login.css">
</head>


<body>
    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg" style="background-image: url('');">
                <div class="container">
                    <h1 class="pt-5">LOGIN</h1><br>

                    <div class="card card-login mb-5">
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="login.php">
                                <!-- Email Field -->
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="email" type="text" required=""
                                            placeholder="Email">
                                    </div>
                                </div>

                                <!-- Password Field -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="password" type="password" required=""
                                            placeholder="Password">
                                    </div>
                                </div>

                                <!-- Remember Me and Forgot Password -->
                                <div class="form-group row remember-forgot">
                                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                                        <div class="checkbox">
                                            <input id="checkbox0" type="checkbox" name="remember">
                                            <label for="checkbox0" class="mb-0"> Remember Me? </label>
                                        </div>
                                        <a href="login.html" class="forgot-password-link">
                                            <i class="fa fa-lock"></i> Forgot password?</a>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group row text-center mt-4">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="butn btn-primary">LOGIN</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include "../../includes/footer.php";
?>