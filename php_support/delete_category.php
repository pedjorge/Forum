<?php
	/* Show all posts on the topic.php page */

	require 'db_connect.php';

	$category_ID = $_GET['category_ID'];

	$sql = "SELECT 
				topic_ID
			FROM 
				topics
			WHERE 
				category_ID = '".$category_ID."'";
	$result = mysqli_query($con, $sql);

	while($row = mysqli_fetch_array($result)) {
		$topic_ID = $row['topic_ID'];

		$sql_replies = "DELETE FROM 
							replies
						WHERE
							topic_ID ='".$topic_ID."'";
		mysqli_query($con,$sql_replies);

		$sql_posts = "DELETE FROM 
						posts
					  WHERE 
						topic_ID ='".$topic_ID."'";
		mysqli_query($con,$sql_posts);

		$sql_topic = "DELETE FROM 
						topics
					  WHERE 
						topic_ID ='".$topic_ID."'";
		mysqli_query($con,$sql_topic);
	}

	$sql_category = "DELETE FROM 
						categories
					 WHERE
						category_ID ='".$category_ID."'";
	mysqli_query($con,$sql_category);

	mysqli_close($con);
?>