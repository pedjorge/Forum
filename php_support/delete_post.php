<?php
	/* Show all posts on the topic.php page */

	require 'db_connect.php';

	$post_ID = $_GET['post_ID'];

	$sql = "DELETE FROM 
				replies
			WHERE
				post_ID ='".$post_ID."'";
	mysqli_query($con,$sql);

	$sql = "DELETE FROM 
				posts
			WHERE 
				post_ID ='".$post_ID."'";
	mysqli_query($con,$sql);
	
	mysqli_close($con);
?>