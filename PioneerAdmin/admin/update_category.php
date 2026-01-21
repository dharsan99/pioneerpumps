<?php
include '../php/db_connect.php';

function get_next_category_id($conn) {
    $sql = "SELECT MAX(tbid) AS max_id FROM category";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $next_id = $row['max_id'] + 1;
    return $next_id;
}

function upload_image($image) {
    $target_dir = "../../images/category/";
    $image_extension = pathinfo($image["name"], PATHINFO_EXTENSION);
    $random_image_name = sprintf('%05d', mt_rand(1, 99999)) . '.' . $image_extension;
    $target_file = $target_dir . $random_image_name;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

       // Check if the file already exists
       while (file_exists($target_file)) {
        $random_image_name = sprintf('%05d', mt_rand(1, 99999)) . '.' . $image_extension;
        $target_file = $target_dir . $random_image_name;
    }

    // Check if the image file is an actual image or a fake image
    if (getimagesize($image["tmp_name"]) === false) {
        
        return false;
    }

    // Check if the file already exists
    if (file_exists($target_file)) {
        return false;
    }

    // Check file size (5MB limit)
    if ($image["size"] > 5000000) {
        return false;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        return false;
    }

    // Upload the file
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        return $random_image_name; // Return only the image name
    } else {
        return false;
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = $_POST['category_name'];
    $created_type='1';
    $status='1';
       // Upload the image and get the image path
       $image_name = upload_image($_FILES['image']);
       if (!$image_name) {
        echo $image_name;

           echo "An error occurred while uploading the image.";
           exit;
       }

    $conn = db_connect();

    // Get the next category ID
    $next_category_id = get_next_category_id($conn);

    $sql = "INSERT INTO category (tbid, category_name, status, image, created_type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isisi', $next_category_id,  $category_name, $status, $image_name, $created_type);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Category updated successfully!";
    } else {
        echo "An error occurred while updating the category.";
    }

    $stmt->close();
    $conn->close();
}

?>
