<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal JS SDK Standard Integration</title>
    <link rel="stylesheet" href="paypal.css">
    <link rel="stylesheet" href="../includes/footer.css">
    <link rel="stylesheet" href="../includes/header.css">
</head>
<body>

<?php include "../includes/header.php"; ?>

<div class="container">
    <h1>PAY WITH PAYPAL</h1>
    <h2>Save time and leave the groceries to us!</h2>
    
    <div id="paypal-button-container"></div>
    <p id="result-message"></p>
</div>

<!-- Initialize the JS-SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=AY3C-o8GNXsro2aKEY2LJnEtT0Pnqtr57B6nQeL7aq-6dO2jZmid3lR8QH9kWJ9XweZjd8rJ4tTGkHYS&buyer-country=US&currency=USD&components=buttons&disable-funding=venmo,paylater" data-sdk-integration-source="developer-studio"></script>
<script src="app.js"></script>

<?php include "../includes/footer.php"; ?>

</body>
</html>
