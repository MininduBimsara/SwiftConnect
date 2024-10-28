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
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="header.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <style>

        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  body {
    font-family: Arial, sans-serif;
  }
  
  /* Navbar */
  nav.navbar {
    background: linear-gradient(135deg, #22313f, #ff8000); /* Gradient background */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    color: white;
    padding: 20px 0;
  }
  
  .navbar .navbar-brand {
    font-size: 24px;
    color: white;
    font-weight: bold;
    margin-left: 20px;
  }
  
  .navbar .navbar-brand span {
    color: #ff0000; /* Change color of specific brand text */
  }
  
  .navbar .nav-link {
    color: white !important;
    font-size: 18px;
    margin-left: 15px;
    transition: color 0.3s ease;
  }
  
  .navbar .nav-link:hover {
    color: #f0a500; /* Hover color for nav links */
  }
  
  .navbar .dropdown-menu {
    background-color: #22313f; /* Dropdown background color */
    border: none;
  }
  
  .navbar .dropdown-item {
    color: white;
  }
  
  .navbar .dropdown-item:hover {
    background-color: #f0a500;
    color: white;
  }
  
  /* Sidebar Menu */
  .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 250px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    display: none;
    flex-direction: column;
    padding: 50px 10px;
    z-index: 999;
  }
  
  .sidebar li {
    padding: 10px;
  }
  
  .sidebar li:hover {
    background-color: #ff8000;
    border-radius: 50px;
    transition: 0.5s;
  }
  
  .sidebar li a {
    color: black;
    text-decoration: none;
    width: 100%;
  }
  
  .sidebar li a:hover {
    color: white;
  }
  
  .hamburger {
    font-size: 30px;
    color: white;
    display: none;
    cursor: pointer;
  }
  
  /* Button */
  button {
    padding: 10px 20px;
    background-color: #ff8000;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
  .log-btn button {
    background-color: #ff8000;
  }
  
  /* Responsive Design */
  @media (max-width: 768px) {
    .navbar .nav-link {
      display: none; /* Hide nav links on mobile */
    }
  
    .hamburger {
      display: block; /* Show hamburger menu */
      color: white;
    }
  
    .sidebar {
      display: flex; /* Display sidebar on small screens */
    }
  }
  
    </style>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarText">
                    <?php if(isset($_SESSION['adminname'])) : ?>
                    <ul class="navbar-nav side-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMINURL; ?>/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMINURL; ?>/admins/admins.php">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMINURL; ?>/categories-admins/show-categories.php">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMINURL; ?>/products-admins/show-products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMINURL; ?>/orders-admins/show-orders.php">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMINURL; ?>/Service_Centers-admins/show-Service_Centers.php">Service Centers</a>
                        </li>
                    </ul>
                    <?php endif; ?>
                    <ul class="navbar-nav ml-md-auto d-md-flex">
                        <?php if(!isset($_SESSION['adminname'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMINURL; ?>/admins/login-admins.php">Login</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                <?php echo $_SESSION['adminname']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo ADMINURL; ?>/admins/logout.php">Logout</a>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
