<?php
	// continue the session
    session_start();

	require 'db_connect.php';

	/* INSERT INTO DB */
	$name = $_GET['name'];
	$message = $_GET['message'];
	$date = $_GET['date'];
	$category_name = trim($_GET['category']);

    $sql_query_1="SELECT 
    				category_ID 
    			FROM 
    				categories 
    			WHERE 
    				category_name = '".$category_name."'";
    $result_query_1 = mysqli_query($con,$sql_query_1);
    $row_query_1 = mysqli_fetch_array($result_query_1);
    $category_ID = $row_query_1['category_ID'];

	$sql_query_2="SELECT 
					user_ID 
				FROM 
					users 
				WHERE 
					username = '".$_SESSION["username"]."'";
    $result_query_2 = mysqli_query($con,$sql_query_2);
    $row_query_2 = mysqli_fetch_array($result_query_2);
    $user_ID = $row_query_2['user_ID'];
    
	$sql="INSERT INTO topics (user_ID, topic_name, message, date_created, category_ID) 
		  VALUES ('".$user_ID."', '".$name."', '".$message."', '".date('Y-m-d H:i:s', strtotime($date))."', '".$category_ID."')";
	mysqli_query($con,$sql);
	mysqli_close($con);
?>

