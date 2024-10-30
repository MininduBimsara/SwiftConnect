<?php
session_start();
define("APPURL", "http://localhost/SwiftConnect");

$isLoggedIn = isset($_SESSION['user']); // Check if user is logged in
$userName = $isLoggedIn ? $_SESSION['user']['name'] : null; // Assuming 'name' is part of user session data
$userImage = $isLoggedIn ? $_SESSION['user']['image'] : "default-avatar.jpg"; // Use default image if not provided
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwiftConnect – Your Gateway to Seamless Shipping.</title>
    <link rel="stylesheet" href="f1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="../assets/fonts/font-awesome/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <div class="hamburger"><i onclick="showsidebar()" class='bx bx-menu'></i></div>

                    <!-- User Account Section -->
                    <div class="account-section">
                        <?php if ($isLoggedIn): ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle">
                                <div class="avatar-header">
                                    <img src="<?= APPURL ?>/assets/images/<?= $userImage ?>" alt="User Image">
                                </div>
                                <span><?= $userName ?></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Transaction History</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="auth-buttons">
                            <a href="../auth/HTML/login1.php" class="button">Login</a>
                            <a href="../auth/HTML/register.php" class="button">Register</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </nav>
            </div>
        </header>
    </div>

    <script>
    function showsidebar() {
        const sidebar = document.querySelector(".sidebar");
        sidebar.style.display = 'flex';
    }

    function closesidebar() {
        const sidebar = document.querySelector(".sidebar");
        sidebar.style.display = 'none';
    }
    </script>
</body>

</html>