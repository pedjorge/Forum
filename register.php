<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="css/login-register.css">
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/register.js"></script>
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