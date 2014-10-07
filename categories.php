<!DOCTYPE html>
<?php
    // continue the session
    session_start();
?>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/categories.css">
        <script src="js/jquery_popup.js"></script>
        <script src="js/make_row_link.js"></script>
    </head>
    <body>
        <div id="menu">
            <div id="header">
                <div class="logo_title">
                    <div class="logo">
                        <a href="home.php"><img class="logo" src="img/logo.png"></a>
                    </div>
                    <div class="title">
                        <a href="home.php"><h1><em><b>Forum</b></em></h1></a>
                    </div>
                </div>
                <div class="search_container">
                    <input type="search" id="mySearch" placeholder="Search for something..">
                    <button onclick="myFunction()">Search</button>
                </div>
            </div>
            <div id="navigation">
                <ul id="navigation_items">
                    <li class="Username">
                        Welcome <span id="user_name"><?php echo $_SESSION["fname"]; ?></span>
                    </li>
                    <li class="Forums menu_item">
                        <img id="menu_image" src="img/home.jpg">
                        <a href="home.php" class="menu_item_link"><p>Forums</p></a>
                    </li>
                    <li class="Topics menu_item">
                        <img id="menu_image" src="img/topics.png">
                        <a href="topics.php" class="menu_item_link"><p>Topics</p></a>
                    </li>
                    <li class="Starred_topics menu_item">
                        <img id="menu_image" src="img/starred.png">
                        <a href="starred_topics.php" class="menu_item_link"><p>Starred topics</p></a>
                    </li>
                    <li class="Settings menu_item" style="margin-top:532px;">
                        <a href="#" class="menu_item_link"><p>Settings</p></a>
                    </li>
                    <li class="Logout">
                        <a href="php_support/logout.php" class="menu_item_link"><p>Logout</p></a>
                    </li>
                </ul>
            </div>
            <div id="footer">
                <p>&#169; 2014 First Last</p>
            </div>
        </div>
        <div id="container">
            <div id="content">
                <h2 id="category_name">
                    <?php 
                        require 'php_support/db_connect.php';

                        $category_ID = $_GET["category"];
                        $sql="SELECT 
                                category_name 
                              FROM 
                                categories 
                              WHERE 
                                category_ID = '".$category_ID."'";
                        $result = mysqli_query($con,$sql);
                        $row = mysqli_fetch_array($result);
                        $category_name = $row['category_name'];
                        mysqli_close($con);

                        echo $category_name;
                    ?>
                </h2>
                <?php include 'php_support/show_topics.php'; ?>
                <div class="add">
                    <p id="onclick">Add Topic</p>
                </div>
            </div>
            <div id="contactdiv">
                <form class="form" action="#" id="contact">
                    <p id="h3"><b>Create Topic<b><p>
                    <label>Topic Name: <span>*</span></label>
                    <input type="text" id="name" placeholder="Name"/>
                    <label>Message:</label>
                    <textarea id="message" placeholder="Message......."></textarea>
                    <input type="button" id="add_topic" value="Add"/>
                    <input type="button" id="cancel" value="Cancel"/>
                    <br/>
                </form>
            </div>
        </div>
    </body>
</html>