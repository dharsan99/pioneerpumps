# Pioneer Pumps Website

A complete Content Management System (CMS) for Pioneer Pumps, featuring product catalog, admin panel, QR code tracking, and more.

## 🚀 Quick Start

### Prerequisites
- macOS (tested on macOS 24.5.0)
- Homebrew (already installed on your system)

### Installation & Setup

1. **Install Required Software** (already done):
   ```bash
   brew install php mysql
   ```

2. **Start MySQL Service**:
   ```bash
   brew services start mysql
   ```

3. **Run the Website**:
   ```bash
   ./start_website.sh
   ```

4. **Set up Database**:
   - Open your browser and go to: http://localhost:8000/setup_database.php
   - This will create the database and all required tables

5. **Access the Website**:
   - **Frontend**: http://localhost:8000/
   - **Admin Panel**: http://localhost:8000/../admin/
   - **Admin Login**: admin / admin123

## 📁 Project Structure

```
PioneerPumps_latest/
├── config/                 # Database and configuration files
├── files/                  # Frontend website files
├── admin/                  # Admin panel
├── images/                 # Uploaded images and media
├── assets/                 # CSS, JS, and other assets
├── PioneerAdmin/           # Alternative admin interface
├── setup_database.php      # Database setup script
├── start_website.sh        # Quick start script
└── README.md              # This file
```

## 🗄️ Database Structure

The system includes the following main tables:
- `category` - Product categories
- `subcategory` - Product subcategories  
- `product` - Product details with images and specifications
- `news_events` - News and events content
- `contact_form` - Contact form submissions
- `qr_search` - QR code tracking system
- `gallery` - Image gallery management
- `admin_users` - Admin user accounts

## 🔧 Features

### Frontend Features
- ✅ Responsive design with Bootstrap
- ✅ Product catalog with categories and subcategories
- ✅ Product detail pages with specifications
- ✅ Contact forms with multiple office locations
- ✅ QR code scanning and product verification
- ✅ News and events section
- ✅ Image gallery
- ✅ Search functionality

### Admin Panel Features
- ✅ Secure login system with OTP support
- ✅ Dashboard with analytics
- ✅ Product management (add, edit, delete)
- ✅ Category and subcategory management
- ✅ Image upload and management
- ✅ News and events management
- ✅ Contact form submissions
- ✅ QR code generation
- ✅ User management

### Technical Features
- ✅ PHP 8.4 with PDO database connections
- ✅ MySQL database with proper relationships
- ✅ AJAX for dynamic content loading
- ✅ File upload with validation
- ✅ Email functionality with PHPMailer
- ✅ Session-based authentication
- ✅ Responsive design for mobile devices

## 🔐 Default Admin Credentials

- **Username**: admin
- **Password**: admin123

**⚠️ Important**: Change the default password after first login!

## 🛠️ Development

### Running in Development Mode
```bash
# Start the website
./start_website.sh

# Or manually:
cd files
php -S localhost:8000
```

### Database Management
- **Setup**: http://localhost:8000/setup_database.php
- **phpMyAdmin**: Install XAMPP/MAMP for GUI database management

### File Permissions
The startup script automatically sets the correct permissions:
```bash
chmod -R 755 images/
chmod -R 755 files/assets/
```

## 📧 Email Configuration

The system uses Gmail SMTP for sending emails. To configure:

1. Edit `config/maillservice/smtp/smtp.php`
2. Update Gmail credentials:
   ```php
   $mail->Username = "your-email@gmail.com";
   $mail->Password = "your-app-password";
   ```
3. Enable "Less secure app access" in Gmail settings

## 🚨 Troubleshooting

### Common Issues

1. **MySQL Connection Error**
   - Ensure MySQL is running: `brew services start mysql`
   - Check if the service is active: `brew services list | grep mysql`

2. **Images Not Loading**
   - Check file permissions: `chmod -R 755 images/`
   - Ensure the images directory exists

3. **Admin Login Issues**
   - Clear browser cache
   - Verify database setup was successful
   - Check if sessions are working

4. **PHP Errors**
   - Enable error reporting in `config/config.inc.php`:
     ```php
     ini_set('display_errors', '1');
     error_reporting(E_ALL);
     ```

### Debug Mode
To enable debug mode, add this to any PHP file:
```php
ini_set('display_errors', '1');
error_reporting(E_ALL);
```

## 🔄 Production Deployment

For production deployment:

1. **Update Configuration**:
   - Edit `config/config.inc.php`
   - Update database credentials
   - Change URLs from localhost to production domain

2. **Security**:
   - Change default admin password
   - Set up SSL certificate
   - Configure proper file permissions
   - Enable error logging instead of display

3. **Performance**:
   - Use a production web server (Apache/Nginx)
   - Enable PHP OPcache
   - Set up database indexing
   - Configure CDN for static assets

## 📞 Support

If you encounter issues:

1. Check the error logs
2. Verify all services are running
3. Ensure file permissions are correct
4. Check database connectivity
5. Review the troubleshooting section above

## 📝 License

This project is proprietary software for Pioneer Pumps.

## 🎯 Next Steps

After successful setup:

1. Log into the admin panel
2. Add your product categories and subcategories
3. Upload product images and details
4. Configure contact information
5. Test the QR code functionality
6. Customize the website design as needed
7. Set up email notifications

---

**Happy coding! 🚀** 