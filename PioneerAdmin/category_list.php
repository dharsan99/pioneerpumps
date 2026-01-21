<?php
include 'php/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub-Category in Category</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Sub-Category in Category</h1>
        <nav>
           
        </nav>
    </header>

    <main>
    <?php
        if (isset($_GET['category_id'])) {
            $category_id = intval($_GET['category_id']);
            $conn = db_connect();

            $sql = "SELECT * FROM subcategory WHERE category_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $category_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<div class='SubCategory-list'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='Sub-Categories'>";
                    echo "<h3>" . $row["subcategory_name"] . "</h3>";
                    echo "<a href='subcategory_list.php?product_id=" . $row["tbid"] . "'>View Details</a>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "No SubCategories found in this category.";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "No Sub-Category selected.";
        }
        ?>
    
       
    </main>

    <footer>
        <p>&copy; 2023 eCommerce Website. All Rights Reserved.</p>
    </footer>
</body>
</html>
