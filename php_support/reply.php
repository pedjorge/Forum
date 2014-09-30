<?php
	// continue the session
    session_start();
    
	/* INSERT INTO DB */
	$user_name = $_SESSION["username"];
	$message = $_GET['message'];
	$date = $_GET['date'];
	$topic_name = $_GET['topic_name'];

	$con = mysqli_connect('localhost','root','','forum_db');
	if (!$con) {
	  die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"forum_db");
    $sql_query_1="SELECT * FROM users WHERE username = '".$user_name."'";
    $result_query_1 = mysqli_query($con,$sql_query_1);
    $row_query_1 = mysqli_fetch_array($result_query_1);
    $user_ID = $row_query_1['user_ID'];

    $sql_query_2="SELECT * FROM topics WHERE topic_name = '".$topic_name."'";
    $result_query_2 = mysqli_query($con,$sql_query_2);
    $row_query_2 = mysqli_fetch_array($result_query_2);
    $topic_ID = $row_query_2['topic_ID'];


	mysqli_select_db($con,"forum_db");
	$sql_query_3="INSERT INTO posts (topic_ID, user_ID, message, date_created) 
		  VALUES ('".$topic_ID."', '".$user_ID."','".$message."', '".date('Y-m-d', strtotime($date))."')";
	mysqli_query($con,$sql_query_3);
	mysqli_close($con);
?>