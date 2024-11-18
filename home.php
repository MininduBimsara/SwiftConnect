<?php
session_start();
define("APPURL", "http://localhost/SwiftConnect");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Homepage</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="<?php echo APPURL;?>/assets/fonts/font-awesome/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="includes/footer.css"> -->
    <link rel="stylesheet" href="includes/footer.css?v=1.0">

    <link rel="stylesheet" href="home.css?v=1.1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://kit.fontawesome.com/a295b70770.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">
    <style>
    .dropdown-menu {
        background-color: #ff8000;


    }

    .dropdown-item {
        color: white;
        transition: 1s;
    }

    .dropdown-item:hover {
        background-color: #ff0000;

    }
    </style>


</head>

<body>
    <div class="main-section">
        <header>
            <div class="overlay">
                <nav>
                    <div class="logo-content">

                        <h1><i class="fa-brands fa-nfc-symbol"></i>Swift<span>Connect</span></h1>

                    </div>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="package_management/package_selection.php">Orders</a></li>
                        <li><a href="contact.php">Contact</a></li>

                    </ul>
                    <ul class="sidebar">
                        <li onclick="closesidebar()"><i class='bx bx-x'></i></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="package_management/package_selection.php">Orders</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>

                    <div class="hamburger"><i onclick="showsidebar()" class='bx bx-menu'></i></div>

                    <!-- User Account Section -->
                    <div class="account-section">
                        <?php if (isset($_SESSION['username'])): ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle">
                                <div class="avatar-header">
                                    <img src="<?php echo APPURL;?>/auth/html/user_images/<?php echo $_SESSION['image']; ?>"
                                        alt="User Image">
                                </div>
                                <span><?php echo $_SESSION['username']; ?></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="users/transaction.php?id=<?php echo $_SESSION['user_id']; ?>">Transaction
                                    History</a>
                                <a class="dropdown-item"
                                    href="users/setting.php?id=<?php echo $_SESSION['user_id']; ?>">Settings</a>
                                <a class="dropdown-item" href="auth/HTML/logout.php">Logout</a>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="auth-buttons">
                            <a href="auth/HTML/login1.php" class="button">Login</a>
                            <a href="auth/HTML/register.php" class="button">Register</a>
                        </div>
                        <?php endif; ?>
                    </div>

                </nav>

            </div>
        </header>

        <div class="header-content">
            <div class="wrapper">
                <h1>Your <span>reliable,</span>fast<br>
                    and quality courier<br>
                    service</h1>
                <div class="body-content_paragraph">
                    Deliver your package quickly cheaply and easily only,<br>
                    here,we prioritize the safety of your package
                </div>

                <div class="status">
                    <input type="text" placeholder="Enter customer code" class="input">
                    <button class="check-btn">Check your package status</button>
                </div>
            </div>
        </div>
    </div>

    <section id="section">
        <h1 class="headings">Branding</h1>
        <div class="branding">
            <div class="wrapper">
                <div class="naming">
                    <h1><i class="fa-brands fa-nfc-symbol"></i>Swift<span>Connect</span></h1>
                </div>
                <div class="naming-desc">
                    <p style="color: black;">SwiftConnect is the largest and most experienced Domestic Courier Service
                        Company in the Island handling time sensitive documents and packages for corporate and
                        individual
                        clients for over 34 years. Over the years it has hamessed its dedication and devotion towards
                        the
                        customer concerns. Its services and operational systems are tailor made which could cater to the
                        varying needs of the customers. Speed, Security, Reliability and Accountability are considered
                        paramount in its services afforded to every customer.</p>
                    <div class="icons">
                        <div class="icon">
                            <i class="fas fa-truck"></i>
                            <h2>670+</h2>
                            <h5>Vehicles</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-users"></i>
                            <h2>890+</h2>
                            <h5>Employees</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-business-time"></i>
                            <h2>320+</h2>
                            <h5>Vehicles</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-handshake"></i>
                            <h2>650+</h2>
                            <h5>Vehicles</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="section">
        <div class="gallery">
            <h1 class="headings">Our Services</h1>
            <div class="wrapper">
                <div class="gallery-item">
                    <img src="assets/images/african-american-female-courier-standing-street-with-packages-clipboard-while-making-delivery-city_637285-2054.jpg"
                        alt="Description 1">
                    <div class="description">
                        <h4>Corporate Main Bag Services</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur qui beatae culpa ratione
                            sapiente voluptatibus amet laudantium? Rerum temporibus, corporis eum harum laudantium est
                            dignissimos numquam! Est aspernatur architecto aliquid?</p>
                        <button>VIEW MORE</button>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src=" assets/images/close-up-man-delivering-pack_23-2149103391.jpg" alt="Description 2">
                    <div class="description">
                        <h4>Corporate Main Bag Services</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur qui beatae culpa ratione
                            sapiente voluptatibus amet laudantium? Rerum temporibus, corporis eum harum laudantium est
                            dignissimos numquam! Est aspernatur architecto aliquid?</p>
                        <button>VIEW MORE</button>
                    </div>

                </div>
                <div class="gallery-item">
                    <img src=" assets/images/young-worker-loading-cardboard-boxes-delivery-van-communicating-with-his-colleague_637285-1268.jpg"
                        alt="Description 3">
                    <div class="description">
                        <h4>Corporate Main Bag Services</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur qui beatae culpa ratione
                            sapiente voluptatibus amet laudantium? Rerum temporibus, corporis eum harum laudantium est
                            dignissimos numquam! Est aspernatur architecto aliquid?</p>
                        <button>VIEW MORE</button>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="assets/images/young-delivery-man-holding-packages-while-communicating-mobile-phone-standing-street_637285-1278.jpg"
                        alt="Description 4">
                    <div class="description">
                        <h4>Corporate Main Bag Services</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur qui beatae culpa ratione
                            sapiente voluptatibus amet laudantium? Rerum temporibus, corporis eum harum laudantium est
                            dignissimos numquam! Est aspernatur architecto aliquid?</p>
                        <button>VIEW MORE</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    function showsidebar() {
        const sidebar = document.querySelector(".sidebar")
        sidebar.style.display = 'flex';

    }

    function closesidebar() {
        const sidebar = document.querySelector(".sidebar")
        sidebar.style.display = 'none'
    }
    // Function to toggle dropdown menu visibility
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggle = document.querySelector('.nav-link.dropdown-toggle');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        if (dropdownToggle && dropdownMenu) {
            dropdownToggle.addEventListener('click', function(event) {
                event.preventDefault();
                dropdownMenu.style.display = (dropdownMenu.style.display === 'block') ? 'none' :
                    'block';
            });

            // Close dropdown if clicked outside
            document.addEventListener('click', function(event) {
                if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.style.display = 'none';
                }
            });
        }
    });
    </script>

</body>

</html>


<?php require "includes/footer.php"; ?>