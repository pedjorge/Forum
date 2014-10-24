$(document).ready(function() {
	setTimeout(popup, 3000);

	function popup() {
		$("#logindiv").css("display", "block");
	}

	$("#cancel").click(function() {
		$("#creatediv").css("display", "none");
	});

    $("#onclick").click(function() {
        $("#creatediv").css("display", "block");
    });

	$("#add_topic").click(function() {
        var name = $("#name").val();
        var message = $("#message").val();
        var category = document.getElementById('category_name').innerHTML;

        var today = get_Date();

        if (name == "" || message == ""){
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
                if (xmlhttp.responseText == 1) {
                    alert("Topic name already exists!");
                }
                else if (xmlhttp.responseText == 2) {
                    location.reload();
                }
            }
            xmlhttp.open("GET","php_support/insert_topic.php?name="+name+"&message="+message+
                         "&date="+today+"&category="+category,true);
            xmlhttp.send();
        }   
    });
});