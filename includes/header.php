<?php
session_start();
define("APPURL", "http://localhost/SwiftConnect");

$isLoggedIn = isset($_SESSION['user']); // Check if user is logged in
$userName = $isLoggedIn ? $_SESSION['user']['name'] : "Guest";
$userImage = $isLoggedIn && isset($_SESSION['user']['image']) ? $_SESSION['user']['image'] : "default-avatar.jpg"; // Use default image if not provided
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwiftConnect – Your Gateway to Seamless Shipping.</title>
    <!-- <link rel="stylesheet" href="../includes/header.css?v=1.0"> -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/fonts/font-awesome/font-awesome.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a295b70770.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="main-section">
        <header>
            <div class="overlay">
                <nav>
                    <div class="logo-content">
                        <h1><i class="fa-brands fa-nfc-symbol"></i> Swift<span>Connect</span></h1>
                    </div>
                    <ul class="nav-links">
                        <li><a href="<?php echo APPURL;?>/home.php">Home</a></li>
                        <li><a href="<?php echo APPURL;?>/about.php">About</a></li>
                        <li><a href="<?php echo APPURL;?>/package_management/package_selection.php">Orders</a></li>
                        <li><a href="<?php echo APPURL;?>/contact.php">Contact</a></li>
                    </ul>

                    <!-- Hamburger icon for mobile -->
                    <div class="hamburger" onclick="showsidebar()"><i class='bx bx-menu'></i></div>

                    <!-- User Account Section -->
                    <div class="account-section">
                        <?php if (isset($_SESSION['username'])): ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="dropdown-toggle">
                                <div class="avatar-header">
                                    <img src="<?php echo APPURL;?>/auth/html/user_images/<?php echo $_SESSION['image']; ?>"
                                        alt="User Image">
                                </div>
                                <span id="username"><?php echo $_SESSION['username']; ?></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="<?php echo APPURL;?>/users/transaction.php?id=<?php echo $_SESSION['user_id']; ?>">Transaction
                                    History</a>
                                <a class="dropdown-item"
                                    href="<?php echo APPURL;?>/users/setting.php?id=<?php echo $_SESSION['user_id']; ?>">Settings</a>
                                <a class="dropdown-item" href="<?php echo APPURL;?>/auth/HTML/logout.php">Logout</a>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="auth-buttons">
                            <a href="<?php echo APPURL;?>/auth/HTML/login1.php" class="button">Login</a>
                            <a href="<?php echo APPURL;?>/auth/HTML/register.php" class="button register">Register</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </nav>

                <!-- Sidebar for mobile -->
                <ul class="sidebar">
                    <li onclick="closesidebar()"><i class='bx bx-x'></i></li>
                    <li><a href="<?php echo APPURL;?>/home.php">Home</a></li>
                    <li><a href="<?php echo APPURL;?>/about.php">About</a></li>
                    <li><a href="<?php echo APPURL;?>/package_management/package_selection.php">Orders</a></li>
                    <li><a href="#">Contact</a></li>

                    <!-- <?php if (!$isLoggedIn): ?>
                    <li><a href="<?php echo APPURL;?>/auth/HTML/login1.php">Login</a></li>
                    <li><a href="<?php echo APPURL;?>/auth/HTML/register.php">Register</a></li>
                    <?php endif; ?> -->
                </ul>
            </div>
        </header>
    </div>

    <!-- JavaScript for Sidebar Toggle -->
    <script>
    // JavaScript for Sidebar Toggle
    document.addEventListener("DOMContentLoaded", function() {
        const hamburger = document.querySelector(".hamburger");
        const sidebar = document.querySelector(".sidebar");
        const closeBtn = sidebar.querySelector(".bx-x");

        function toggleSidebar() {
            sidebar.classList.toggle("active");
        }

        // Toggle sidebar when the hamburger icon is clicked
        hamburger.addEventListener("click", toggleSidebar);

        // Close sidebar when the close button inside sidebar is clicked
        closeBtn.addEventListener("click", toggleSidebar);
    });
    </script>
</body>

</html>