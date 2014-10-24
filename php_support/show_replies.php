<?php
	require 'db_connect.php';
	require 'get_comments.php';

	$topic_name = $_GET['topic'];
	$sql_query_1 = "SELECT 
						topics.topic_ID, 
						topics.message, 
						topics.date_created, 
						users.first_name, 
						users.last_name 
					FROM 
						topics 
					INNER JOIN users
					ON topics.user_ID=users.user_ID
					WHERE 
						topic_name = '".$topic_name."'";
	$result_query_1 = mysqli_query($con,$sql_query_1);
	$row_query_1 = mysqli_fetch_array($result_query_1);

	$author_fname = $row_query_1['first_name'];
	$author_lname = $row_query_1['last_name'];
	$topic_message = $row_query_1['message'];
	$topic_date = $row_query_1['date_created'];
	$topic_ID = $row_query_1['topic_ID'];
	$date = date('d F Y H:i', strtotime($topic_date));

	echo "<table id='posts' class='gradient-style'>
            <thead>
                <tr>
                    <th colspan='2' scope='col' id='topic_name'>".$topic_name."</th>
                </tr>
            </thead>
            <tbody>
	            <tr id='topic_message'>
	                <td colspan='3' class='message'>
	                    <p class='message_author'>".$author_fname." ".$author_lname."</p>
	                    <p class='main_message'>".$topic_message."</p>
	                    <br />
	                    <p class='message_date date'>".$date."</p>
	                    <div class='add'>
	                        <p id='onclick'>Reply</p>
	                    </div>
	                </td>  
	            </tr>
            </tbody>
          </table>";
	$sql = "SELECT * FROM posts WHERE parent_ID = '0' AND topic_ID = '".$topic_ID."'";
	$result = mysqli_query($con,$sql);
	echo "<div id='replies'>";
	while ($row = mysqli_fetch_array($result)) {
	 	getComments($row);
	}
	echo "</div>";
?>