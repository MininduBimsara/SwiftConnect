<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];

    $sql = "INSERT INTO service_centers (country, city, address, contact_number) VALUES ('$country', '$city', '$address', '$contact_number')";

    if ($conn->query($sql) === TRUE) {
        echo "Service center added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch service centers
$sql = "SELECT * FROM service_centers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['country'] . "</td><td>" . $row['city'] . "</td><td>" . $row['address'] . "</td><td>" . $row['contact_number'] . "</td></tr>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Service Centers</title>

</head>

<body>
    <div class="container">
        <h2>Service Centers</h2>
        <form method="post" action="service_centers.php">
            <input type="text" name="country" placeholder="Country" required>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="address" placeholder="Address" required>
            <input type="text" name="contact_number" placeholder="Contact Number" required>
            <button type="submit">Add Service Center</button>
        </form>
        <h2>Available Service Centers</h2>
        <table>
            <thead>
                <tr>
                    <th>Country</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                </tr>
            </thead>
            <tbody>
                <!-- Populate with PHP -->
            </tbody>
        </table>
    </div>
</body>

</html>