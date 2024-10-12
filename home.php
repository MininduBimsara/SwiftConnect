<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Homepage</title>
    <link rel="stylesheet" href="home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="<?php echo APPURL;?>/assets/fonts/font-awesome/font-awesome.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <div class="overlay">
            <nav>
                <h1>My Website</h1>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>

                </ul>
                <li class="hamburger"><i class='bx bx-menu'></i></li>
                <button class="btn">login</button>
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

                <button class="Check-btn">Check your package status</button>
            </div>

        </div>
    </div>
    </div>
    <?php require "includes/footer.php"; ?>
</body>

</html>