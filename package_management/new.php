    <?php include_once '../includes/header.php'; ?>

    <?php
    include_once '../config/config.php';


    if (isset($_POST['submit'])) {
        $destination = $_POST['destination'];
        $weight_range = $_POST['weight_range'];
        $selected_package = $_POST['selected_package'];

        echo "<script> window.location.href ='" . APPURL . "/package_management/new1.php'; </script>";
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
        <link rel="stylesheet" href="new.css">
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
                            //GET SERVICE CENTERS
                            $select_destinations = "SELECT * FROM servicecenter";
                            $result_destinations = mysqli_query($conn, $select_destinations);
                            while($row_destination = mysqli_fetch_assoc($result_destinations)) {
                                $center_id = $row_destination['center_id'];
                                $center_name = $row_destination['center_name'];

                                echo "<option value='$center_id'>$center_name</option>";
                            }
                        ?>
                        </select>
                    </div>

                    <div>
                        <label for="weight_range" class="label">Weight Range</label>
                        <select id="weight_range" name="weight_range" class="dropdown" required
                            aria-label="Delivery Destination">
                            <option value="" disabled selected>Select weight range</option>
                            <?php
                            //GET WEIGHT RANGES
                            $select_weight_ranges = "SELECT * FROM weight_range";
                            $result_weight_ranges = mysqli_query($conn, $select_weight_ranges);
                            while($row_weight_ranges = mysqli_fetch_assoc($result_weight_ranges)) {
                                $weight_range_id = $row_weight_ranges['weight_range_id'];
                                $min_weight = $row_weight_ranges['min_weight'];
                                $max_weight = $row_weight_ranges['max_weight'];

                                echo "<option value='$weight_range_id'>$min_weight - $max_weight</option>";
                            }
                        ?>
                        </select>
                    </div>

                    <div>
                        <label class="label">Package Type</label>
                        <div class="package-grid">

                            <?php
                            //GET CATEGORIES
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
                                </div>";
                            }
                        ?>
                        </div>
                    </div>

                    <input type="hidden" name="selected_package" id="selected_package" value="">
                    <input type="hidden" name="weight_range_id" id="weight_range_id" value="">


                    <div id="error-message" class="error-message hidden"></div>
                    <button type="submit" name="submit" class="submit-button" aria-label="Calculate">Next</button>
                </form>
            </div>
        </div>

        <?php include_once '../includes/footer.php'; 
        
?>

        <script>
        const form = document.getElementById('packageForm');
        const packageOptions = document.querySelectorAll('.package-option');
        const errorMessage = document.getElementById('error-message');
        const selectedPackageInput = document.getElementById('selected_package');
        let selectedPackage = null;

        packageOptions.forEach(option => {
            option.addEventListener('click', () => {
                packageOptions.forEach(opt => opt.classList.remove('selected'));
                option.classList.add('selected');
                selectedPackage = option.getAttribute('data-type');
                selectedPackageInput.value = selectedPackage;
                errorMessage.classList.add('hidden');
            });
        });

        document.getElementById('destination').addEventListener('change', function() {
            document.getElementById('destination_id').value = this.value;
        });

        document.getElementById('weight_range').addEventListener('change', function() {
            document.getElementById('weight_range_id').value = this.value;
        });


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
