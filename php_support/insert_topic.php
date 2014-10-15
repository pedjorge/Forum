<?php
	// continue the session
    session_start();

	require 'db_connect.php';

	/* INSERT INTO DB */
	$name = $_GET['name'];
	$message = $_GET['message'];
	$date = $_GET['date'];
	$category_name = trim($_GET['category']);

    $sql ="SELECT 
    			category_ID 
    	   FROM 
    			categories 
    	   WHERE 
    			category_name = '".$category_name."'";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $category_ID = $row['category_ID'];

    $result = mysqli_query($con, "SELECT 
    								topic_name 
    	   						  FROM 
    								topics 
    	      					  WHERE 
    								category_ID = '".$category_ID."' AND topic_name = '".$name."' LIMIT 1");

    if ($result->num_rows == 1) echo 1; 
	else { 
		$sql="INSERT INTO topics (user_ID, topic_name, message, date_created, category_ID) 
		  	  VALUES ('".$_SESSION["user_ID"]."', '".$name."', '".$message."', '".date('Y-m-d H:i:s', strtotime($date))."', '".$category_ID."')";
		if (mysqli_query($con,$sql)) {
			echo 2;
		}
	}			
?>

