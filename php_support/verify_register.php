<?php

    require 'db_connect.php';

    if(isset($_POST['username'])) {
        $username    = $_POST['username'];
        $password    = md5($_POST['password']);
        $first_name  = $_POST['firstname'];
        $last_name   = $_POST['lastname'];
        $email       = $_POST['email'];
                 
        $exists = 0;
        $result = mysqli_query($con, "SELECT 
                                        username 
                                      FROM 
                                        users 
                                      WHERE 
                                        username = '".$username."' LIMIT 1");
        if ($result->num_rows == 1) {
            $exists = 1;
            $result = mysqli_query($con, "SELECT 
                                            email 
                                          FROM 
                                            users 
                                          WHERE 
                                            email = '".$email."' LIMIT 1");
            if ($result->num_rows == 1) $exists = 2;    
        } else {
            $result = mysqli_query($con, "SELECT 
                                            email 
                                          FROM
                                            users 
                                          WHERE 
                                            email = '".$email."' LIMIT 1");
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