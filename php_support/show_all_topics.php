<?php
	$con = mysqli_connect('localhost','root','','forum_db');
	if (!$con) {
	  die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"forum_db");
	$sql_query_1 = "SELECT * FROM topics";
	$result_query_1 = mysqli_query($con,$sql_query_1);

	echo "<table id='topics' class='gradient-style'>
            <thead>
                <tr>
                    <th scope='col'>Topic</th>
                    <th scope='col'>Category</th>
                    <th scope='col'>Created at</th>
                </tr>
            </thead>
            <tbody>";

	while($row_query_1 = mysqli_fetch_array($result_query_1)) {
		$sql_query_2 = "SELECT categories.category_name 
						FROM topics
						INNER JOIN categories
						ON topics.category_ID = categories.category_ID
						WHERE topic_ID = '".$row_query_1['topic_ID']."'";
		$result_query_2 = mysqli_query($con,$sql_query_2);
		$row_query_2 = mysqli_fetch_array($result_query_2);
		$category_name = $row_query_2['category_name'];

	  	echo "<tr>";
	  	echo "<td class='topic'>";
	 	echo "<a href='topic.php?topic=". $row_query_1['topic_name'] ."'><h3>". $row_query_1['topic_name'] ."</h3></a>";
	  	echo "</td>";
	  	echo "<td class='category'>".$category_name."</td>";
	  	echo "<td class='date'>". date('d-m-Y', strtotime($row_query_1['date'])) ."</td>";  
      	echo "</tr>";
	}

	echo "</tbody>";
    echo "</table>";

	mysqli_close($con);
?>
