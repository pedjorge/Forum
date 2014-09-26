<?php
	/* INSERT INTO DB */
	$name = $_GET['name'];
	$message = $_GET['message'];
	$date = $_GET['date'];
	$category_name = trim($_GET['category']);

	$con = mysqli_connect('localhost','root','','forum_db');
	if (!$con) {
	  die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"forum_db");
    $sql="SELECT * FROM categories WHERE category_name = '".$category_name."'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $category_ID = $row['category_ID'];

	$sql="INSERT INTO topics (user_ID, topic_name, message, date, category_ID) 
		  VALUES ('4', '".$name."', '".$message."', '".date('Y-m-d', strtotime($date))."', '".$category_ID."')";
	mysqli_query($con,$sql);
	mysqli_close($con);
?>

