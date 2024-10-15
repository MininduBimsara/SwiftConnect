<!DOCTYPE html>
<html>

<head>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .package {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .destination {
        margin-bottom: 20px;
    }

    .select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
    }

    .shipping {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .option {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        width: 48%;
        text-align: center;
    }

    .option img {
        width: 100px;
        height: 100px;
        margin-bottom: 10px;
    }

    .option h3 {
        margin-bottom: 10px;
    }

    .option p {
        margin-bottom: 10px;
    }

    .option ul {
        list-style: none;
        padding: 0;
    }

    .option li {
        margin-bottom: 10px;
    }

    .option li::before {
        content: "\2713";
        margin-right: 10px;
        color: #4CAF50;
    }
    </style>


</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Photo</h1>
        </div>
        <div class="package">
            <h2>Package</h2>
        </div>
        <div class="destination">
            <select class="select">
                <option value="">Select Destination</option>
                <option value="usa">USA</option>
                <option value="canada">Canada</option>
                <option value="mexico">Mexico</option>
            </select>
        </div>
        <div class="shipping">
            <div class="option">
                <img src="../assets/images/happy-woman-receiving-food-from-grocery-store-taking-package-from-courier-her-gate-shipping-delivery-service-concept_74855-11832.jpg"
                    alt="Shipping Option 1">
                <h3>Shipping Option 1</h3>
                <p>Fast and reliable shipping</p>
                <ul>
                    <li>Delivered in 3-5 business days</li>
                    <li>Tracking number provided</li>
                    <li>Signature upon delivery</li>
                </ul>
            </div>
            <div class="option">
                <img src="../assets/images/close-up-man-delivering-pack_23-2149103391.jpg" alt="Shipping Option 2">
                <h3>Shipping Option 2</h3>
                <p>Affordable and efficient shipping</p>
                <ul>
                    <li>Delivered in 5-7 business days</li>
                    <li>Tracking number provided</li>
                    <li>No signature upon delivery</li>
                </ul>
            </div>
        </div>
    </div>


</body>

</html>