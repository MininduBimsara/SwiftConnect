<?php 
require "../layouts/header.php"; 
require "../../config/config.php"; 

// if(!isset($_SESSION['adminname'])){
//     echo "<script> window.location.href ='".ADMINURL."/admins/login-admins.php'; </script>";
// }

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Fetch the order details
    $query = $conn->query("SELECT * FROM orders WHERE id='$id'");
    $order = $query->fetch_assoc();

    if (isset($_POST['submit'])) {
        if(empty($_POST['status'])){
            echo "<script>alert('Please select an order status.');</script>";
        } else {
            $status = $_POST['status'];

            // Update the order status
            $update = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
            $update->bind_param("si", $status, $id);
            $update->execute();

            echo "<script> window.location.href = '".ADMINURL."/orders-admins/show-orders.php'; </script>";
        }
    }
}

?>
<!-- header.php -->

<head>
    <link rel="stylesheet" href="update-orders.css">
    <link rel="stylesheet" href="../layouts/header.css">

</head>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Update Order Status</h5>
                <form method="POST" action="update-orders.php?id=<?php echo $id; ?>">
                    <div class="form-group mt-4">
                        <select name="status" class="form-control" id="exampleFormControlSelect1">
                            <option>--Select Order Status--</option>
                            <option value="In progress"
                                <?php echo $order['status'] == 'In progress' ? 'selected' : ''; ?>>In progress</option>
                            <option value="Delivered" <?php echo $order['status'] == 'Delivered' ? 'selected' : ''; ?>>
                                Delivered</option>
                        </select>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require "../layouts/footer.php"; ?>