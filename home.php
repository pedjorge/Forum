<!DOCTYPE html>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/home.css">
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
                    <textarea id="description" placeholder="Description......." name="description" ></textarea>
                    <input type="button" id="send" value="Send"/>
                    <input type="button" id="cancel" value="Cancel"/>
                    <br/>
                </form>
            </div>
        </div>
        <footer>
            <ul>
                <li class="first">

                </li>
            </ul>
        </footer>
    </body>
</html>
