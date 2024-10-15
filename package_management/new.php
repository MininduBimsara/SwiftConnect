<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Management</title>
    <link rel="stylesheet" href="new.css">
</head>

<body class="body-container">
    <div class="form-container">
        <h1 class="form-title">Package Management</h1>
        <form id="packageForm" class="form">
            <div>
                <label for="destination" class="label">Delivery Destination</label>
                <input type="text" id="destination" name="destination" class="input" placeholder="Enter destination"
                    required aria-label="Delivery Destination">
            </div>
            <div>
                <label class="label">Package Type</label>
                <div class="package-grid">
                    <div class="package-option" data-type="envelope">
                        <img src="https://images.unsplash.com/photo-1593435221502-c5d7bfc26cab?auto=format&fit=crop&w=100&q=80"
                            alt="Envelope" class="package-image">
                        <p class="package-title">Envelope</p>
                        <p class="package-details">Max 0.5kg, 25x35cm</p>
                        <p class="package-price">€3.95</p>
                    </div>
                    <div class="package-option" data-type="parcel">
                        <img src="https://images.unsplash.com/photo-1595964069480-5bc00eb9b25e?auto=format&fit=crop&w=100&q=80"
                            alt="Parcel" class="package-image">
                        <p class="package-title">Parcel</p>
                        <p class="package-details">Max 2kg, 35x25x3cm</p>
                        <p class="package-price">€5.95</p>
                    </div>
                    <div class="package-option" data-type="big-parcel">
                        <img src="https://images.unsplash.com/photo-1628436174665-c8424c5f0ef6?auto=format&fit=crop&w=100&q=80"
                            alt="Big Parcel" class="package-image">
                        <p class="package-title">Big Parcel</p>
                        <p class="package-details">Max 5kg, 50x40x20cm</p>
                        <p class="package-price">€8.95</p>
                    </div>
                    <div class="package-option" data-type="box">
                        <img src="https://images.unsplash.com/photo-1595079676077-f88a1b0b1d3e?auto=format&fit=crop&w=100&q=80"
                            alt="Box" class="package-image">
                        <p class="package-title">Box</p>
                        <p class="package-details">Max 10kg, 60x50x40cm</p>
                        <p class="package-price">€12.95</p>
                    </div>
                </div>
            </div>
            <div id="error-message" class="error-message hidden"></div>
            <button type="submit" class="submit-button" aria-label="Calculate">Calculate</button>
        </form>
    </div>
    <script>
    const form = document.getElementById('packageForm');
    const packageOptions = document.querySelectorAll('.package-option');
    const errorMessage = document.getElementById('error-message');
    let selectedPackage = null;

    packageOptions.forEach(option => {
        option.addEventListener('click', () => {
            packageOptions.forEach(opt => opt.classList.remove('selected'));
            option.classList.add('selected');
            selectedPackage = option.getAttribute('data-type');
            errorMessage.classList.add('hidden');
        });
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if (!selectedPackage) {
            errorMessage.textContent = 'Please select a package type.';
            errorMessage.classList.remove('hidden');
            return;
        }
        alert('Package selection submitted successfully!');
    });
    </script>
</body>

</html>