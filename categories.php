<!DOCTYPE html>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/categories.css">
        
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
                <h2 id="category_name">
                    <?php 
                        $category_ID = $_GET["category"];
                        $con = mysqli_connect('localhost','root','','forum_db');
                        if (!$con) {
                            die('Could not connect: ' . mysqli_error($con));
                        }

                        mysqli_select_db($con,"forum_db");
                        $sql="SELECT * FROM categories WHERE category_ID = '".$category_ID."'";
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
        <footer>
            <ul>
                <li class="first">
                </li>
            </ul>
        </footer>
    </body>
</html>
