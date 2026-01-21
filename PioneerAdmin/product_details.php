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
        <h1>Product Details</h1>
        <nav>
        </nav>
    </header>

    <main>
        <?php
        if (isset($_GET['subcategory_id'])) {
            $product_id = intval($_GET['subcategory_id']);
            $conn = db_connect();

            $sql = "SELECT * FROM product WHERE subcategory_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $product_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<div class='product-details'>";
                echo "<h2>" . $row["product_name"] . "</h2>";
                echo "<p>Application: $" . $row["application"] . "</p>";
                echo "<p>Description: " . $row["description"] . "</p>";
                echo "<p>Feautures: " . $row["features"] . "</p>";
                echo "<p>Technical Spec: " . $row["technical_specification"] . "</p>";
                echo "<p>Material: " . $row["material_of_construction"] . "</p>";
                echo "<p>Performance Chart: " . $row["performance_chart"] . "</p>";

                echo "</div>";
            } else {
                echo "No product found with the specified ID.";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "No product selected.";
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2023 eCommerce Website. All Rights Reserved.</p>
    </footer>
</body>
</html>
