<?php
    require_once("db_const.php");
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }
    mysqli_select_db($con,"forum_db");

    if(isset($_POST['username'])) {
        $username    = $_POST['username'];
        $password    = $_POST['password'];
        $first_name  = $_POST['firstname'];
        $last_name   = $_POST['lastname'];
        $email       = $_POST['email'];
                 
        # check if username and email exist else insert
        $exists = 0;
        $result = mysqli_query($con, "SELECT username from users WHERE username = '".$username."' LIMIT 1");
        if ($result->num_rows == 1) {
            $exists = 1;
            $result = mysqli_query($con, "SELECT email from users WHERE email = '".$email."' LIMIT 1");
            if ($result->num_rows == 1) $exists = 2;    
        } else {
            $result = mysqli_query($con, "SELECT email from users WHERE email = '".$email."' LIMIT 1");
            if ($result->num_rows == 1) $exists = 3;
        }
                 
        if ($exists == 1) echo 1;
        else if ($exists == 2) echo 2;
        else if ($exists == 3) echo 3;
        else {
            # insert data into mysql database
            $sql = "INSERT  INTO users (username, password, email, first_name, last_name) 
                    VALUES ('".$username."', '".$password."', '".$email."', '".$first_name."', '".$last_name."')";
               
            if (mysqli_query($con,$sql)) {
                echo 4;
            } elseif ($exists != 0) {
                echo $exists;
            } else {
                echo 5;
            }
        }
    }
?>  