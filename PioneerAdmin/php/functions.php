<?php
include 'db_connect.php';

function display_categories() {
    $conn = db_connect();

    $sql = "SELECT * FROM category";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul class='category-list'>";
        while ($row = $result->fetch_assoc()) {
            echo "<li><a href='category_list.php?category_id=" . $row["tbid"] . "'>" . $row["category_name"] . "</a></li>";
        }
        echo "</ul>";
    } else {
        echo "No categories found.";
    }

    $conn->close();
}
?>
