<?php
require_once '../php/db_connect.php';

$conn = db_connect();

$subcategory_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($subcategory_id > 0) {
    $sql = "SELECT * FROM subcategory WHERE tbid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $subcategory_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $subcategory = $result->fetch_assoc();
    } else {
        die('SubCategory not found');
    }
} else {
    die('Invalid SubCategory ID');
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sub-Category</title>
</head>
<body>
    <div class="container">
        <h1>Edit Sub-Category</h1>
        <form action="update_edit_subcategory.php" method="post">
            <input type="hidden" name="id" value="<?php echo $subcategory['tbid']; ?>">
            <div class="form-group">
                <label for="subcategory_name">Sub-Category Name</label>
                <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" value="<?php echo $subcategory['subcategory_name']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
