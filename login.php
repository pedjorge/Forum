<html>
    <head>
        <title>User Login Form</title>
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
            <h1>Login</h1>
            <?php
                if (!isset($_POST['submit'])){
            ?>

            <!-- The HTML login form -->
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <p>Username: <input type="text" name="username" /></p>
                <p>Password: <input type="password" name="password" /></p>
             
                <input type="submit" name="submit" value="Login" />
                <a href="register.php">REGISTER</a>
            </form>
            
            <?php
                } else {
                    require_once("php_support/db_const.php");
                    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    # check connection
                    if ($mysqli->connect_errno) {
                        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
                        exit();
                    }
                 
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                 
                    $sql = "SELECT * from users WHERE username LIKE '".$username."' AND password LIKE '".$password."' LIMIT 1";
                    $result = $mysqli->query($sql);
                    if (!$result->num_rows == 1) {
                        echo "<p>Invalid username/password combination</p>";
                    } else {
                        echo "<p>Logged in successfully</p>";
                        session_start();
                        $_SESSION["username"] = $username;
                        sleep(5);
                        header('Location: home.php');
                        // do stuffs
                    }
                }
            ?>  
        </div>      
    </body>
</html>