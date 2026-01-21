<?php
require_once '../php/db_connect.php';

$conn = db_connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subcategory_id = $_POST['id'];
    $subcategory_name = $_POST['subcategory_name'];

    $sql = "UPDATE subcategory SET subcategory_name = ? WHERE tbid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $subcategory_name, $subcategory_id);
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
