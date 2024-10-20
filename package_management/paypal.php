<!-- This is a comment 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="paypal.css">
    <link rel="stylesheet" href="../includes/footer.css">
    <link rel="stylesheet" href="../includes/header.css">
</head>
<body>

    <div class="container">
        <h1>PAY WITH PAYPAL</h1>
        <h2>Save time and leave the groceries to us!</h2>
        <button type="button" name="paypal" id="paypal">PayPal</button><br>
        <button type="button" name="credit" id="paypal">Debit or Credit Card</button>
        
        <div id="paypal-button-container"></div>
        <p id="result-message"></p>
    </div><br>


<script src="https://www.paypal.com/sdk/js?client-id=test&buyer-country=US&currency=USD&components=buttons&enable-funding=venmo,paylater,card"
            data-sdk-integration-source="developer-studio"></script>
        
<script src="app.js"></script>
-->
<?php
include "../includes/header.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PayPal JS SDK Standard Integration</title>
        <link rel="stylesheet" href="paypal.css">
    <link rel="stylesheet" href="../includes/footer.css">
    <link rel="stylesheet" href="../includes/header.css">

    </head>
    <body>
<div class="container">
    <h1>PAY WITH PAYPAL</h1>
    <h2>Save time and leave the groceries to us!</h2>
  
        
        <div id="paypal-button-container"></div>
        <p id="result-message"></p>
        </div>
        
        <!-- Initialize the JS-SDK -->
        <script
            src="https://www.paypal.com/sdk/js?client-id=test&buyer-country=US&currency=USD&components=buttons&enable-funding=venmo,paylater,card"
            data-sdk-integration-source="developer-studio"
        ></script>
        <script src="app.js"></script>
        
    <?php
include "../includes/footer.php";
?>
    </body>
</html>