<?php
    session_start(); // start a session first, else you cannot destroy/unset it
    session_destroy(); // destroy all sessions
?>

<html>
    <head>
        <title>User Login Form</title>
        <link rel="stylesheet" href="../css/login-register.css">
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="logo_title">
            <div class="logo">
                <img class="logo" src="../img/logo.png">
            </div>
            <div class="title">
                <h1><em><b>Forum</b></em></h1>
            </div>
        </div> 
        <div id="container">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <p>Logged Out Successfuly</p>
                <p>automatic redirect after 5s, or <a href="../login.php">click here</a>.</p>
            </form>
        </div>      
    </body>
</html>

<?php
    header('refresh:5;url=../login.php');
?>  