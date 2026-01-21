<?php
require_once '../php/db_connect.php';

$conn = db_connect();

$subcategory_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($subcategory_id > 0) {
    $sql = "DELETE FROM subcategory WHERE tbid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $subcategory_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "SubCategory Deleted successfully!";
    } else {
        echo "An error occurred while deleting the Sub-Category.";
    }

} else {
    die('Invalid Sub-Category ID');
}
$stmt->close();
$conn->close();
?>
