<?php
require_once '../php/db_connect.php';

$conn = db_connect();

$category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($category_id > 0) {
    $sql = "DELETE FROM category WHERE tbid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $category_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Category Deleted successfully!";
    } else {
        echo "An error occurred while deleting the category.";
    }

} else {
    die('Invalid category ID');
}
$stmt->close();
$conn->close();
?>
