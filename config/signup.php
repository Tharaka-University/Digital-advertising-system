<?php 

require('db.php');


if (isset($_POST['submit'])) {
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn, $_POST['password']);

	$hashed_password=password_hash($password, PASSWORD_DEFAULT);

	if (isset($_FILES['image']) && $_FILES['image']['error']===0) {
		$image=$_FILES['image'];
		$target_dir='profile_picture/';
		$image_name=basename($image['name']);
		$target_file=$target_dir.$image_name;

		if (move_uploaded_file($image['tmp_name'], $target_file)) {
			$query="INSERT INTO user2 (username, password, image_path) values('$username', '$hashed_password', '$target_file')";
			if (mysqli_query($conn, $query)) {
				header('location:the student.php');
			}
			else{
				echo 'error uploading image';
			}

		}else{
			echo "please upload a valid image";
		}
	}
}
?>