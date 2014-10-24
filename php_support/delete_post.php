<?php
	/* Show all posts on the topic.php page */

	require 'db_connect.php';

	$post_ID = $_GET['post_ID'];

	$sql = "DELETE FROM 
				posts
			WHERE 
				post_ID ='".$post_ID."'";
	mysqli_query($con,$sql);
	
	mysqli_close($con);
?>