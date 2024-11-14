<?php 

require('config/db.php');

$query='SELECT * FROM content_table';

$result=mysqli_query($conn, $query);

$posts=mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>the student</title>
    <link rel="stylesheet" type="text/css" href="edit.css">

<script type="text/javascript">
        function displaytime(){

            //create a variable to hold the initialized object date
            let today=new Date()

            let months=['January', 'February', 'March', 'April', 'May', 'June', 'July','August', 'September', 'October', 'November', 'December']

            let date=today.getDate()
            let month=months[today.getMonth()]
            let year=today.getFullYear()

            let fullDate=` ${date} ${month},`
            let fullDate2=` ${year}`

            document.getElementById('date').innerHTML=fullDate
            document.getElementById('year').innerHTML=fullDate2
            
        }
    </script>


</head>
<body  onload="displaytime()">
<div>
    <span id="date"></span><span id="year"></span>
</div>



    <div class="kichwa">
      <div><h1>Edit Post</h1></div>
    
    <div class="link"><a href="add_or_edit.php"><h1> add post</h1></a></div>
    </div>


    

<?php foreach ($posts as $post):?>
    <div class="sup">
    <div class="container">
        <img src="<?php echo $post['cover_image'];?>" style="width: 400px; ">
        <h2><?php echo $post['title'];?></h2>
        
    </div>
    <a href="edit2.php?title=<?php echo urlencode($post['title']); ?>">make an edit</a>



</div>

<?php endforeach;?>
</body>
</html>