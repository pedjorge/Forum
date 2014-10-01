<html>
    <head>
        <title>Registration</title>
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
                $('#register').click(function(){ // Create `click` event function for register
                    var username   = $('#username'); 
                    var password   = $('#password');
                    var firstname = $('#firstname');
                    var lastname  = $('#lastname');
                    var email      = $('#email'); 
                    var register_result = $('#register_result'); // Get the login result div
                    register_result.html('loading..'); // Set the pre-loader can be an animation
                    if(username.val() == ''){ // Check the username value is empty or not
                        username.focus(); // focus to the filed
                        register_result.html('<span class="error">Provide a username</span>');
                        return false;
                    }
                    if(password.val() == ''){ // Check the password value is empty or not
                        password.focus();
                        register_result.html('<span class="error">Provide a password</span>');
                        return false;
                    }
                    if(firstname.val() == ''){ // Check the first name value is empty or not
                        firstname.focus();
                        register_result.html('<span class="error">Provide First Name</span>');
                        return false;
                    }
                    if(lastname.val() == ''){ // Check the last name value is empty or not
                        lastname.focus();
                        register_result.html('<span class="error">Provide Last Name</span>');
                        return false;
                    }
                    if(email.val() == ''){ // Check the email value is empty or not
                        email.focus();
                        register_result.html('<span class="error">Provide an email</span>');
                        return false;
                    }
                    if(username.val() != '' && password.val() != '' && firstname.val() != '' && lastname.val() != '' && email.val() != '') { 
                          
                          var request =  get_XmlHttp();   // call the function for the XMLHttpRequest instance

                          // create pairs index=value with data that must be sent to server
                          var  the_data = 'username='+username.val()+'&password='+password.val()+'&firstname='+firstname.val()+'&lastname='+lastname.val()+'&email='+email.val();

                          request.open("POST", 'php_support/verify_register.php', true);     // set the request

                          // adds  a header to tell the PHP script to recognize the data as is sent via POST
                          request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                          request.send(the_data);   // calls the send() method with datas as parameter

                          // Check request status
                          // If the response is received completely, will be transferred to the HTML tag with tagID
                          request.onreadystatechange = function() {
                            if (request.responseText == 1) {
                                register_result.html('<p class="error">Username already exists!</p>');
                            }
                            else if (request.responseText == 2) {
                                register_result.html('<p class="error">Username and Email already exists!</p>');
                            }
                            else if (request.responseText == 3) {
                                register_result.html('<p class="error">Email already exists!</p>');
                            }
                            else if (request.responseText == 4) {
                                register_result.html('<span class="success">Successfully registered!</span>');
                                window.setTimeout(function(){
                                    window.location.href = "login.php";
                                }, 1500);
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
                            <h1>Registration</h1>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="register_result"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="username" id="username" class="credentials" />
                        </td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td>
                            <input type="password" name="password" id="password" class="credentials" />
                        </td>
                    </tr>
                    <tr>
                        <td>First name:</td>
                        <td>
                            <input type="text" name="firstname" id="firstname" class="credentials" />
                        </td>
                    </tr>
                    <tr>
                        <td>Last name:</td>
                        <td>
                            <input type="text" name="lastname" id="lastname" class="credentials" />
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>
                            <input type="email" name="email" id="email" class="credentials" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="register" id="register" class="as_button" value="Register &raquo;" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a id="login" href='login.php'>Go back to Login</a>
                        </td>
                    </tr>
                </table>
            </form> 
        </div>      
    </body>
</html>