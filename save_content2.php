<?php

require('config/db.php');

// Check if title and content are provided
if (isset($_POST['title']) && isset($_POST['content'])) {
    // Sanitize input
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);

    // Update query using title as the unique identifier
    $sql = "UPDATE content_table SET content='$content' WHERE title='$title'";

    // Execute query and provide feedback
    if ($conn->query($sql) === TRUE) {
        echo "Content saved successfully!";
    } else {
        echo "Error updating content: " . $conn->error;
    }
} else {
    echo "Required fields are missing.";
}

?>
