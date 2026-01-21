<?php
include '../php/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    // Add more variables for other product details

    $conn = db_connect();

    $sql = "UPDATE products SET name = ? WHERE id = ?";
    // Add more fields to the SQL query for other product details
    $stmt->bind_param('si', $product_name, $product_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Product updated successfully!";
    } else {
        echo "An error occurred while updating the product.";
    }

    $stmt->close();
    $conn->close();
}
?>
   
