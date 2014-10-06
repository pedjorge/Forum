<?php
	// continue the session
    session_start();
    
	/* INSERT INTO DB */
	$message = $_GET['message'];
	$date = $_GET['date'];
	$post_ID = $_GET['post_ID'];

	$con = mysqli_connect('localhost','root','','forum_db');
	if (!$con) {
	  die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"forum_db");
	$sql_query_1="INSERT INTO replies (post_ID, user_ID, reply, date_created) 
		  VALUES ('".$post_ID."', '".$_SESSION['user_ID']."','".$message."', '".date('Y-m-d H:i:s', strtotime($date))."')";
	mysqli_query($con,$sql_query_1);
	mysqli_close($con);
?>