<?php

    //create a connection
	$conn=mysqli_connect('localhost', 'root', '123456', 'actual_project');
	if (mysqli_connect_errno()) {
		// if this is true
		echo 'failed to connect'.mysqli_connect_errno();
	}
	else
	{
		echo 'success <br>';
	}


?>