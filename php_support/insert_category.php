<?php
	/* INSERT INTO DB */
	$name = $_GET['name'];
	$description = $_GET['description'];

	$con = mysqli_connect('localhost','root','','forum_db');
	if (!$con) {
	  die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"forum_db");
	$sql="INSERT INTO categories (category_name, category_description) 
		  VALUES ('".$name."', '".$description."')";
	mysqli_query($con,$sql);
	mysqli_close($con);
?>
