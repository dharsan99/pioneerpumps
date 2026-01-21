#!/bin/bash

echo "🚀 Starting Pioneer Pumps Website..."

# Check if MySQL is running
if ! brew services list | grep mysql | grep -q "started"; then
    echo "📦 Starting MySQL..."
    brew services start mysql
    sleep 3
fi

# Check if we're in the right directory
if [ ! -f "config/config.inc.php" ]; then
    echo "❌ Please run this script from the PioneerPumps_latest directory"
    exit 1
fi

# Create images directory if it doesn't exist
mkdir -p images/product/image
mkdir -p images/product/banner_image
mkdir -p images/product/brochure
mkdir -p images/categories
mkdir -p images/subcategory
mkdir -p images/gallery
mkdir -p images/news_events/banner_image
mkdir -p images/news_events/slider_image
mkdir -p images/news_events/document_proof

# Set permissions
chmod -R 755 images/
chmod -R 755 files/assets/

echo "✅ Directory structure and permissions set up"

# Start PHP server
echo "🌐 Starting PHP development server..."
echo "📱 Website will be available at: http://localhost:8000"
echo "🔧 Database setup: http://localhost:8000/setup_database.php"
echo "⚙️  Admin panel: http://localhost:8000/../admin/"
echo ""
echo "Press Ctrl+C to stop the server"
echo ""

cd files && php -S localhost:8000 