<?php
	/* Show all posts on the topic.php page */

	require 'db_connect.php';

	$topic_ID = $_GET['topic_ID'];

	$sql = "DELETE FROM 
				replies
			WHERE
				topic_ID ='".$topic_ID."'";
	mysqli_query($con,$sql);

	$sql = "DELETE FROM 
				posts
			WHERE 
				topic_ID ='".$topic_ID."'";
	mysqli_query($con,$sql);

	$sql = "DELETE FROM 
				topics
			WHERE 
				topic_ID ='".$topic_ID."'";
	mysqli_query($con,$sql);
	
	mysqli_close($con);
?>