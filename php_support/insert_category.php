<?php
	// continue the session
    session_start();

    require 'db_connect.php';

	/* INSERT INTO DB */
	$name = $_GET['name'];
	$description = $_GET['description'];

	# check if category name already exists
	$result = mysqli_query($con, "SELECT 
                                    category_name 
                                  FROM 
                                    categories 
                                  WHERE 
                                    category_name = '".$name."' LIMIT 1");

	if ($result->num_rows == 1) echo 1; 
	else { 
		$sql="INSERT INTO categories (category_name, category_description, user_ID) 
			  VALUES ('".$name."', '".$description."', '".$_SESSION["user_ID"]."')";
		if (mysqli_query($con,$sql)) {
			echo 2;
		}
	}
?>

