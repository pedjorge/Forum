$(document).ready(function() {
	setTimeout(popup, 3000);

	function popup() {
		$("#logindiv").css("display", "block");
	}

	$("#cancel").click(function() {
		$("#replydiv").css("display", "none");
	});

	var parent_ID;
    $(".reply_to_post, #onclick").click(function() {
        parent_ID = $(this).closest('li').attr('id'); // table row ID 
        $("#replydiv").css("display", "block");
    });

    // Contact form popup send-button click event.
    $("#add_reply").click(function() {
        var name = document.getElementById('user_name').innerHTML;
        var message = $("#message").val();
        var topic = document.getElementById('topic_name').innerHTML;

        var today = get_Date();

        if (message == ""){
            alert("Please Fill All Fields");
        }
        else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("replydiv").style.display = "none";
                }
            }
            xmlhttp.open("GET","php_support/reply.php?message="+message+"&parent_ID="+parent_ID+"&topic_name="+topic+"&date="+today,true);
            xmlhttp.send();
            setTimeout(function(){location.reload()}, 2000);
        }
    });
});