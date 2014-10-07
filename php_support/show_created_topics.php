<?php
	/* Show created topics by current user on the starred topics page */

	require 'db_connect.php';
	
	$sql_query_1 = "SELECT 
						topic_ID,
						topic_name,
						date_created
					FROM 
						topics 
					WHERE 
						user_ID = '".$_SESSION['user_ID']."' 
					ORDER BY topics.date_created DESC";
	$result_query_1 = mysqli_query($con,$sql_query_1);

	echo "<table id='topics' class='gradient-style'>
            <thead>
                <tr>
                    <th scope='col'>Topic</th>
                    <th scope='col'>Category</th>
                    <th scope='col' class='created_at'>Created at</th>
                </tr>
            </thead>
            <tbody>";

	while($row_query_1 = mysqli_fetch_array($result_query_1)) {
		$sql_query_2 = "SELECT 
							categories.category_name 
						FROM 
							topics
						INNER JOIN categories
						ON topics.category_ID = categories.category_ID
						WHERE 
							topic_ID = '".$row_query_1['topic_ID']."'";
		$result_query_2 = mysqli_query($con,$sql_query_2);
		$row_query_2 = mysqli_fetch_array($result_query_2);

		$category_name = $row_query_2['category_name'];
		$topic_name = $row_query_1['topic_name'];
		$date = date('d F Y', strtotime($row_query_1['date_created']));

	  	echo "<tr>";
	  	echo "<td class='topic'>";
	 	echo "<a href='topic.php?topic=".$topic_name."'><h3>".$topic_name."</h3></a>";
	  	echo "</td>";
	  	echo "<td class='category'>".$category_name."</td>";
	  	echo "<td class='date'>".$date."</td>";  
      	echo "</tr>";
	}

	echo "</tbody>";
    echo "</table>";

	mysqli_close($con);
?>
