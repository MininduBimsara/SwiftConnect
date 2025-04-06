# 🌐 SwiftConnect

A robust logistics and courier service platform designed to streamline package management between Korea and Sri Lanka. SwiftConnect offers features like user authentication, rate calculation and management, package tracking, and a secure checkout process.

---

## 📁 Project Structure

/swiftconnect ├── index.php # Landing page and general info ├── login.php # User login page ├── register.php # User registration page ├── dashboard.php # User dashboard after login ├── checkout.php # Checkout process page ├── rate_management.php # Page for rate calculation and management ├── /css │ └── style.css # Main stylesheet ├── /js │ └── main.js # Main JavaScript file ├── /includes # Reusable PHP components (header, footer, db connection) │ ├── header.php │ ├── footer.php │ └── db.php ├── /assets # Assets folder for images, icons, etc. │ └── images/ └── README.md # This file


---
## 🚀 Features

- ✅ Responsive design using HTML, CSS, and JavaScript  
- ✅ Secure user registration & login (PHP + Sessions)  
- ✅ Dynamic rate calculation and management based on destination, weight range, and package type  
- ✅ Package creation, tracking, and delivery status management  
- ✅ Complete checkout process with validation and order confirmation  
- ✅ Admin functionalities for managing products, rates, and orders  

---

## 🔧 Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/swiftconnect.git
Place the project in your web server's root directory (e.g., htdocs in XAMPP or www in WAMP).

**Place the project in your web server's root directory**  
   (e.g., `htdocs` in XAMPP or `www` in WAMP).

2. **Import the SQL database using PHPMyAdmin:**  
   - Open PHPMyAdmin.  
   - Create a new database (e.g., `swiftconnect_db`).  
   - Import the provided SQL file from the `/database` folder (if available).

3. **Update configuration files:**  
   - Open `/includes/db.php` and set your database credentials.  
   - If applicable, update `config.php` with your base URL and any API keys.

---

## Requirements

- **PHP:** 7.x or higher  
- **MySQL:** Database server  
- **Web Server:** (e.g., Apache)  
- **Browser:** Modern browser (Chrome, Firefox, etc.)

## Installation & Configuration

1. **Place the project in your web server's root directory**  
   (e.g., `htdocs` in XAMPP or `www` in WAMP).

2. **Import the SQL database using PHPMyAdmin:**  
   - Open PHPMyAdmin.  
   - Create a new database (e.g., `swiftconnect_db`).  
   - Import the provided SQL file from the `/database` folder (if available).

3. **Update configuration files:**  
   - Open `/includes/db.php` and set your database credentials.  
   - If applicable, update `config.php` with your base URL and any API keys.
