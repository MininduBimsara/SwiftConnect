



<?php require "../../config/config.php"; ?>
<?php

    //  define("APPURL" , "http://localhost/SwiftConnect");


    // if(isset($_SESSION['username'])){
        
    //     echo "<script> window.location.href ='".APPURL."'; </script>";     
        
    // }
    
    if (isset($_POST['submit'])) {
        if(empty($_POST['fullname']) OR empty($_POST['email']) OR empty($_POST['password']) OR empty($_POST['username'])){
            echo "<script>alert('one or more inputs are empty');</script>";
        }
        else{

            if($_POST['password'] == $_POST['confirm_password']){
                
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $username = $_POST['username'];                     
            $password = $_POST['password'];         
            $image = "user.png";                                                      

            $insert = $conn->prepare("INSERT INTO users(fullname, email, username, mypassword, image) VALUES
            (:fullname, :email, :username, :mypassword, :image)");
            
            $insert->execute([
                ":fullname" => $fullname,
                ":email" => $email,
                ":username" => $username,
                ":mypassword" => password_hash($password, PASSWORD_DEFAULT),
                ":image" => $image
               
            ]);

            // header("location: ".APPURL."/login.php");

            echo "<script> window.location.href = 'login.php'; </script>";
            
            }else{
            echo "<script>alert('password doesn't match!!!');</script>";
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
    
    <link rel="stylesheet" href="../../includes/header.css">
    <link rel="stylesheet" href="../CSS/register.css">
    <link rel="stylesheet" href="../../includes/footer.css">
   
    

</head>

<body>
<?php require "../../includes/header.php"; ?>

    <!-- stepping back to grab the includes folder-->
    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0"
                style="background-image: url('<?php echo APPURL;?>/assets/img/bg-header.jpg');">
                <div class="container">
                   

                    <div class="card card-login mb-5">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="register.php">
                               
                                 <div class="head">
                                    <h1>Register</h1>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        
                                        <input class="form-control" name="fullname" type=" text" required="" 
                                            placeholder="Full Name">
                                    </div>
                                </div>
                              
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="email" type="email" required=""  
                                            placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="username" type="text" required=""
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="password" type="password" required=""
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="confirm_password" type="password" required=""
                                            placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <div class="col-md-12">
                                        <div class="checkbox">
                                            <input id="checkbox0" type="checkbox" name="terms">
                                            <label for="checkbox0" class="mb-0">I Agree with <a href="terms.html"
                                                    class="text-light">Terms & Conditions</a> </label>
                                        </div>
                                    </div> 
                                </div>
                                
                                   <div class="btnn">
                                       <button>register</button>
                                   </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require "../../includes/footer.php"; ?>

</body>

</html>