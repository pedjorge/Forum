$(document).ready(function() {
	setTimeout(popup, 3000);

	function popup() {
		$("#logindiv").css("display", "block");
	}

	$("#login #cancel").click(function() {
		$(this).parent().parent().hide();
	});

	$("#onclick").click(function() {
		$("#contactdiv").css("display", "block");
	});

	$("#contact #cancel").click(function() {
		$("#contactdiv").css("display", "none");
	});

	// Contact form popup send-button click event.
	$("#send").click(function() {
		var name = $("#name").val();
		var description = $("#description").val();
		if (name == "" || description == ""){
			alert("Please Fill All Fields");
		}
		else {
            var table = document.getElementById('categories');
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
	     
            var cell1 = row.insertCell(0);
            cell1.className = "category";
            var cell2 = row.insertCell(1);
            cell2.className = "last_topic";
            cell1.innerHTML = "<a href='categories.php?id=" + name + "'><h3>" + name + "</h3>" 
                              + "<p>" + description + "</p></a>";
            cell2.innerHTML = "<p>" + "..." + "</p>";
	        

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
			xmlhttp.open("GET","php_support/insert_category.php?name="+name+"&description="+description,true);
			xmlhttp.send();
		}	
	});

	// Contact form popup send-button click event.
	$("#add_topic").click(function() {
		var name = $("#name").val();
		var message = $("#message").val();
		var category = document.getElementById('category_name').innerHTML;

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

		if (name == "" || message == ""){
			alert("Please Fill All Fields");
		}
		else {
            var table = document.getElementById('topics');
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
	     
            var cell1 = row.insertCell(0);
            cell1.className = "topic";
            var cell2 = row.insertCell(1);
            cell2.className = "date";
            cell1.innerHTML = "<a href='topic.php?topic=" + name + "'><h3>" + name + "</h3></a>";
            cell2.innerHTML = dd + " " + monthNames[mm-1] + " " + yyyy;

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
			xmlhttp.open("GET","php_support/insert_topic.php?name="+name+"&message="+message+
						 "&date="+today+"&category="+category,true);
			xmlhttp.send();
		}
	});

	// Contact form popup send-button click event.
	$("#add_reply").click(function() {
		var name = document.getElementById('user_name').innerHTML;
		var message = $("#message").val();
		var topic = document.getElementById('topic_name').innerHTML;

		// Date
		var today = new Date();
	    var dd = today.getDate();
	    var mm = today.getMonth()+1; //January is 0!
	    var time = today.getHours() + ":" + today.getMinutes();

	    var yyyy = today.getFullYear();
	    if(dd<10){
	        dd='0'+dd
	    } 
	    if(mm<10){
	        mm='0'+mm
	    } 
	    var today = dd+'-'+mm+'-'+yyyy + ' ' + time + ':00';

		if (message == ""){
			alert("Please Fill All Fields");
		}
		else {
            var table = document.getElementById('posts');
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var cell1 = row.insertCell(0);
            cell1.className = "post";
            cell1.colSpan = "3";
            cell1.innerHTML = "<div class='author_date'>"
            				  + "<p class='post_author'>" + name + "</p>"
            				  + "<p class='date'>posted <span class='time'>Just now</span></p></div>" 
            				  + "<p class='post_message'>" + message + "</p>"
            				  + "<p class='date'>" + today + "</p>";
  
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
			xmlhttp.open("GET","php_support/reply.php?message="+message+"&topic_name="+topic+"&date="+today,true);
			xmlhttp.send();

		}
	});
});