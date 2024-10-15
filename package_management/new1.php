<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Management Site</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-100 to-purple-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl p-8 max-w-4xl w-full">
        <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Package Management</h1>
        <form id="packageForm" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="firstName" name="firstName"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required aria-required="true">
                    <p class="mt-1 text-sm text-red-600 hidden" id="firstNameError"></p>
                </div>
                <div>
                    <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="lastName" name="lastName"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required aria-required="true">
                    <p class="mt-1 text-sm text-red-600 hidden" id="lastNameError"></p>
                </div>
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                    <input type="text" id="company" name="company"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label for="postalCode" class="block text-sm font-medium text-gray-700">Postal Code</label>
                    <input type="text" id="postalCode" name="postalCode"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required aria-required="true">
                    <p class="mt-1 text-sm text-red-600 hidden" id="postalCodeError"></p>
                </div>
                <div class="md:col-span-2">
                    <label for="additionalInfo" class="block text-sm font-medium text-gray-700">Additional
                        Information</label>
                    <textarea id="additionalInfo" name="additionalInfo" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required aria-required="true">
                    <p class="mt-1 text-sm text-red-600 hidden" id="emailError"></p>
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" id="phone" name="phone"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required aria-required="true">
                    <p class="mt-1 text-sm text-red-600 hidden" id="phoneError"></p>
                </div>
            </div>
            <div class="mt-4">
                <label class="inline-flex items-center">
                    <input type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="dhlServicePoint">
                    <span class="ml-2 text-sm text-gray-600">At a DHL ServicePoint (Free)</span>
                </label>
            </div>
            <div class="flex justify-between mt-8">
                <button type="button"
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition-colors"
                    aria-label="Go back to previous step">Previous</button>
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors"
                    aria-label="Proceed to checkout">Proceed to Checkout</button>
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
                input.classList.add('border-red-500');
                error.textContent = 'This field is required';
                error.classList.remove('hidden');
            } else {
                input.classList.remove('border-red-500');
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