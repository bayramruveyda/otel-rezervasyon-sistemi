🏨 Hotel Reservation System

A web-based hotel reservation project developed with PHP, MySQL, HTML, CSS, and JavaScript.

The repository contains authentication pages, database connectivity, AJAX endpoints, front-end assets, page modules, and SQL resources.

✨ Main Features

User registration

User login / logout

Database-backed web pages

AJAX-based interactions

Modular page structure

MySQL connection layer

Front-end styling and JavaScript behavior

🧱 Project Structure

otel-rezervasyon-sistemi/
├── ajax/
├── css/
├── db/
│   └── connection.php
├── js/
├── pages/
├── sql/
├── index.php
├── login.php
├── logout.php
└── register.php

🛠️ Technologies

PHP

MySQL / MySQLi

HTML

CSS

JavaScript

AJAX

🗄️ Database Configuration

The current connection file expects a local MySQL database named:

otel_rezervasyon

Before running the project, create/import the required database using the SQL files in the sql/ directory and update local database credentials if needed.

▶️ Run Locally

A common local setup is XAMPP, WAMP, or another PHP/MySQL environment.

Clone the repository.

Place the project in your local web server directory.

Start Apache and MySQL.

Create/import the otel_rezervasyon database.

Update db/connection.php for your local database configuration.

Open the project from your local server.

🔐 Security Note

Do not commit production database passwords or private credentials to the repository. Use environment-specific configuration for deployed versions.

📌 Purpose

This project demonstrates PHP-based web development, authentication flow, relational database connectivity, modular page organization, and asynchronous browser-server communication.

👩‍💻 Author

Rüveyda Bayram

GitHub: @bayramruveyda
