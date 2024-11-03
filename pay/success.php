<?php 
// if(!isset($_SERVER['HTTP_REFERER'])){
//     // Redirect if accessed directly
//     header('location: http://localhost/Freshcery/index.php');
//     exit;
// }
?>

<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if(!isset($_SESSION['username'])){
    echo "<script> window.location.href ='".APPURL."'; </script>";
}

// if(isset($_SESSION['user_id'])){
//     $delete = $conn->prepare("DELETE FROM cart WHERE user_id = '$_SESSION[user_id]'");
//     $delete->execute();
// }
?>



<head>

    <link rel="stylesheet" href="<?php echo APPURL; ?>/pay/success.css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/includes/header.css">

</head>

<div class="banner">
    <div class="jumbotron jumbotron-bg text-center rounded-0">
        <div class="container">
            <h1 class="pt-5">
                Payment has been a success
            </h1>
            <p class="lead">
                Save time and leave Your Packages to us.
            </p>
            <a href="<?php echo APPURL; ?>/home.php" class="btn btn-primary text-uppercase">Home</a>
        </div>
    </div>
</div>

<?php require "../includes/footer.php"; ?>