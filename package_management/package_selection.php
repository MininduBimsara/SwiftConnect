<?php include_once '../includes/header.php'; ?>
<?php
include_once '../config/config.php';

if (isset($_POST['submit'])) {
    $destination = $_POST['destination'];
    $weight_range = $_POST['weight_range'];
    $selected_package = $_POST['selected_package'];

    $total_price = $_POST['total_price'] ?? 0;
    echo "<script> window.location.href ='" . APPURL . "/package_management/delivery_details.php?total_price=$total_price'; </script>";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Management</title>
    <link rel="stylesheet" href="../includes/header.css">
    <link rel="stylesheet" href="../includes/footer.css">
    <link rel="stylesheet" href="package_selection.css">
</head>

<body>

    <div class="body-container">
        <div class="form-container">
            <h1 class="form-title">Package Management</h1>
            <form id="packageForm" class="form" method="POST" action="">

                <div>
                    <label for="destination" class="label">Delivery Destination</label>
                    <select id="destination" name="destination" class="dropdown" required
                        aria-label="Delivery Destination">
                        <option value="" disabled selected>Select a destination</option>
                        <?php
                        // Get service centers with prices
                        $user_country = $_SESSION['user_country'] ?? '';
                        $select_destinations = "SELECT center_id, center_name, center_rate AS center_price FROM servicecenter WHERE country != '$user_country'";
                        $result_destinations = mysqli_query($conn, $select_destinations);
                        while ($row_destination = mysqli_fetch_assoc($result_destinations)) {
                            $center_id = $row_destination['center_id'];
                            $center_name = $row_destination['center_name'];
                            $center_price = $row_destination['center_price'];
                            echo "<option value='$center_id' data-center-price='$center_price'>$center_name</option>";
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="weight_range" class="label">Weight Range</label>
                    <select id="weight_range" name="weight_range" class="dropdown" required aria-label="Weight Range">
                        <option value="" disabled selected>Select weight range</option>
                        <?php
                        // Get weight ranges with prices
                        $select_weight_ranges = "SELECT weight_range_id, min_weight, max_weight, price AS weight_price FROM weight_range";
                        $result_weight_ranges = mysqli_query($conn, $select_weight_ranges);
                        while ($row_weight_range = mysqli_fetch_assoc($result_weight_ranges)) {
                            $weight_range_id = $row_weight_range['weight_range_id'];
                            $min_weight = $row_weight_range['min_weight'];
                            $max_weight = $row_weight_range['max_weight'];
                            $weight_price = $row_weight_range['weight_price'];
    echo "<option value='$weight_range_id' data-weight-price='$weight_price'>$min_weight - $max_weight</option>";
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label class="label">Package Type</label>
                    <div class="package-grid">
                        <?php
                        // Get package categories
                        $select_categories = "SELECT * FROM categories";
                        $result_categories = mysqli_query($conn, $select_categories);

                        while ($row_categories = mysqli_fetch_assoc($result_categories)) {
                            $category_id = $row_categories['category_id'];
                            $name = $row_categories['name'];
                            $dimensions = $row_categories['dimensions'];
                            $image = $row_categories['image'];

                            echo "
                            <div class='package-option' data-type='$category_id'>
                                <img src='../assets/images/new folder/$image' alt='$name' class='package-image'>
                                <p class='package-title'>$name</p>
                                <p class='package-details'>$dimensions</p>
                                <p class='package-price' data-type='$category_id'>Price: <span id='price_$category_id'>Select destination and weight range</span></p>
                            </div>";
                        }
                        ?>
                    </div>
                </div>

                <input type="hidden" name="selected_package" id="selected_package" value="">
                <input type="hidden" name="weight_range_id" id="weight_range_id" value="">

                <div id="error-message" class="error-message hidden"></div>
                <input type="hidden" name="total_price" id="total_price" value="">

                <button type="submit" name="submit" class="submit-button" aria-label="Calculate">Next</button>
            </form>
        </div>
    </div>

    <?php include_once '../includes/footer.php'; ?>

    <script>
    const form = document.getElementById('packageForm');
    const packageOptions = document.querySelectorAll('.package-option');
    const errorMessage = document.getElementById('error-message');
    const selectedPackageInput = document.getElementById('selected_package');
    let selectedPackage = null;

    // Data from PHP: Prices for each center and weight range
    const centerPrices =
        <?php echo json_encode(array_column(mysqli_fetch_all(mysqli_query($conn, $select_destinations), MYSQLI_ASSOC), 'center_price', 'center_id')); ?>;
    const weightPrices =
        <?php echo json_encode(array_column(mysqli_fetch_all(mysqli_query($conn, $select_weight_ranges), MYSQLI_ASSOC), 'weight_price', 'weight_range_id')); ?>;

    let selectedCenterPrice = 0;
    let selectedWeightPrice = 0;

    // Handle package selection
    packageOptions.forEach(option => {
        option.addEventListener('click', () => {
            packageOptions.forEach(opt => opt.classList.remove('selected'));
            option.classList.add('selected');
            selectedPackage = option.getAttribute('data-type');
            selectedPackageInput.value = selectedPackage;
            errorMessage.classList.add('hidden');
        });
    });

    // Update selected center price on change
    document.getElementById('destination').addEventListener('change', function() {
        selectedCenterPrice = parseFloat(this.options[this.selectedIndex].getAttribute('data-center-price')) ||
            0;
        calculatePrices();
    });

    // Update selected weight price on change
    document.getElementById('weight_range').addEventListener('change', function() {
        selectedWeightPrice = parseFloat(this.options[this.selectedIndex].getAttribute('data-weight-price')) ||
            0;
        calculatePrices();
    });

    // Calculate total price and update display
    function calculatePrices() {
        if (selectedCenterPrice && selectedWeightPrice) {
            const totalPackagePrice = selectedCenterPrice + selectedWeightPrice;
            document.getElementById('total_price').value = totalPackagePrice;
            document.querySelectorAll('.package-price').forEach(priceElement => {
                priceElement.querySelector('span').textContent = `LKR ${totalPackagePrice.toFixed(2)}`;
            });
        }
    }

    // Validate package selection before form submission
    form.addEventListener('submit', (e) => {
        if (!selectedPackage) {
            e.preventDefault();
            errorMessage.textContent = 'Please select a package type.';
            errorMessage.classList.remove('hidden');
            return;
        }
    });
    </script>
</body>

</html>