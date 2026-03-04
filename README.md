🔐 Simple PHP Login & Registration System
A clean, beginner-friendly login and registration system built with PHP, MySQL, and vanilla JavaScript. Perfect for learning PHP fundamentals or as a starting point for larger projects.

✨ Features
🎯 Core Functionality
User Registration: Create new accounts with name, email, and password

User Login: Secure authentication for existing users

Role-Based Pages: Different views for regular users and admins

Session Management: Persistent login sessions with proper logout

🛡️ Security Features
Password Hashing: Passwords are securely hashed using PHP's password_hash()

SQL Injection Prevention: Uses mysqli_real_escape_string() for database queries

Session Protection: Protected pages check for valid sessions

Input Validation: Basic validation on required fields

🎨 User Interface
Clean Modern Design: Responsive layout with CSS3 and Google Fonts

Form Toggle: Switch between login and registration forms without page reload

Error Messages: User-friendly error display for common issues

Landing Page: Professional hero section explaining the application

🚀 Installation
Prerequisites
PHP 7.4 or higher

MySQL 5.7 or higher

Web server (Apache, Nginx, or XAMPP/WAMP/MAMP)

Step 1: Set Up Database
Open phpMyAdmin or MySQL command line

Create a new database:

sql
CREATE DATABASE registration_form;
Create the users table:

sql
USE registration_form;

CREATE TABLE registration_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
Step 2: Configure Database Connection
Edit db.php with your database credentials:

php
$hostname = "localhost";     // Your database host
$username = "root";          // Your database username
$password = "";              // Your database password
$dbname = "registration_form"; // Your database name
