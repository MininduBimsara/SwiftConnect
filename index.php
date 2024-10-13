<?php

define("APPURL" , "http://localhost/SwiftConnect");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo APPURL;?>/assets/fonts/font-awesome/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="<?php echo APPURL;?>/assets/fonts/sb-bistro/sb-bistro.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://localhost/SwiftConnect/index.css">
    <link rel="stylesheet" href="includes/footer.css">
</head>

<body>
    <header class="header">
        <h1>SwiftConnect Dashboard</h1>
        <nav>
            <ul>
                <li><a href="#package-management">Package Management</a></li>
                <li><a href="#service-centers">Service Centers</a></li>
                <li><a href="#payments">Payments</a></li>
                <li><a href="#logout">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="widgets">
            <div class="widget">
                <h2>Pending Packages</h2>
                <p>5</p>
            </div>
            <div class="widget">
                <h2>Recent Activities</h2>
                <ul>
                    <li>Package #12345 shipped to Korea</li>
                    <li>Package #67890 delivered to Sri Lanka</li>
                    <li>Rate updated for Tokyo region</li>
                </ul>
            </div>
            <div class="widget">
                <h2>Notifications</h2>
                <ul>
                    <li>New service center added in Seoul</li>
                    <li>System maintenance scheduled</li>
                </ul>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>