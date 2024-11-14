<?php 
require('config/db.php');

$title = mysqli_real_escape_string($conn, $_GET['title']);

$query = "SELECT * FROM content_table WHERE title = '$title'";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($result);

// Retrieve the category from the article
$category = $post['category'];


$ad_query = "SELECT * FROM adverts WHERE category = '$category'";
$ad_result = mysqli_query($conn, $ad_query);

// Store adverts in an array
$adverts = [];
while ($ad_row = mysqli_fetch_assoc($ad_result)) {
    $adverts[] = $ad_row;
}

// Free results and close the connection
mysqli_free_result($result);
mysqli_free_result($ad_result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title']); ?></title>
    <link rel="stylesheet" type="text/css" href="post.css">
    <script type="text/javascript">
        function displaytime(){
            let today = new Date();
            let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July','August', 'September', 'October', 'November', 'December'];
            let date = today.getDate();
            let month = months[today.getMonth()];
            let year = today.getFullYear();
            document.getElementById('date').innerHTML = ` ${date} ${month},`;
            document.getElementById('year').innerHTML = ` ${year}`;
        }
    </script>
</head>
<body onload="displaytime()">
    <hr><a href="the student.php">cover page</a>

    <div>
        <span id="date"></span><span id="year"></span>
    </div>

    <div class="family">

<div class="left"><?php if (!empty($adverts)): ?>
        <ul>
            <?php foreach ($adverts as $advert): ?>
                <li>
                  <a href="<?php echo htmlspecialchars($advert['link']); ?>">

                    <h3 style="color:white;">get yours today</h3>
                    click here
                    <img src="<?php echo htmlspecialchars($advert['image_path']); ?>" alt="Advert Image" style="width: 500px;">
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No related adverts found for this category.</p>
    <?php endif; ?>
</div>
        
        <div class="right">
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
    <img src="<?php echo htmlspecialchars($post['cover_image']); ?>" style="width: 400px;" class="image-left">
    <p><?php echo htmlspecialchars($post['content']); ?></p>
</div>

    </div>
    
   
    
</body>
</html>
