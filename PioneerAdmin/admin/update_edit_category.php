<?php
require_once '../php/db_connect.php';

$conn = db_connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['id'];
    $category_name = $_POST['category_name'];

    $sql = "UPDATE category SET category_name = ? WHERE tbid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $category_name, $category_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Category Edited successfully!";
    } else {
        echo "An error occurred while updating the category.";
    }
}

$stmt->close();
$conn->close();
?>
