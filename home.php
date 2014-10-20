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
        <link rel="stylesheet" href="css/home.css">
        <script src="js/jquery_popup.js"></script>
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
                    <li class="Forums menu_item" style="background-color: lightgrey;">
                        <img id="menu_image" src="img/home.jpg">
                        <a href="#" class="menu_item_link"><p style="color:white;">Forums</p></a>
                    </li>
                    <li class="Topics menu_item">
                        <img id="menu_image" src="img/topics.png">
                        <a href="topics.php" class="menu_item_link"><p>All Topics</p></a>
                    </li>
                    <li class="Starred_topics menu_item">
                        <img id="menu_image" src="img/starred.png">
                        <a href="starred_topics.php" class="menu_item_link"><p>Starred</p></a>
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
                <h2>Forums</h2>
                <?php include 'php_support/show_categories.php'; ?>
                <div class="add">
                    <p id="onclick">Add Category</p>
                </div>
            </div>
            <div id="contactdiv">
                <form class="form" action="#" id="contact">
                    <p id="h3"><b>Create Category<b><p>
                    <label>Category Name: <span>*</span></label>
                    <input type="text" id="name" placeholder="Name" name="category_name" />
                    <label>Category Description:</label>
                    <textarea id="description" placeholder="Description......." name="description" maxlength="70"></textarea>
                    <input type="button" id="add_category" value="Add category"/>
                    <input type="button" id="cancel" value="Cancel"/>
                    <br/>
                </form>
            </div>
        </div>
    </body>
</html>