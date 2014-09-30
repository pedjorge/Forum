<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="css/login-register.css">
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    </head>
    <body>   
        <div class="logo_title">
            <div class="logo">
                <img class="logo" src="img/logo.png">
            </div>
            <div class="title">
                <h1><em><b>Forum</b></em></h1>
            </div>
        </div> 
        <div id="container">
            <h1>Registration</h1>
            <?php
                require_once("php_support/db_const.php");
                if (!isset($_POST['submit'])) {
            ?> 

            <!-- The HTML registration form -->
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <p>Username: <input type="text" name="username" /></p>
                <p>Password: <input type="password" name="password" /></p>
                <p>First name: <input type="text" name="first_name" /></p>
                <p>Last name: <input type="text" name="last_name" /></p>
                <p>Email: <input type="type" name="email" /></p>
                <input type="submit" name="submit" value="Register" />
                <a href='login.php'>Go back to Login</a>
            </form>
            <?php
                } else {
                    ## connect mysql server
                    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    # check connection
                    if ($mysqli->connect_errno) {
                        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
                        exit();
                    }

                    ## query database
                    # prepare data for insertion
                    $username    = $_POST['username'];
                    $password    = $_POST['password'];
                    $first_name    = $_POST['first_name'];
                    $last_name    = $_POST['last_name'];
                    $email        = $_POST['email'];
                 
                    # check if username and email exist else insert
                    $exists = 0;
                    $result = $mysqli->query("SELECT username from users WHERE username = '".$username."' LIMIT 1");
                    if ($result->num_rows == 1) {
                        $exists = 1;
                        $result = $mysqli->query("SELECT email from users WHERE email = '".$email."' LIMIT 1");
                        if ($result->num_rows == 1) $exists = 2;    
                    } else {
                        $result = $mysqli->query("SELECT email from users WHERE email = '".$email."' LIMIT 1");
                        if ($result->num_rows == 1) $exists = 3;
                    }
                 
                    if ($exists == 1) echo "<p>Username already exists!</p>";
                    else if ($exists == 2) echo "<p>Username and Email already exists!</p>";
                    else if ($exists == 3) echo "<p>Email already exists!</p>";
                    else {
                        # insert data into mysql database
                        $sql = "INSERT  INTO users (username, password, email, first_name, last_name) 
                                VALUES ('".$username."', '".$password."', '".$email."', '".$first_name."', '".$last_name."')";
                 
                        if ($mysqli->query($sql)) {
                            //echo "New Record has id ".$mysqli->insert_id;
                            echo "<p>Registred successfully!</p>";
                            echo "<a href='login.php'>Login</a>";
                        } else {
                            echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
                            exit();
                        }
                    }
                }
            ?>  
        </div>      
    </body>
</html>