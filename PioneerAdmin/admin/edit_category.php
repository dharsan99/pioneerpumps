<?php
require_once '../php/db_connect.php';

$conn = db_connect();

$category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($category_id > 0) {
    $sql = "SELECT * FROM category WHERE tbid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $category_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $category = $result->fetch_assoc();
    } else {
        die('Category not found');
    }
} else {
    die('Invalid category ID');
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <div class="container">
        <h1>Edit Category</h1>
        <form action="update_edit_category.php" method="post">
            <input type="hidden" name="id" value="<?php echo $category['tbid']; ?>">
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $category['category_name']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
