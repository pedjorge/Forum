$(document).ready(function() {
    $('#username').focus(); 
    $('#login').click(function(){ 
        var username = $('#username'); 
        var password = $('#password'); 
        var login_result = $('#login_result'); 
        login_result.html('loading..'); 

        if(username.val() == ''){ // Check the username values is empty or not
            username.focus(); 
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
            var  the_data = 'username='+username.val()+'&password='+password.val(); // create pairs index=value with data that must be sent to server

            request.open("POST", 'php_support/verify.php', true);     // set the request
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // adds  a header to tell the PHP script to recognize the data as is sent via POST
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