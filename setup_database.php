<?php
// Pioneer Pumps Database Setup Script
// Run this in your browser to set up the database

echo "<h1>Pioneer Pumps Database Setup</h1>";

// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pioneer_pumps';

try {
    // Create connection without database
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p>✅ Connected to MySQL server successfully</p>";
    
    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    $pdo->exec($sql);
    echo "<p>✅ Database '$database' created successfully</p>";
    
    // Connect to the new database
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create tables
    $tables = [
        "CREATE TABLE `category` (
            `tbid` int(11) NOT NULL AUTO_INCREMENT,
            `category_name` varchar(255) NOT NULL,
            `description` text,
            `image` varchar(255),
            `status` enum('0','1') DEFAULT '1',
            `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`tbid`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
        
        "CREATE TABLE `subcategory` (
            `tbid` int(11) NOT NULL AUTO_INCREMENT,
            `category_id` int(11) NOT NULL,
            `subcategory_name` varchar(255) NOT NULL,
            `description` text,
            `image` varchar(255),
            `status` enum('0','1') DEFAULT '1',
            `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`tbid`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
        
        "CREATE TABLE `product` (
            `tbid` int(11) NOT NULL AUTO_INCREMENT,
            `category_id` int(11) NOT NULL,
            `subcategory_id` int(11) NOT NULL,
            `product_name` varchar(255) NOT NULL,
            `description` text,
            `application` text,
            `features` text,
            `technical_specification` text,
            `material_of_construction` text,
            `performance_chart` varchar(255),
            `product_image` text,
            `banner_image` varchar(255),
            `brochure` varchar(255),
            `status` enum('0','1') DEFAULT '1',
            `created_type` varchar(50),
            `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`tbid`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
        
        "CREATE TABLE `news_events` (
            `tbid` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(255) NOT NULL,
            `description` text,
            `banner_image` varchar(255),
            `slider_image` varchar(255),
            `document_proof` varchar(255),
            `status` enum('0','1') DEFAULT '1',
            `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`tbid`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
        
        "CREATE TABLE `contact_form` (
            `tbid` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `phone` varchar(20),
            `subject` varchar(255),
            `message` text,
            `status` enum('0','1') DEFAULT '1',
            `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`tbid`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
        
        "CREATE TABLE `gallery` (
            `tbid` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(255),
            `image` varchar(255) NOT NULL,
            `description` text,
            `status` enum('0','1') DEFAULT '1',
            `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`tbid`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
        
        "CREATE TABLE `qr_search` (
            `tbid` int(11) NOT NULL AUTO_INCREMENT,
            `serial_num` varchar(255) NOT NULL,
            `model` varchar(255) NOT NULL,
            `m_date` date,
            `user_type` varchar(100),
            `user_name` varchar(255),
            `user_city` varchar(255),
            `user_state` varchar(255),
            `user_mobile` varchar(20),
            `user_whatsapp` varchar(20),
            `status` enum('0','1') DEFAULT '1',
            `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`tbid`),
            UNIQUE KEY `serial_num` (`serial_num`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
        
        "CREATE TABLE `performance_chart` (
            `tbid` int(11) NOT NULL AUTO_INCREMENT,
            `product_id` int(11),
            `chart_data` text,
            `chart_image` varchar(255),
            `status` enum('0','1') DEFAULT '1',
            `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`tbid`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
        
        "CREATE TABLE `admin_users` (
            `tbid` int(11) NOT NULL AUTO_INCREMENT,
            `username` varchar(255) NOT NULL,
            `password` varchar(255) NOT NULL,
            `email` varchar(255),
            `status` enum('0','1') DEFAULT '1',
            `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`tbid`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
    ];
    
    foreach ($tables as $sql) {
        $pdo->exec($sql);
    }
    echo "<p>✅ All tables created successfully</p>";
    
    // Insert sample data
    $sampleData = [
        "INSERT INTO `admin_users` (`username`, `password`, `email`) VALUES ('admin', '" . password_hash('admin123', PASSWORD_DEFAULT) . "', 'admin@pioneerpumps.in')",
        "INSERT INTO `category` (`category_name`, `description`) VALUES ('Agricultural Pumps', 'Pumps designed for agricultural applications')",
        "INSERT INTO `category` (`category_name`, `description`) VALUES ('Domestic Pumps', 'Pumps for household and domestic use')",
        "INSERT INTO `category` (`category_name`, `description`) VALUES ('Industrial Pumps', 'Heavy-duty pumps for industrial applications')",
        "INSERT INTO `category` (`category_name`, `description`) VALUES ('Commercial Pumps', 'Pumps for commercial buildings and complexes')"
    ];
    
    foreach ($sampleData as $sql) {
        $pdo->exec($sql);
    }
    echo "<p>✅ Sample data inserted successfully</p>";
    
    echo "<h2>🎉 Database setup completed successfully!</h2>";
    echo "<p><strong>Admin Login:</strong></p>";
    echo "<ul>";
    echo "<li><strong>Username:</strong> admin</li>";
    echo "<li><strong>Password:</strong> admin123</li>";
    echo "</ul>";
    echo "<p><a href='http://localhost:8000/'>Go to Website</a></p>";
    echo "<p><a href='http://localhost:8000/../admin/'>Go to Admin Panel</a></p>";
    
} catch(PDOException $e) {
    echo "<p style='color: red;'>❌ Error: " . $e->getMessage() . "</p>";
    echo "<p>Please make sure MySQL is running and the credentials are correct.</p>";
}
?> 