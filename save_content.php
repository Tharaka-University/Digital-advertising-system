<?php


require('config/db.php');

if (isset($_POST['content'], $_POST['title'], $_POST['category']) && isset($_FILES['cover_image'])) {
    $content = $conn->real_escape_string($_POST['content']);
    $title = $conn->real_escape_string($_POST['title']);
    $category = $conn->real_escape_string($_POST['category']);

    $imageDirectory = "uploads/";
    $imageName = basename($_FILES['cover_image']['name']);
    $imagePath = $imageDirectory . $imageName;

    if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $imagePath)) {
        $sql = "INSERT INTO content_table (title, content, category, cover_image, created_at) 
                VALUES ('$title', '$content', '$category', '$imagePath', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "Content saved successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading image.";
    }
} else {
    echo "Required fields are missing.";
}


?>