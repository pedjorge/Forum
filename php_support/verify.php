<?php
	session_start();
    
	require 'db_connect.php';

    if(isset($_POST['username']) && $_POST['password']){ 
    	$username 		= $_POST['username']; 
    	$password 		= md5($_POST['password']); 
    	$sql			= "SELECT 
                                * 
                           FROM 
                                users 
                           WHERE
                                username LIKE '".$username."' AND password LIKE '".$password."' LIMIT 1"; 
    	$result         = mysqli_query($con,$sql); 
        $row            = mysqli_fetch_array($result);

    	if ($row <= 0) { 
    		echo "incorrect";
    	} else {
    		$_SESSION['user_ID'] 	= $row['user_ID'];
    		$_SESSION['username'] 	= $row['username'];
            $_SESSION['fname']   = $row['first_name'];
            $_SESSION['lname']   = $row['last_name'];
            $_SESSION['login'] = "1";
    		echo "login";
    	}
    }
?>