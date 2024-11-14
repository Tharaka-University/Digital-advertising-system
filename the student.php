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
	<link rel="stylesheet" type="text/css" href="thestudent.css">

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

	<h1>
		the Student
	</h1>

<div class="posted">
	<?php foreach ($posts as $post):?>
	<div class="sup">
	<div class="container">
		<img src="<?php echo $post['cover_image'];?>" style="width: 400px; ">
		<h2><?php echo $post['title'];?></h2>
		
	</div>
	<a href="post.php?title=<?php echo urlencode($post['title']); ?>">Read more</a>



</div>

<?php endforeach;?>

</div>


<section class="inferno">
	<p>
		proudly and Infernally inspired. <br>
		
		If you wish to advertise with us, to make any suggestions or have any complaints about post send, an email to<br> <a href="mailto:dannynjugi@gmail.com"> dannynjugi@gmail.com</a><br>
		This was an actual dream I had, always wanted to do this,I am glad I did it<br>
	</p>
</section>
</body>
</html>