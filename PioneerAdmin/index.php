<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce Website</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'php/functions.php'; ?>

    <header>
        <h1>eCommerce Website</h1>
        <nav>
            <?php display_categories(); ?>
        </nav>
    </header>

    <main>
        <h2>Welcome to our eCommerce Website</h2>
        <p>Explore our products by selecting a category from the navigation menu above.</p>
    </main>

    <footer>
        <p>&copy; 2023 eCommerce Website. All Rights Reserved.</p>
    </footer>
</body>
</html>
