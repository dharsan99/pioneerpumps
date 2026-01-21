<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-PioneerPumpsAdmin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <h1>Dashboard</h1>
    </header>

    <main>
        <h4>Update Category</h4><br>
        <?php include 'category_form.php'; ?>
        <!-- Add this inside the <div class="container"> element, before the subcategories table -->
<div class="row mt-4">
    <div class="col">
        <h3>Add Subcategory</h3>
        <?php
        // Fetch categories
        require_once '../php/db_connect.php';

$conn = db_connect();
$sql_categories = "SELECT * FROM category";
$result_categories = $conn->query($sql_categories);

$categories = array();
if ($result_categories->num_rows > 0) {
    while ($row = $result_categories->fetch_assoc()) {
        $categories[] = $row;
    }
}
?>

        <form action="update_subcategory.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="subcategory_name">Subcategory Name</label>
                <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">Select a category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['tbid']; ?>"><?php echo $category['category_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*"><br><br>
            </div>
            <button type="submit" class="btn btn-primary">Update Sub-Category</button>
        </form>
    </div>
</div>


        <h4>Update Product</h4><br>
        <?php include 'product_form.php'; ?>
    </main>
    <?php
require_once '../php/db_connect.php';

$conn = db_connect();

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 5;
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM category ORDER BY tbid DESC LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);

$categories = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Get the total number of categories for pagination
$sql_total_categories = "SELECT COUNT(*) AS total FROM category";
$result_total_categories = $conn->query($sql_total_categories);
$total_categories = $result_total_categories->fetch_assoc()['total'];
$total_pages = ceil($total_categories / $limit);

$page2 = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit2 = 5;
$offset2 = ($page2 - 1) * $limit2;

$sql2 = "SELECT * FROM subcategory ORDER BY tbid DESC LIMIT $limit2 OFFSET $offset2";

$result2 = $conn->query($sql2);

$subcategories = array();
if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $subcategories[] = $row;
    }
}

// Get the total number of categories for pagination
$sql_total_subcategories = "SELECT COUNT(*) AS total FROM subcategory";
$result_total_subcategories = $conn->query($sql_total_subcategories);
$total_subcategories = $result_total_subcategories->fetch_assoc()['total'];
$total_pages2 = ceil($total_subcategories / $limit2);

$conn->close();
?>

 <div class="container">
 <div class="d-flex justify-content-center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a></li>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php echo $i === $page ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <li class="page-item <?php echo $page >= $total_pages ? 'disabled' : ''; ?>"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a></li>
        </ul>
    </nav>
</div>
        <h1>Categories</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo $category['tbid']; ?></td>
                    <td><?php echo $category['category_name']; ?></td>
                    <td><?php echo $category['status']; ?></td>
                    <td><img src="../../images/categories/<?php echo $category['image']; ?>" width="100" alt="<?php echo $category['name']; ?>"></td>
                    <td>
                    <a href="edit_category.php?id=<?php echo $category['tbid']; ?>" class="btn btn-sm btn-primary">Edit</a>
                   
                    </td>
                    <td>
                    <a href="delete_category.php?id=<?php echo $category['tbid']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
     <div class="container">
 <div class="d-flex justify-content-center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item <?php echo $page2 <= 1 ? 'disabled' : ''; ?>"><a class="page-link" href="?page=<?php echo $page2 - 1; ?>">Previous</a></li>
            <?php for ($i2 = 1; $i2 <= $total_pages2; $i2++): ?>
                <li class="page-item <?php echo $i2 === $page2 ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i2; ?>"><?php echo $i2; ?></a></li>
            <?php endfor; ?>
            <li class="page-item <?php echo $page2 >= $total_pages2 ? 'disabled' : ''; ?>"><a class="page-link" href="?page=<?php echo $page2 + 1; ?>">Next</a></li>
        </ul>
    </nav>
</div>
    <!-- Add this inside the <div class="container"> element, after the categories table -->
<h1>Subcategories</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category_Id</th>
            <th>Sub_Category_Name</th>
            <th>Status</th>
            <th>Image</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($subcategories as $subcategory): ?>
            <tr>
                <td><?php echo $subcategory['tbid']; ?></td>
                <td><?php echo $subcategory['category_id']; ?></td>
                <td><?php echo $subcategory['subcategory_name']; ?></td>
                <td><?php echo $subcategory['status']; ?></td>
                <td><img src="../../images/subcategory/<?php echo $subcategory['image']; ?>" width="100" alt="<?php echo $subcategory['name']; ?>"></td>
                <td>
                    <a href="edit_subcategory.php?id=<?php echo $subcategory['tbid']; ?>" class="btn btn-sm btn-primary">Edit</a>
                </td>
                <td>
                    <a href="delete_subcategory.php?id=<?php echo $subcategory['tbid']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    <footer>
        <p>&copy; 2023 Pioneer Pumps. All Rights Reserved. </p>
    </footer>
</body>
</html>
