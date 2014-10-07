<?php
	// continue the session
    session_start();

    require 'db_connect.php';

	/* INSERT INTO DB */
	$name = $_GET['name'];
	$description = $_GET['description'];

	$sql="INSERT INTO categories (category_name, category_description, user_ID) 
		  VALUES ('".$name."', '".$description."', '".$_SESSION["username"]."')";
	mysqli_query($con,$sql);
	mysqli_close($con);
?>
