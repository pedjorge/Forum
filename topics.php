<!DOCTYPE html>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/topics.css">
        <script src="js/jquery_popup.js"></script>
    </head>
    <body>
        <div id="menu">
            <div id="header">
                <div class="logo_title">
                    <div class="logo">
                        <a href="#"><img class="logo" src="img/logo.png"></a>
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
                    <li class="Starred_topics menu_item">
                        <a href="#" class="menu_item_link"><p>Starred topics</p></a>
                    </li>
                    <li class="Forums menu_item">
                        <a href="#" class="menu_item_link"><p>Forums</p></a>
                    </li>
                    <li class="Topics menu_item" style="background-color: lightgrey;">
                        <a href="#" class="menu_item_link"><p style="color:white;">Topics</p></a>
                    </li>
                    <li class="Settings menu_item">
                        <a href="#" class="menu_item_link"><p>Settings</p></a>
                    </li>
                </ul>
            </div>
            <div id="footer">
                <p>&#169; 2014 First Last</p>
            </div>
        </div>
        <div id="container">
            <div id="content">
            <h2>All Topics</h2>
            <?php include 'php_support/show_all_topics.php'; ?>
            </div>
        </div>
    </body>
</html>
