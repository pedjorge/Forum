$(document).ready(function() {
	setTimeout(popup, 3000);

	function popup() {
		$("#logindiv").css("display", "block");
	}

	$("#cancel_delete_topic").click(function() {
		$("#delete_topic_div").css("display", "none");
	});

	var topic_ID;
    $('.delete').click(function() {
        topic_ID = $(this).closest('tr').attr('id'); // table row ID 
        $("#delete_topic_div").css("display", "block");
    });

    $("#delete_topic").click(function() {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
            
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                document.getElementById("#delete_topic_div").style.display = "none";
            }
        }

        xmlhttp.open("GET","php_support/delete_topic.php?&topic_ID="+topic_ID,true);
        xmlhttp.send();
        setTimeout(function(){location.reload();}, 2000);
    });
});