<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Management Site</title>
    <link rel="stylesheet" href="new1.css">
</head>

<body class="gradient-bg">
    <div class="form-container">
        <h1 class="form-title">Package Management</h1>
        <form id="packageForm" class="form-content">
            <div class="grid-container">
                <div>
                    <label for="firstName" class="label">First Name</label>
                    <input type="text" id="firstName" name="firstName" class="input-field" required>
                    <p class="error-message hidden" id="firstNameError"></p>
                </div>
                <div>
                    <label for="lastName" class="label">Last Name</label>
                    <input type="text" id="lastName" name="lastName" class="input-field" required>
                    <p class="error-message hidden" id="lastNameError"></p>
                </div>
                <div>
                    <label for="company" class="label">Company</label>
                    <input type="text" id="company" name="company" class="input-field">
                </div>
                <div>
                    <label for="postalCode" class="label">Postal Code</label>
                    <input type="text" id="postalCode" name="postalCode" class="input-field" required>
                    <p class="error-message hidden" id="postalCodeError"></p>
                </div>
                <div class="span-cols">
                    <label for="additionalInfo" class="label">Additional Information</label>
                    <textarea id="additionalInfo" name="additionalInfo" rows="3" class="textarea-field"></textarea>
                </div>
                <div>
                    <label for="email" class="label">Email</label>
                    <input type="email" id="email" name="email" class="input-field" required>
                    <p class="error-message hidden" id="emailError"></p>
                </div>
                <div>
                    <label for="phone" class="label">Phone Number</label>
                    <input type="tel" id="phone" name="phone" class="input-field" required>
                    <p class="error-message hidden" id="phoneError"></p>
                </div>
            </div>
            <div class="checkbox-container">
                <label class="checkbox-label">
                    <input type="checkbox" name="dhlServicePoint" class="checkbox">
                    <span class="checkbox-text">At a SwiftConnect ServicePoint (Free)</span>
                </label>
            </div>
            <div class="form-footer">
                <button type="button" class="previous-button">Previous</button>
                <button type="submit" class="submit-button">Proceed to Checkout</button>
            </div>
        </form>
    </div>
    <script>
    document.getElementById('packageForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const fields = ['firstName', 'lastName', 'postalCode', 'email', 'phone'];
        let isValid = true;
        fields.forEach(field => {
            const input = document.getElementById(field);
            const error = document.getElementById(field + 'Error');
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('error-border');
                error.textContent = 'This field is required';
                error.classList.remove('hidden');
            } else {
                input.classList.remove('error-border');
                error.classList.add('hidden');
            }
        });
        if (isValid) {
            alert('Form submitted successfully!');
        }
    });
    </script>
</body>

</html>