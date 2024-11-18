<?php 
require "../includes/header.php"; 
require "../config/config.php"; 


    if (!isset($_SESSION['username'])) {
        echo "<script> window.location.href ='" . APPURL . "/home.php'; </script>";
        exit(); 
    }

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($id != $_SESSION['user_id']) {
        echo "<script> window.location.href ='".APPURL."'; </script>";
        exit;
    }

    $select = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
    $select->bind_param("i", $id);
    $select->execute();
    $result = $select->get_result();
    $users = $result->fetch_object();

    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $country = $_POST['country'];
        $zip_code = $_POST['zip_code'];
        $phone_number = $_POST['phone_number'];
        $city = $_POST['city'];

        $update = $conn->prepare("UPDATE users SET name = ?, address = ?, city = ?, country = ?, zip_code = ?, phone_number = ? WHERE user_id = ?");
        $update->bind_param("ssssssi", $fullname, $address, $city, $country, $zip_code, $phone_number, $id);
        $update->execute();

        echo "<script> window.location.href ='".APPURL."/home.php'; </script>";
        exit;
    }
} else {
    echo "<script> window.location.href = '".APPURL."/404.php'; </script>";
    exit;
}
?>

<head>
    <link rel="stylesheet" href="setting.css">
    <link rel="stylesheet" href="../includes/header.css">

</head>

<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0 banner-jumbotron">
            <div class="container">
                <h1 class="pt-5">
                    Settings
                </h1>
                <p class="lead">
                    Update Your Account Info
                </p>
            </div>
        </div>
    </div>

    <section id="checkout">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-6">
                    <h5 class="mb-3">ACCOUNT DETAILS</h5>
                    <form action="setting.php?id=<?php echo $id; ?>" method="POST" class="account-form">
                        <fieldset>
                            <div class="form-group row">
                                <div class="col">
                                    <input class="form-control" placeholder="Full Name" name="fullname"
                                        value="<?php echo $users->name; ?>" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Address"
                                    name="address"><?php echo $users->address; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Town / City" type="text" name="city"
                                    value="<?php echo $users->city; ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="State / Country" type="text" name="country"
                                    value="<?php echo $users->country; ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Postcode / Zip" type="text" name="zip_code"
                                    value="<?php echo $users->zip_code; ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Phone Number" type="tel" name="phone_number"
                                    value="<?php echo $users->phone_number; ?>">
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require "../includes/footer.php"; ?>