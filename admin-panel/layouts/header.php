<?php
    session_start();
    define("ADMINURL", "http://localhost/SwiftConnect/admin-panel");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="unique-header.css" rel="stylesheet">
</head>

<body>
    <div id="unique-wrapper">
        <nav class="custom-navbar top-nav fixed-top navbar-expand-lg dark-bg">
            <div class="unique-container">
                <a class="unique-brand" href="#">LOGO</a>
                <button class="unique-toggler" type="button" data-toggle="collapse" data-target="#unique-navbarText"
                    aria-controls="unique-navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="unique-toggler-icon">&#9776;</span>
                </button>

                <div class="unique-collapse navbar-collapse" id="unique-navbarText">
                    <?php if(isset($_SESSION['adminname'])) : ?>
                    <ul class="unique-nav">
                        <li class="nav-item">
                            <a class="unique-link" href="<?php echo ADMINURL; ?>/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="unique-link" href="<?php echo ADMINURL; ?>/admins/admins.php">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="unique-link"
                                href="<?php echo ADMINURL; ?>/categories-admins/show-categories.php">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="unique-link"
                                href="<?php echo ADMINURL; ?>/products-admins/show-products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="unique-link"
                                href="<?php echo ADMINURL; ?>/orders-admins/show-orders.php">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="unique-link"
                                href="<?php echo ADMINURL; ?>/Service_Centers-admins/show-Service_Centers.php">Service
                                Centers</a>
                        </li>
                    </ul>
                    <?php endif; ?>
                    <ul class="ml-md-auto d-md-flex">
                        <?php if(!isset($_SESSION['adminname'])) : ?>
                        <li class="nav-item">
                            <a class="unique-link" href="<?php echo ADMINURL; ?>/admins/login-admins.php">Login</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="unique-dropdown-toggle" href="#" id="unique-navbarDropdown" role="button"
                                onclick="toggleDropdown()">
                                <?php echo $_SESSION['adminname']; ?>
                            </a>
                            <div class="unique-dropdown-menu" id="dropdownMenu">
                                <a class="unique-dropdown-item"
                                    href="<?php echo ADMINURL; ?>/admins/logout.php">Logout</a>
                            </div>
                        </li>

                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">

        </div>
    </div>
    <script>
    function toggleDropdown() {
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    }

    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('unique-navbarDropdown');
        const menu = document.getElementById('dropdownMenu');
        if (!dropdown.contains(event.target)) {
            menu.style.display = 'none';
        }
    });
    </script>
</body>

</html>