# Pioneer Pumps Website Setup Guide

## 🚀 Quick Start Guide

### Prerequisites
- macOS (you're on macOS 24.5.0)
- XAMPP or similar local web server
- Web browser

### Step 1: Install XAMPP
1. Download XAMPP for macOS: https://www.apachefriends.org/download.html
2. Install XAMPP
3. Start XAMPP Control Panel
4. Start **Apache** and **MySQL** services

### Step 2: Set up the project
1. Copy the entire `PioneerPumps_latest` folder to:
   ```
   /Applications/XAMPP/htdocs/PioneerPumps/
   ```

### Step 3: Create the database
1. Open your web browser and go to: http://localhost/phpmyadmin
2. Click "New" to create a new database
3. Name it: `pioneer_pumps`
4. Click "Create"
5. Select the `pioneer_pumps` database
6. Click "Import" tab
7. Choose the `database_setup.sql` file from this directory
8. Click "Go" to import the database structure

### Step 4: Configure file permissions
Run these commands in Terminal:
```bash
cd /Applications/XAMPP/htdocs/PioneerPumps/
chmod -R 755 images/
chmod -R 755 files/assets/
```

### Step 5: Access the website
1. **Frontend Website**: http://localhost/PioneerPumps/files/
2. **Admin Panel**: http://localhost/PioneerPumps/admin/
   - Username: `admin`
   - Password: `admin123`

## 🔧 Alternative Setup Methods

### Option 2: Using MAMP
1. Download MAMP: https://www.mamp.info/
2. Install and start MAMP
3. Copy project to: `/Applications/MAMP/htdocs/PioneerPumps/`
4. Access via: http://localhost:8888/PioneerPumps/files/

### Option 3: Using built-in PHP server (for testing only)
```bash
cd PioneerPumps_latest/files
php -S localhost:8000
```
Then visit: http://localhost:8000

## 📁 Project Structure
```
PioneerPumps/
├── config/           # Database and configuration files
├── files/           # Frontend website files
├── admin/           # Admin panel
├── images/          # Uploaded images and media
├── assets/          # CSS, JS, and other assets
└── PioneerAdmin/    # Alternative admin interface
```

## 🗄️ Database Tables
- `category` - Product categories
- `subcategory` - Product subcategories
- `product` - Product details
- `news_events` - News and events
- `contact_form` - Contact form submissions
- `qr_search` - QR code tracking
- `gallery` - Image gallery
- `admin_users` - Admin user accounts

## 🔐 Default Admin Credentials
- **Username**: admin
- **Password**: admin123

## 🚨 Troubleshooting

### Common Issues:

1. **Database Connection Error**
   - Ensure MySQL is running in XAMPP
   - Check database name is `pioneer_pumps`
   - Verify username is `root` and password is empty

2. **Images Not Loading**
   - Check file permissions on `images/` directory
   - Ensure Apache has read access

3. **Admin Login Issues**
   - Clear browser cache
   - Check if sessions are working
   - Verify database import was successful

4. **PHP Errors**
   - Enable error reporting in `config/config.inc.php`
   - Check PHP version (requires 7.0+)

### Enable Error Reporting
Add this to the top of any PHP file for debugging:
```php
ini_set('display_errors', '1');
error_reporting(E_ALL);
```

## 📧 Email Configuration
The system uses Gmail SMTP. To configure:
1. Edit `config/maillservice/smtp/smtp.php`
2. Update Gmail credentials
3. Enable "Less secure app access" in Gmail settings

## 🎯 Next Steps
1. Log into admin panel
2. Add categories and subcategories
3. Upload product images
4. Add products with details
5. Configure contact information
6. Test QR code functionality

## 📞 Support
If you encounter issues:
1. Check XAMPP error logs
2. Verify database connection
3. Ensure all required PHP extensions are enabled
4. Check file permissions

## 🔄 Updates
- The system is configured for localhost by default
- For production, update URLs in `config/config.inc.php`
- Change admin password after first login
- Regularly backup the database 