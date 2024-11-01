<?php 
require "../includes/header.php"; 
require "../config/config.php"; 

if (!isset($_SESSION['username'])) {
    echo "<script> window.location.href ='".APPURL."'; </script>";
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($id != $_SESSION['user_id']) {
        echo "<script> window.location.href ='".APPURL."'; </script>";
        exit;
    }

    // Fetch orders for the specific user
    $select = $conn->prepare("SELECT * FROM orders WHERE user_id = ?");
    $select->bind_param("i", $id);
    $select->execute();
    $result = $select->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "<script> window.location.href ='".APPURL."/404.php'; </script>";
    exit;
}
?>

<head>
    <link rel="stylesheet" href="transaction.css">

</head>

<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0 banner-jumbotron">
            <div class="container">
                <h1 class="pt-5">Your Transactions</h1>
                <p class="lead">Save time and leave the groceries to us.</p>
            </div>
        </div>
    </div>

    <section id="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table transaction-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($data) > 0): ?>
                                <?php foreach($data as $order): ?>
                                <tr>
                                    <td><?php echo $order['user_id']; ?></td>
                                    <td><?php echo $order['fname'] . " " . $order['lname']; ?></td>
                                    <td><?php echo $order['created_at']; ?></td>
                                    <td>$<?php echo $order['price']; ?></td>
                                    <td><?php echo $order['status']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center alert-message">
                                        There are no Orders just yet.
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require "../includes/footer.php"; ?>