<?php
require "../config/config.php";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $source_country = $_POST['source_country'];
//     $destination_country = $_POST['destination_country'];
//     $weight = $_POST['weight'];

//     $sql = "SELECT price FROM rates WHERE source_country='$source_country' AND destination_country='$destination_country' AND weight_range>='$weight' LIMIT 1";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         echo "Rate: $" . $row['price'];
//     } else {
//         echo "No rate available.";
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rate Calculation</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
    }

    button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Calculate Rate</h2>
        <form method="post" action="rate.php">
            <input type="text" name="source_country" placeholder="Source Country" required>
            <input type="text" name="destination_country" placeholder="Destination Country" required>
            <input type="number" name="weight" placeholder="Weight (kg)" required>
            <button type="submit">Calculate Rate</button>
        </form>
        <div id="rate"></div>
    </div>
    <script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('rate.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('rate').innerText = data;
            });
    });
    </script>
</body>

</html>