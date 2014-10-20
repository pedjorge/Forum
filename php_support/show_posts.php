<?php
	/* Show all posts on the topic.php page */

	require 'db_connect.php';

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
            </tr>";

	$sql_query_2 = "SELECT 
						posts.post_ID, 
						posts.message, 
						posts.date_created, 
						users.first_name, 
						users.last_name
					FROM 
						posts 
					INNER JOIN users
					ON posts.user_ID=users.user_ID
					WHERE 
						topic_ID = '".$topic_ID."'";
	$result_query_2 = mysqli_query($con,$sql_query_2);

	while($row_query_2 = mysqli_fetch_array($result_query_2)) {
	  	$post_message = $row_query_2['message'];
		$post_date = $row_query_2['date_created'];
		$author_fname = $row_query_2['first_name'];
		$author_lname = $row_query_2['last_name'];
		$post_ID = $row_query_2['post_ID'];

		$date_full = date('d-m-Y H:i', strtotime($post_date));
		$date_simple = date('c', strtotime($date_full));
	 	
	 	echo "<tr id='".$post_ID."' >";
	  	echo "<td colspan='3' class='post'>";
	  	echo "<div class='author_date'>";
	  	echo "<p class='post_author'>".$author_fname." ".$author_lname."</p>";
	  	echo "<p class='date'>posted <abbr class='time' title='<?php echo ".$date_simple.";?>'></abbr></p>";
	  	echo "</div>";
	  	echo "<p class='post_message'>".$post_message."</p>";
	  	echo "<div class='post_footer'>";
        echo "<p class='reply_to_post'>";
        echo "<input type='button'  value='Reply' class='reply_to_post' /></p>";
        echo "<p class='date full_date'>".$date_full."</p></div>";
        if ($author_fname == $_SESSION['fname'] && $author_lname == $_SESSION['lname']) {
        	echo "<input type='button' value='Delete' class='delete_post' />";
        }
	  	echo "</td>";  
      	echo "</tr>";

      	$sql_query_3 = "SELECT 
      						replies.reply_ID,
      						replies.reply, 
      						replies.date_created, 
      						users.first_name, 
      						users.last_name
					    FROM replies 
					    INNER JOIN users
					    ON replies.user_ID=users.user_ID
					    WHERE 
					    	post_ID = '".$post_ID."'
					    ORDER BY replies.date_created ASC";
		$result_query_3 = mysqli_query($con,$sql_query_3);

		while($row_query_3 = mysqli_fetch_array($result_query_3)) {
			$reply_ID = $row_query_3['reply_ID']; 
			$post_message = $row_query_3['reply'];
			$post_date = $row_query_3['date_created'];
			$author_fname = $row_query_3['first_name'];
			$author_lname = $row_query_3['last_name'];

			$date_full = date('d-m-Y H:i', strtotime($post_date));
			$date_simple = date('c', strtotime($date_full));

			echo "<tr id='".$reply_ID."' >";
			echo "<td colspan='3' class='post reply'>";
			echo "<div class='author_date'>";
		  	echo "<p class='post_author'>".$author_fname." ".$author_lname."</p>";
		  	echo "<p class='date'>posted <abbr class='time' title='<?php echo ".$date_simple.";?>'></abbr></p>";
		  	echo "</div>";
            echo "<p class='post_message'>".$post_message."</p>";
            echo "<div class='post_footer'>";
            echo "<p class='date full_date'>".$date_full."</p></div>";
            if ($author_fname == $_SESSION['fname'] && $author_lname == $_SESSION['lname']) {
        		echo "<input type='button' value='Delete' class='delete_reply' />";
            }
            echo "</td>";  
      		echo "</tr>";
		}
	}

	echo "</tbody>";
    echo "</table>";

	mysqli_close($con);
?>