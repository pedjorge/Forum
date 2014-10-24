<?php
	// continue the session
    session_start();

    require 'db_connect.php';
    
	/* INSERT INTO DB */
	$user_ID = $_SESSION["user_ID"];
    $parent_ID = $_GET['parent_ID'];
	$message = $_GET['message'];
	$date = $_GET['date'];

	$sql_select="SELECT topic_ID FROM topics WHERE topic_name = '".$_GET['topic_name']."'";
	$result = mysqli_query($con,$sql_select);
	$row = mysqli_fetch_array($result);
	$topic_ID = $row['topic_ID'];

	mysqli_select_db($con,"forum_db");
	$sql_insert="INSERT INTO 
                    posts (topic_ID, parent_ID, user_ID, message, date_created) 
		        VALUES ('".$topic_ID."','".$parent_ID."', '".$user_ID."','".$message."', '".date('Y-m-d H:i:s', strtotime($date))."')";
	mysqli_query($con,$sql_insert);
	mysqli_close($con);
?>