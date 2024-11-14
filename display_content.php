<?php
require('config/db.php');

// Fetch data from the database
$sql = "SELECT title, content, category, cover_image, created_at FROM content_table ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Display</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to the CSS file for styling -->
</head>
<body>
    <h1>Content List</h1>

    <?php
    if ($result->num_rows > 0) {
        // Output each row of data
        while ($row = $result->fetch_assoc()) {
            echo "<div class='content-item'>";
            echo "<h2>" . htmlspecialchars($row["title"]) . "</h2>";  // Display the title
            echo "<p><strong>Category:</strong> " . htmlspecialchars($row["category"]) . "</p>";  // Display category
            echo "<p>" . nl2br(htmlspecialchars($row["content"])) . "</p>";  // Display content with newlines

            // Display the cover image if it exists
            if (!empty($row["cover_image"])) {
                echo "<img src='" . htmlspecialchars($row["cover_image"]) . "' alt='Cover Image' style='max-width: 100%; height: auto;'>";
            }

            echo "<p><small>Created on: " . htmlspecialchars($row["created_at"]) . "</small></p>"; // Display creation date
            echo "</div><hr>";
        }
    } else {
        echo "<p>No content found.</p>";
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>
