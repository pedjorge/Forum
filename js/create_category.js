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

	// Contact form popup send-button click event.
    $("#add_category").click(function() {
        var name = $("#name").val();
        var description = $("#description").val();
        if (name == "" || description == ""){
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
                    alert("Category name already exists!");
                }
                else if (xmlhttp.responseText == 2) {
                    location.reload();
                }
            }
            xmlhttp.open("GET","php_support/insert_category.php?name="+name+"&description="+description,true);
            xmlhttp.send();
        }   
    });
});