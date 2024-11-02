<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal JS SDK Standard Integration</title>
    <link rel="stylesheet" href="pay.css">
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

    <div class="container">
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script
            src="https://www.paypal.com/sdk/js?client-id=AY3C-o8GNXsro2aKEY2LJnEtT0Pnqtr57B6nQeL7aq-6dO2jZmid3lR8QH9kWJ9XweZjd8rJ4tTGkHYS&currency=USD">
        </script>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script>
        const totalPrice = new URLSearchParams(window.location.search).get('total_price') || '0';
        console.log('Total Price:', totalPrice);
        paypal.Buttons({
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: parseFloat(totalPrice).toFixed(2) // Use dynamic total price here
                        }
                    }]
                });
            },
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    window.alert("Order Created successfully");
                    window.location.href =
                        ' http://localhost/SwiftConnect/home.php'; // Redirect after payment
                });
            }
        }).render('#paypal-button-container');
        </script>

    </div>
    </div>
    </div>

    <?php include "../includes/footer.php"; ?>

    <body>

</html>