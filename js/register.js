$(document).ready(function() {
    $('#username').focus(); 
    $('#register').click(function() { 
        var username   = $('#username'); 
        var password   = $('#password');
        var firstname = $('#firstname');
        var lastname  = $('#lastname');
        var email      = $('#email'); 
        var register_result = $('#register_result'); 
        register_result.html('loading..'); 
        
        if (username.val() == ''){ // Check the username value is empty or not
            username.focus(); 
            register_result.html('<span class="error">Provide a username</span>');
            return false;
        }
        if (password.val() == ''){ // Check the password value is empty or not
            password.focus();
            register_result.html('<span class="error">Provide a password</span>');
            return false;
        }
        if (firstname.val() == ''){ // Check the first name value is empty or not
            firstname.focus();
            register_result.html('<span class="error">Provide First Name</span>');
            return false;
        }
        if (lastname.val() == ''){ // Check the last name value is empty or not
            lastname.focus();
            register_result.html('<span class="error">Provide Last Name</span>');
            return false;
        }
        if (email.val() == ''){ // Check the email value is empty or not
            email.focus();
            register_result.html('<span class="error">Provide an email</span>');
            return false;
        }
        if (username.val() != '' && password.val() != '' && firstname.val() != '' && lastname.val() != '' && email.val() != '') { 
        
            var request =  get_XmlHttp();   // call the function for the XMLHttpRequest instance

            // create pairs index=value with data that must be sent to server
            var  the_data = 'username='+username.val()+'&password='+password.val()+'&firstname='+firstname.val()+'&lastname='+lastname.val()+'&email='+email.val();
            request.open("POST", 'php_support/verify_register.php', true);     // set the request

            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // adds  a header to tell the PHP script to recognize the data as is sent via POST
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
                    window.setTimeout(function() {
                        window.location.href = "login.php";
                    }, 1500);
                }
            }
        }
        return false;
    });
});