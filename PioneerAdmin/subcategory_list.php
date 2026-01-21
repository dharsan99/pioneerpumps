<?php
include 'php/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Sub-category Details</h1>
        <nav>
        </nav>
    </header>

    <main>
        <?php
        if (isset($_GET['product_id'])) {
            $product_id = intval($_GET['product_id']);
            $conn = db_connect();

            $sql = "SELECT * FROM subcategory WHERE category_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $product_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<ul class='category-list'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li><a href='product_details.php?subcategory_id=" . $row["tbid"] . "'>" . $row["subcategory_name"] . "</a></li>";
                }
                echo "</ul>";
            } else {
                echo "No Sub-categories found.";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "No sub category selected.";
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2023 eCommerce Website. All Rights Reserved.</p>
    </footer>
</body>
</html>













<?php
require_once 'php/db_connect.php';

$conn = db_connect();

// Fetch categories
$sql = "SELECT * FROM subcategory";
$result = $conn->query($sql);

$categories = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Fetch subcategories based on the selected category
$selected_category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;
$subcategories = array();
if ($selected_category_id > 0) {
    $sql_subcategories = "SELECT * FROM subcategory WHERE category_id = $selected_category_id";
    $result_subcategories = $conn->query($sql_subcategories);

    if ($result_subcategories->num_rows > 0) {
        while ($row_subcategory = $result_subcategories->fetch_assoc()) {
            $subcategories[] = $row_subcategory;
        }
    }
}

$conn->close();
?>
