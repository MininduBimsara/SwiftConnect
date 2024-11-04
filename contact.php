<?php require "includes/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact SwiftConnect</title>
    <link rel="stylesheet" href="contact.css?v=1.0">
    <link rel="stylesheet" href="includes/footer.css">
    <link rel="stylesheet" href="includes/header.css?">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    
    <?php require "config/config.php"; ?>

    <div id="content">
        <!-- Header Banner with Animated Background -->
        <div class="banner">
            <div class="jumbotron bg-center" style="background-image: url('assets/img/courier-bg.jpg');">
                <div class="container">
                    <h1 class="header-title">Contact SwiftConnect</h1>
                    <p class="subtitle">We’re here to help with your courier needs between Korea and Sri Lanka.</p>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <section class="contact-sec">
            <div class="contact-box">
                <h3 class="form-title">Do you have any questions?</h3>
                <p>Send Us a Message</p>
                <form id="contactForm" onsubmit="return validateForm()">
                    <div class="row">
                        <div class="input-box col-lg-6 col-md-12">
                            <input class="input" type="text" id="name" placeholder="Full Name" required>
                        </div>
                        <div class="input-box col-lg-6 col-md-12">
                            <input class="input" type="email" id="email" placeholder="Email" required>
                        </div>
                        <div class="input-box col-lg-12">
                            <textarea class="input" id="message" rows="4" placeholder="Message" required></textarea>
                        </div>
                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn-primary">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Contact Information Box -->
            <div class="info-box">
                <h3 class="info-title">SwiftConnect Headquarters</h3>
                <p>5th Lane<br>Chatham Road<br>Colombo-6<br>Sri Lanka</p>
                <p>
                    <i class="fas fa-phone" title="Call Us"></i> +94 71 234 5678<br>
                    <i class="fas fa-envelope" title="Email Us"></i> support@swiftconnect.com
                </p>
                <p>For inquiries, contact us during business hours, 9:00 AM - 6:00 PM.</p>
            </div>
        </section>

        <!-- Interactive Google Map -->
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.63206680726!2d79.8437927!3d6.9345031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2592431e92cf7%3A0x9f9525402fc84319!2sChatham%20St%2C%20Colombo!5e0!3m2!1sen!2slk!4v1721506727556!5m2!1sen!2slk&maptype=satellite"
                    class="map-frame" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <?php require "includes/footer.php"; ?>

    <!-- Inline JavaScript for Form Validation -->
    <script>
        function validateForm() {
            const name = document.getElementById("name").value;
            const email = document.getElementById("email").value;
            const message = document.getElementById("message").value;
            
            if (!name || !email || !message) {
                alert("Please fill in all fields.");
                return false;
            } else {
                alert("Your message has been sent successfully!");
                return true;
            }
        }
    </script>

</body>
</html>
