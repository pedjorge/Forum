<!DOCTYPE html>
<?php
    // continue the session
    session_start();
?>
<html>
    <head>
        <title>User Login Form</title>
        <link rel="stylesheet" href="css/login-register.css">
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript">
            // create the XMLHttpRequest object, according browser
            function get_XmlHttp() {
              // create the variable that will contain the instance of the XMLHttpRequest object (initially with null value)
              var xmlHttp = null;

              if(window.XMLHttpRequest) {   // for Forefox, IE7+, Opera, Safari, ...
                xmlHttp = new XMLHttpRequest();
              }
              else if(window.ActiveXObject) { // for Internet Explorer 5 or 6
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
              }

              return xmlHttp;
            }

        $(document).ready(function(){
            $('#username').focus(); // Focus to the username field on body loads
            $('#login').click(function(){ // Create `click` event function for login
                var username = $('#username'); // Get the username field
                var password = $('#password'); // Get the password field
                var login_result = $('#login_result'); // Get the login result div
                login_result.html('loading..'); // Set the pre-loader can be an animation
                if(username.val() == ''){ // Check the username values is empty or not
                    username.focus(); // focus to the filed
                    login_result.html('<span class="error">Enter the username</span>');
                    return false;
                }
                if(password.val() == ''){ // Check the password values is empty or not
                    password.focus();
                    login_result.html('<span class="error">Enter the password</span>');
                    return false;
                }
                if(username.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request

                      var request =  get_XmlHttp();   // call the function for the XMLHttpRequest instance

                      // create pairs index=value with data that must be sent to server
                      var  the_data = 'username='+username.val()+'&password='+password.val();

                      request.open("POST", 'php_support/verify.php', true);     // set the request

                      // adds  a header to tell the PHP script to recognize the data as is sent via POST
                      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                      request.send(the_data);   // calls the send() method with datas as parameter

                      // Check request status
                      // If the response is received completely, will be transferred to the HTML tag with tagID
                      request.onreadystatechange = function() {
                        if (request.responseText == "incorrect") {
                            login_result.html('<span class="error">Username or Password Incorrect!</span>');
                        }
                        else if (request.responseText == "login") {
                            window.location = 'home.php';
                        }
                        else if (request.responseText == "db") {
                            alert('Problem with sql query' + request.responseText);
                        }
                      }
                }
                return false;
            });
        });
        </script>
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
            <form>
                <table>
                    <tr>
                        <td colspan="2">
                            <h1>Login</h1>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="login_result"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="username" id="username" class="credentials" />
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="password" name="password" id="password" class="credentials" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="login" id="login" class="as_button" value="Login &raquo;" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a id="register" href="register.php">not registered yet?</a>
                        </td>
                    </tr>
                </table>
            </form>         
        </div>      
    </body>
</html>