$(document).ready(function() {
	setTimeout(popup, 3000);

	function popup() {
		$("#logindiv").css("display", "block");
	}

	$("#cancel_delete_reply").click(function() {
		$("#delete_div_reply").css("display", "none");
	});

	var reply_ID;
    $('.delete_reply').click(function() {
        reply_ID = $(this).closest('tr').attr('id'); // table row ID 
        $("#delete_div_reply").css("display", "block");
    });

    $("#delete_reply").click(function() {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
            
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                document.getElementById("#delete_div_reply").style.display = "none";
            }
        }

        xmlhttp.open("GET","php_support/delete_reply.php?&reply_ID="+reply_ID,true);
        xmlhttp.send();
        setTimeout(function(){location.reload();}, 2000);
    });
});