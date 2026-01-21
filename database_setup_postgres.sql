-- Pioneer Pumps Database Setup for PostgreSQL
-- Run this in Render PostgreSQL or psql command line

-- Category table
CREATE TABLE IF NOT EXISTS category (
  tbid SERIAL PRIMARY KEY,
  category_name VARCHAR(255) NOT NULL,
  description TEXT,
  image VARCHAR(255),
  status VARCHAR(1) DEFAULT '1' CHECK (status IN ('0', '1')),
  created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Subcategory table
CREATE TABLE IF NOT EXISTS subcategory (
  tbid SERIAL PRIMARY KEY,
  category_id INTEGER NOT NULL REFERENCES category(tbid),
  subcategory_name VARCHAR(255) NOT NULL,
  description TEXT,
  image VARCHAR(255),
  status VARCHAR(1) DEFAULT '1' CHECK (status IN ('0', '1')),
  created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Product table
CREATE TABLE IF NOT EXISTS product (
  tbid SERIAL PRIMARY KEY,
  category_id INTEGER NOT NULL REFERENCES category(tbid),
  subcategory_id INTEGER NOT NULL REFERENCES subcategory(tbid),
  product_name VARCHAR(255) NOT NULL,
  description TEXT,
  application TEXT,
  features TEXT,
  technical_specification TEXT,
  material_of_construction TEXT,
  performance_chart VARCHAR(255),
  product_image TEXT,
  banner_image VARCHAR(255),
  brochure VARCHAR(255),
  status VARCHAR(1) DEFAULT '1' CHECK (status IN ('0', '1')),
  created_type VARCHAR(50),
  created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- News and Events table
CREATE TABLE IF NOT EXISTS news_events (
  tbid SERIAL PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  banner_image VARCHAR(255),
  slider_image VARCHAR(255),
  document_proof VARCHAR(255),
  status VARCHAR(1) DEFAULT '1' CHECK (status IN ('0', '1')),
  created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contact Form table
CREATE TABLE IF NOT EXISTS contact_form (
  tbid SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(20),
  subject VARCHAR(255),
  message TEXT,
  status VARCHAR(1) DEFAULT '1' CHECK (status IN ('0', '1')),
  created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Gallery table
CREATE TABLE IF NOT EXISTS gallery (
  tbid SERIAL PRIMARY KEY,
  title VARCHAR(255),
  image VARCHAR(255) NOT NULL,
  description TEXT,
  status VARCHAR(1) DEFAULT '1' CHECK (status IN ('0', '1')),
  created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- QR Search table
CREATE TABLE IF NOT EXISTS qr_search (
  tbid SERIAL PRIMARY KEY,
  serial_num VARCHAR(255) NOT NULL UNIQUE,
  model VARCHAR(255) NOT NULL,
  m_date DATE,
  user_type VARCHAR(100),
  user_name VARCHAR(255),
  user_city VARCHAR(255),
  user_state VARCHAR(255),
  user_mobile VARCHAR(20),
  user_whatsapp VARCHAR(20),
  status VARCHAR(1) DEFAULT '1' CHECK (status IN ('0', '1')),
  created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Performance Chart table
CREATE TABLE IF NOT EXISTS performance_chart (
  tbid SERIAL PRIMARY KEY,
  product_id INTEGER REFERENCES product(tbid),
  chart_data TEXT,
  chart_image VARCHAR(255),
  status VARCHAR(1) DEFAULT '1' CHECK (status IN ('0', '1')),
  created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admin Users table
CREATE TABLE IF NOT EXISTS admin_users (
  tbid SERIAL PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255),
  status VARCHAR(1) DEFAULT '1' CHECK (status IN ('0', '1')),
  created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default admin user (password: admin123)
INSERT INTO admin_users (username, password, email) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@pioneerpumps.in')
ON CONFLICT DO NOTHING;

-- Insert sample categories
INSERT INTO category (category_name, description) VALUES
('Agricultural Pumps', 'Pumps designed for agricultural applications'),
('Domestic Pumps', 'Pumps for household and domestic use'),
('Industrial Pumps', 'Heavy-duty pumps for industrial applications'),
('Commercial Pumps', 'Pumps for commercial buildings and complexes')
ON CONFLICT DO NOTHING;

-- Insert sample subcategories (run after categories are created)
INSERT INTO subcategory (category_id, subcategory_name, description) VALUES
(1, 'Centrifugal Pumps', 'High-efficiency centrifugal pumps for agriculture'),
(1, 'Submersible Pumps', 'Submersible pumps for deep well applications'),
(2, 'Booster Pumps', 'Booster pumps for domestic water supply'),
(2, 'Sump Pumps', 'Sump pumps for basement and drainage'),
(3, 'Process Pumps', 'Process pumps for industrial applications'),
(4, 'High Rise Pumps', 'Pumps designed for high-rise buildings')
ON CONFLICT DO NOTHING;
