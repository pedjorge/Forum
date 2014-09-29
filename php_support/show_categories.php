<?php
	/* SELECT FROM DB */
	$con = mysqli_connect('localhost','root','','forum_db');
	if (!$con) {
	  die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"forum_db");
	$sql_query_1 = "SELECT * FROM categories";
	$result_query_1 = mysqli_query($con,$sql_query_1);

	echo "<table id='categories' class='gradient-style'>
            <thead>
                <tr>
                    <th scope='col'>Category</th>
                    <th scope='col'>Last Topic</th>
                </tr>
            </thead>
            <tbody>";

	while($row_query_1 = mysqli_fetch_array($result_query_1)) {

		$sql_query_2 = "SELECT topic_name
						FROM topics
						WHERE category_ID = '".$row_query_1['category_ID']."'
						ORDER BY topic_ID DESC LIMIT 1";
		$result_query_2 = mysqli_query($con,$sql_query_2);
		$row_query_2 = mysqli_fetch_array($result_query_2);
		$last_topic = $row_query_2['topic_name'];

	    echo "<tr>";
	    echo "<td class='category'>";
	    echo "<a href='categories.php?category=". $row_query_1['category_ID'] ."'><h3>". $row_query_1['category_name'] ."</h3>";
	    echo "<p>". $row_query_1['category_description'] ."</p></a>";
	    echo "</td>";
	    echo "<td class='last_topic'><a href='topic.php?topic=".$last_topic."'>".$last_topic."</a></td>";  
        echo "</tr>";
	}

	echo "</tbody>";
    echo "</table>";

	mysqli_close($con);
?>