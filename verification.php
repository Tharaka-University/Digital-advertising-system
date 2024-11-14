<?php

require('config/signup.php');
require('config/login.php');
require('config/db.php');
?>







<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>verification page</title>
	<link rel="stylesheet" type="text/css" href="verification.css">

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
<body onload="displaytime()">
<div>
	<span id="date"></span><span id="year"></span>
</div>

<div class="container">
	<div class="login">
		<button class="login" class="signup" id="support-btn" popovertarget="support"> click here <br>  Member. <br> welcome back </button>
		 
	</div>
	<div class="signup" >
		<button class="signup" id="support-btn" popovertarget="boom"> click here<br>Guest.<br>join the vibe </button>
		
	</div>
</div>

<div popover id="support">

	<form method="post" action="verification.php">
login
		<div class="inputelement">
			<label>username</label><br>
			<input type="text" name="username" placeholder="username" require>
		</div>
		<div class="inputelement">
			<label>password</label><br>
			<input type="password" name="password" placeholder="password" require>
		</div>

		<div  class="inputelement">
			<input type="submit" name="submit" value="signup">
		</div>
	</form>
</div>


<div popover id="boom">

	<form method="post" action="verification.php" enctype="multipart/form-data">
sign up
		<div class="inputelement">
			<label>username</label><br>
			<input type="text" name="username" placeholder="username" require>
		</div>
		<div class="inputelement">
			<label>password</label><br>
			<input type="password" name="password" placeholder="password" require>
		</div>

		<div class="inputelement">
			<input type="file" name="image" require>
		</div>


		<div  class="inputelement">
			<input type="submit" name="submit" value="signup">
		</div>
		
	</form>
</div>




<footer><div class="footer">forever <br> young<br> forever<br> Infernally <br> Inspired</div> </footer>
</body>
</html>