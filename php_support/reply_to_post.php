<?php
	// continue the session
    session_start();

    require 'db_connect.php';
    
	/* INSERT INTO DB */
	$message = $_GET['message'];
	$date = $_GET['date'];
	$post_ID = $_GET['post_ID'];

	$sql_query_1="INSERT INTO replies (post_ID, user_ID, reply, date_created) 
		  VALUES ('".$post_ID."', '".$_SESSION['user_ID']."','".$message."', '".date('Y-m-d H:i:s', strtotime($date))."')";
	mysqli_query($con,$sql_query_1);
	mysqli_close($con);
?>