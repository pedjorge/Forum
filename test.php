<!DOCTYPE html>
<?php
    // continue the session
    session_start();
?>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.timeago.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <script src="js/jquery_popup.js"></script>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/topic.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="content">
                <table id="posts" class="gradient-style">
                    <thead>
                        <tr>
                            <th colspan="2" scope="col" id="topic_name">Housing Project in Oxford</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="topic_message">
                            <td colspan="3" class="message">
                                <p class="message_author">Pedro Jorge</p>
                                <p class="main_message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra nisi metus. Mauris dolor metus, porttitor vitae augue imperdiet, fermentum interdum lorem. Cras efficitur lectus nec nibh volutpat efficitur. Quisque euismod est velit, a feugiat neque dictum quis. Duis sit amet tellus vel augue fermentum convallis. Vivamus molestie purus velit, ut ornare sem iaculis a. Curabitur scelerisque justo sed dolor consectetur vehicula. Integer sit amet magna mauris. Duis fringilla nec orci at pharetra. Duis aliquet ac mauris eu condimentum. Nam sagittis sem eu diam lacinia posuere. Sed placerat auctor lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae ipsum cursus ligula commodo ornare id ut felis. Morbi a sapien felis. In magna erat, posuere id justo vestibulum, pretium placerat nulla.</p>
                                <br>
                                <p class="message_date date">11 September 2014 13:30</p>
                                <div class="add">
                                    <p id="onclick">Reply</p>
                                </div>
                            </td>  
                        </tr>
                        <tr id="foo">
                            <td colspan="3" class="post reply" >
                                <div class="author_date">
                                    <p class="post_author">Pedro Jorge</p>
                                    <p class="date">posted <abbr class="time">about an hour ago</abbr></p>
                                </div>
                                <p class="post_message">Duis aliquet ac mauris eu condimentum. Nam sagittis sem eu diam lacinia posuere. Sed placerat auctor lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae ipsum cursus ligula commodo ornare id ut felis. Morbi a sapien felis. In magna erat, posuere id justo vestibulum, pretium placerat nulla.</p>
                                <p class="date full_date">03 October 2014 11:09</p>
                            </td>
                        </tr>
                        <tr id="test">
                            <td colspan="3" class="post">
                                <div class="author_date">
                                    <p class="post_author">Pedro Jorge</p>
                                    <p class="date">posted <abbr class="time">about an hour ago</abbr></p>
                                </div>
                                <p class="post_message">Test.</p>
                                <p class="date full_date">03 October 2014 11:09</p>
                            </td>
                        </tr>
                        <tr id="28">
                            <td colspan="3" class="post reply">
                                <div class="author_date">
                                    <p class="post_author">Pedro Jorge</p>
                                    <p class="date">posted <abbr class="time">about an hour ago</abbr></p>
                                </div>
                                <p class="post_message">Test.</p>
                                <p class="date full_date">03 October 2014 11:09</p>
                            </td>
                        </tr>
                        <tr id="29">
                            <td colspan="3" class="post" id="test_row">
                                <div class="author_date">
                                    <p class="post_author">Robert Jiang</p>
                                    <p class="date">posted <abbr class="time">about an hour ago</abbr></p>
                                </div>
                                <p class="post_message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra nisi metus. Mauris dolor metus, porttitor vitae augue imperdiet, fermentum interdum lorem. Cras efficitur lectus nec nibh volutpat efficitur. Quisque euismod est velit, a feugiat neque dictum quis. Duis sit amet tellus vel augue fermentum convallis. Vivamus molestie purus velit, ut ornare sem iaculis a</p>
                                <div class="post_footer">
                                    <input type="button"  value="Reply"  id="contact2" class="reply_to_post" />
                                    <p class="date full_date">03 October 2014 11:09</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
            <div id="replydiv">
                <form class="form" action="#" id="reply_form">
                    <p id="h3"><b>Reply<b><p>
                    <label>Message:</label>
                    <textarea id="reply_message" placeholder="Message......."></textarea>
                    <input type="button" id="add_reply_to_post" value="Reply"/>
                    <input type="button" id="cancel_reply_to_post" value="Cancel"/>
                    <br/>
                </form>
            </div>
        </div>
        <script>
            var post_ID;
            $('.reply_to_post').click(function() {
                post_ID = $(this).closest('tr').attr('id'); // table row ID 
                $("#replydiv").css("display", "block");

                $("#reply_form #cancel_reply_to_post").click(function() {
                    $("#replydiv").css("display", "none");
                });
            });

            $("#add_reply_to_post").click(function() {
                var message = $("#reply_message").val();

                /*------------------------- Date -----------------------*/

                var today = new Date();
                var time = today.getHours() + ":" + today.getMinutes();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var monthNames = [ "January", "February", "March", "April", "May", "June",
                                   "July", "August", "September", "October", "November", "December" ];

                var yyyy = today.getFullYear();
                if(dd<10) { dd='0'+dd } 
                var today = dd+'-'+mm+'-'+yyyy + ' ' + time + ':00';

                /*------------------------- Date -----------------------*/


                if (message == ""){
                    alert("Please Fill All Fields");
                }
                else {
                    var table = document.getElementById('posts');
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);
                    var cell1 = row.insertCell(0);
                    cell1.colSpan = "3";
                    cell1.className = "post reply";
                    cell1.innerHTML = "<div class='author_date'>"
                                      + "<p class='post_author'>" + name + "</p>"
                                      + "<p class='date'>posted <span class='time'>Just now</span></p></div>"
                                      + "<p class='post_message'>" + message + "</p>"
                                      + "<div class='post_footer'>"
                                      + "<p class='reply_to_post'>Reply</p>" 
                                      + "<p class='date full_date'>" + today + "</p></div>";

                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                    } else { // code for IE6, IE5
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange=function() {
                        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                            document.getElementById("contactdiv").style.display = "none";
                        }
                    }
                    xmlhttp.open("GET","php_support/reply_to_post.php?message="+message+"&post_ID="+post_ID+"&date="+today,true);
                    xmlhttp.send();

                    //location.reload();

                }
            });
        </script>
    </body>
</html>