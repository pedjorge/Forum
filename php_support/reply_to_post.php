<?php
	// continue the session
    session_start();

    require 'db_connect.php';
    
	/* INSERT INTO DB */
	$message = $_GET['message'];
	$date = $_GET['date'];
	$post_ID = $_GET['post_ID'];

	$sql = "SELECT
		    	topic_ID
		   	FROM 
		   		posts 
		   	WHERE 
		   		post_ID = '".$post_ID."'";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $topic_ID = $row['topic_ID']; 

	$sql_query_2="INSERT INTO replies (post_ID, user_ID, topic_ID, reply, date_created) 
		  VALUES ('".$post_ID."', '".$_SESSION['user_ID']."', '".$topic_ID."', '".$message."', '".date('Y-m-d H:i:s', strtotime($date))."')";
	mysqli_query($con,$sql_query_2);
	mysqli_close($con);
?>