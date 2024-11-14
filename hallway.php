<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>hallway</title>
	<link rel="stylesheet" type="text/css" href="hallway.css">


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
	<div class="blur-blackground">
		<div class="content">
    	
    	<div>
	<span id="date"></span><span id="year"></span>
</div>

	<div class="link">
    	<div class="image">
    		<a href="the student.php">
    		<img src="canvas.jpeg">
    		</a>
    		<p>proceed to <br>the cover page</p>
    	</div>

    	<div class="images">
    		<a href="add_or_edit.php">
    		<img src="Hvhhv.jpeg">
    		</a>
    		<p>Add post<Br> or edit post</p>
    	</div>


 		</div>
	</div>
</div>

	

</body>
</html>