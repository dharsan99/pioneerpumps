-- Pioneer Pumps Database Setup
-- Run this in phpMyAdmin or MySQL command line

CREATE DATABASE IF NOT EXISTS `pioneer_pumps` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `pioneer_pumps`;

-- Category table
CREATE TABLE `category` (
  `tbid` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255),
  `status` enum('0','1') DEFAULT '1',
  `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Subcategory table
CREATE TABLE `subcategory` (
  `tbid` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255),
  `status` enum('0','1') DEFAULT '1',
  `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tbid`),
  FOREIGN KEY (`category_id`) REFERENCES `category`(`tbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Product table
CREATE TABLE `product` (
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
  PRIMARY KEY (`tbid`),
  FOREIGN KEY (`category_id`) REFERENCES `category`(`tbid`),
  FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory`(`tbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- News and Events table
CREATE TABLE `news_events` (
  `tbid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `banner_image` varchar(255),
  `slider_image` varchar(255),
  `document_proof` varchar(255),
  `status` enum('0','1') DEFAULT '1',
  `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Contact Form table
CREATE TABLE `contact_form` (
  `tbid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20),
  `subject` varchar(255),
  `message` text,
  `status` enum('0','1') DEFAULT '1',
  `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Gallery table
CREATE TABLE `gallery` (
  `tbid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255),
  `image` varchar(255) NOT NULL,
  `description` text,
  `status` enum('0','1') DEFAULT '1',
  `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- QR Search table
CREATE TABLE `qr_search` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Performance Chart table
CREATE TABLE `performance_chart` (
  `tbid` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11),
  `chart_data` text,
  `chart_image` varchar(255),
  `status` enum('0','1') DEFAULT '1',
  `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tbid`),
  FOREIGN KEY (`product_id`) REFERENCES `product`(`tbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Admin Users table
CREATE TABLE `admin_users` (
  `tbid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255),
  `status` enum('0','1') DEFAULT '1',
  `created_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin user (password: admin123)
INSERT INTO `admin_users` (`username`, `password`, `email`) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@pioneerpumps.in');

-- Insert sample categories
INSERT INTO `category` (`category_name`, `description`) VALUES 
('Agricultural Pumps', 'Pumps designed for agricultural applications'),
('Domestic Pumps', 'Pumps for household and domestic use'),
('Industrial Pumps', 'Heavy-duty pumps for industrial applications'),
('Commercial Pumps', 'Pumps for commercial buildings and complexes');

-- Insert sample subcategories
INSERT INTO `subcategory` (`category_id`, `subcategory_name`, `description`) VALUES 
(1, 'Centrifugal Pumps', 'High-efficiency centrifugal pumps for agriculture'),
(1, 'Submersible Pumps', 'Submersible pumps for deep well applications'),
(2, 'Booster Pumps', 'Booster pumps for domestic water supply'),
(2, 'Sump Pumps', 'Sump pumps for basement and drainage'),
(3, 'Process Pumps', 'Process pumps for industrial applications'),
(4, 'High Rise Pumps', 'Pumps designed for high-rise buildings'); 