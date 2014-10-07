<?php
	session_start();
    
	require 'db_connect.php';

    if(isset($_POST['username']) && $_POST['password']){ 
    	$username 		= $_POST['username']; // Get the username 
    	$password 		= $_POST['password']; // Get the password and decrypt it
    	$sql			= "SELECT * FROM users 
                           WHERE username LIKE '".$username."' 
                           AND password LIKE '".$password."' LIMIT 1"; // Check the table with posted credentials
    	$result         = mysqli_query($con,$sql); // Get the number of rows
        $row            = mysqli_fetch_array($result);

    	if($row <= 0){ // If no users exist with posted credentials print 0 like below.
    		echo "incorrect";
    	} else {
    		$_SESSION['user_ID'] 	= $row['user_ID'];
    		$_SESSION['username'] 	= $row['username'];
            $_SESSION['fname']   = $row['first_name'];
            $_SESSION['lname']   = $row['last_name'];
    		echo "login";
    	}
    }
?>