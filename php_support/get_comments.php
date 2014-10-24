<?php
	function getComments($row) {
		require 'db_connect.php';

		$date_full = date('d-m-Y H:i', strtotime($row['date_created']));
		$date_simple = date('c', strtotime($date_full));

		$sql = "SELECT 
	 				* 
	 			FROM 
	 				users 
	 			WHERE 
	 				user_ID = '".$row['user_ID']."'";
	 	$result = mysqli_query($con,$sql);
	 	$row_2 = mysqli_fetch_array($result);

		echo "<li class='comment' id='".$row['post_ID']."'>";
		echo "<div class='author_date'>";
	  	echo "<p class='post_author'>".$row_2['first_name']." ".$row_2['last_name']."</p>";
	  	echo "<p class='date'>posted <abbr class='time' title='<?php echo ".$date_simple.";?>'></abbr></p>";
	  	echo "</div>";
	  	echo "<p class='post_message'>".$row['message']."</p>";
	  	echo "<div class='post_footer'>";
        echo "<p class='reply_to_post'>";
        echo "<input type='button'  value='Reply' class='reply_to_post' /></p>";
        if ($row_2['first_name'] == $_SESSION['fname'] && $row_2['last_name'] == $_SESSION['lname']) {
        	echo "<p class='delete_post'><input type='button' value='Delete' class='delete_post' /></p>";
        }
        echo "<p class='date full_date'>".$date_full."</p></div>";

	 	$sql = "SELECT * FROM posts WHERE parent_ID = '".$row['post_ID']."'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_num_rows($result);

	 	if($row) // there is at least reply
	  	{
	  		echo "<ul>";
	  		while ($row = mysqli_fetch_array($result)) {
			 	getComments($row);
			}
	  		echo "</ul>";
	  	} 
	 	echo "</li>";
	}
?>