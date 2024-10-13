<?php
require "../config/config.php";
session_start();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $user_id = $_SESSION['user_id'];
//     $source_country = $_POST['source_country'];
//     $destination_country = $_POST['destination_country'];
//     $weight = $_POST['weight'];
//     $status = 'pending';

//     $sql = "INSERT INTO packages (user_id, source_country, destination_country, weight, status) VALUES ('$user_id', '$source_country', '$destination_country', '$weight', '$status')";

//     if ($conn->query($sql) === TRUE) {
//         echo "Package created successfully!";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

// // Fetch packages
// $user_id = $_SESSION['user_id'];
// $sql = "SELECT * FROM packages WHERE user_id='$user_id'";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo "<tr><td>" . $row['source_country'] . "</td><td>" . $row['destination_country'] . "</td><td>" . $row['weight'] . "</td><td>" . $row['status'] . "</td></tr>";
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Package Management</title>
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
    input[type="number"],
    select {
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

    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Manage Packages</h2>
        <form method="post" action="package.php">
            <input type="text" name="source_country" placeholder="Source Country" required>
            <input type="text" name="destination_country" placeholder="Destination Country" required>
            <input type="number" name="weight" placeholder="Weight (kg)" required>
            <button type="submit">Create Package</button>
        </form>
        <h2>Your Packages</h2>
        <table>
            <thead>
                <tr>
                    <th>Source Country</th>
                    <th>Destination Country</th>
                    <th>Weight</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Populate with PHP -->
            </tbody>
        </table>
    </div>
</body>

</html>