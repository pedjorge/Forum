<?php
	session_start();
	require_once("db_const.php");
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }
    mysqli_select_db($con,"forum_db");

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
    		echo "login";
    	}
    }
?>