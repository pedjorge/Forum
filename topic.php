<!DOCTYPE html>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/topic.css">
        
        <script src="js/jquery_popup.js"></script>
    </head>
    <body>

        <div id="header_container">
            <div id="header">
                <div class="logo_title">
                    <h1><em><b>Forum</b></em></h1>
                </div>

                <div class="search_container">
                    <input type="search" id="mySearch" placeholder="Search for something..">
                    <button onclick="myFunction()">Search</button>
                </div>
            </div>
        </div>

        <div id="container">
            <div id="content">
            <?php include 'php_support/show_posts.php'; ?>
            </div>
            <div id="contactdiv">
                <form class="form" action="#" id="contact">
                    <p id="h3"><b>Reply<b><p>
                    <label>Message:</label>
                    <textarea id="message" placeholder="Message......."></textarea>
                    <input type="button" id="add_reply" value="Reply"/>
                    <input type="button" id="cancel" value="Cancel"/>
                    <br/>
                </form>
            </div>
            <div class="push"></div>
        </div>
        <footer>
            <ul>
                <li class="first">

                </li>
            </ul>
        </footer>
    </body>
</html>
