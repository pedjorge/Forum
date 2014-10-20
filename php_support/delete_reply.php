<?php
	/* Show all posts on the topic.php page */

	require 'db_connect.php';

	$reply_ID = $_GET['reply_ID'];

	$sql = "DELETE FROM 
				replies
			WHERE
				reply_ID ='".$reply_ID."'";
	mysqli_query($con,$sql);

	mysqli_close($con);
?>