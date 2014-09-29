<?php
	/* SELECT FROM DB */
	$topic_name = $_GET['topic'];

	$con = mysqli_connect('localhost','root','','forum_db');
	if (!$con) {
	  die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"forum_db");
	$sql_query_1 = "SELECT topics.topic_ID, topics.message, topics.date, users.username 
					FROM topics 
					INNER JOIN users
					ON topics.user_ID=users.user_ID
					WHERE topic_name = '".$topic_name."'";
	$result_query_1 = mysqli_query($con,$sql_query_1);
	$row_query_1 = mysqli_fetch_array($result_query_1);
	$topic_message_user = $row_query_1['username'];
	$topic_message = $row_query_1['message'];
	$topic_date = $row_query_1['date'];
	$topic_ID = $row_query_1['topic_ID'];

	echo "<table id='posts' class='gradient-style'>
            <thead>
                <tr>
                    <th colspan='2' scope='col' id='topic_name'>".$topic_name."</th>
                </tr>
            </thead>
            <tbody>
            <tr id='topic_message'>
                <td colspan='3' class='message'>
                    <p class='message_author'>".$topic_message_user."</p>
                    <p>".$topic_message."</p>
                    <br />
                    <p class='message_date'>".date('d-m-Y', strtotime($topic_date))."</p>
                    <div class='add'>
                        <p id='onclick'>Reply</p>
                    </div>
                </td>  
            </tr>";

	$sql_query_2 = "SELECT posts.post_ID, posts.message, posts.date_created, users.username
					FROM posts 
					INNER JOIN users
					ON posts.user_ID=users.user_ID
					WHERE topic_ID = '".$topic_ID."'";
	$result_query_2 = mysqli_query($con,$sql_query_2);

	while($row_query_2 = mysqli_fetch_array($result_query_2)) {
	  	$post_message = $row_query_2['message'];
		$post_date = $row_query_2['date_created'];
		$post_author = $row_query_2['username'];
	 	echo "<tr>";
	  	echo "<td class='date'>".$post_date."</td>";
	  	echo "<td class='message'>";
	  	echo "<p class='message_author'>".$post_author."</p>";
	  	echo "<p>".$post_message."</p>";
	  	echo "</td>";  
      	echo "</tr>";
	}

	echo "</tbody>";
    echo "</table>";

	mysqli_close($con);
?>